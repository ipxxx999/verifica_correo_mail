<?php
/**
*
* PHP EMAIL VALIDATION
* This script performs real time email verification.
*
* @author Rowland O'Connor <https://plus.google.com/+RowlandOConnor>
* @version 1.0.0
*
* IMPORTANT DISCLAIMER
* This script is provided AS IS for educational purposes only.
*
* Script is NOT designed for industrial application and has 
* several known key deficiencies in error tolerance 
* and accuracy / coverage of email address queries.
*
* No warranty or support is provided. Use of this script 
* is at your own risk.
*
*
* USAGE WARNING
* Many hosting companies do not allow SMTP send 
* operations. Please get permission from your hosting provider 
* before deploying this script.
*
*
* LICENSE
* This script is licensed under Apache 2.0 (http://www.apache.org/licenses/).
*
*
* For further details, please see accompanying readme.txt.
*
*
* Source code at
* https://github.com/Roly67/php-email-validation
*/
?>

<?php
/* CONFIGURATION */

/*
$FROM Aparece en MAIL FROM:<> parte de la conversación SMTP
Es VITAL configurar esto en su dominio válido; de lo contrario, envíe un correo electrónico 
Es posible que la verificación no funcione.
*/
$FROM = "info@miapk.app"; // <-- !MUY, MUY IMPORTANTE. NO OLVIDE CONFIGURAR.

/*
$EMAIL_REGEX se utiliza para la validación Regex de la dirección de correo electrónico.
Puede usar el suyo, pero el predeterminado a continuación es bastante completo
y debería ser lo suficientemente bueno para la mayoría de los propósitos.
*/
$EMAIL_REGEX="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

/*
$TCP_BUFFER_SIZE define el tamaño del búfer de memoria utilizado para las conversaciones SMTP.
El valor predeterminado de 1024 está bien en la mayoría de los casos.
*/
$TCP_BUFFER_SIZE = 1024;

?>

<?php
/*
Presentation HTML
*/
?>
<p><strong><a href="verificamail.php" target="_blank">Validar Correo</a></strong> aqui.</p>
<p>Compruebe si su correo electrónico califica <abbr title="">en FILME</abbr>.</p>
<p><strong>Notas:</strong></p>
<ul>
<li>VERIFICA TU CORREO.</li>
<li>
	LOS CORREOS ELECTRÓNICOS NO VÁLIDOS SERÁN EXCLUIDOS:
	<ol>
		<li><strong>MAIL</strong> LAS CUENTAS FALSAS SERÁN BORRADAS</li>
		<li><strong><abbr title="">DETECCIÓN</abbr></strong> si borramos su correo electrónico, no podrá volver a conectarse.</li>
	</ol>
</li>
</li>
</ul>
<form action="" method="post">
	<input type="text" id="emailtoverify" name="emailtoverify" value="<?php if(isset($_POST["emailtoverify"]))
echo($_POST["emailtoverify"])?>" />
	<input type="submit" value="Verificar MAIL" />
</form>

<?php

/*POST back handler*/
if(isset($_POST["emailtoverify"]))
{
	$result = VerifyMail(trim($_POST["emailtoverify"]));
	
	// SMTP code 250 shows email is valid.
	if (substr($result[0],0,3) == "250")
		  echo("<strong>Resultado</strong>: El correo electrónico es <strong> CORRECTO. </strong>  "); 
		else 
		{
		  echo("<strong>Resultado</strong>: El correo electrónico es <strong> BASURA </strong>"); 
		  
		  // The reason why it's bad.
		  echo("<br/><br/> <strong>Descripción</strong>: ".$result[0]);
		}  
		
	echo("<p><strong>Registro del servidor:</strong> Logo</p>");
	$log = $result[2];
	$log = str_replace("<","&lt;", $log);
	$log = str_replace(">","&gt;", $log);
	$log = str_replace("\r","<br/>", $log);
	echo($log);
}


/*
Description:
Verifies email address
Parameters:
$Email - Dirección de correo electrónico para verificar
Returns:
Matriz que contiene el resultado de la verificación por correo electrónico.
*/
function VerifyMail($Email) 
{
	global $FROM; // FROM address. See settings section above
	global $EMAIL_REGEX; // Email syntax verification Regex
	global $TCP_BUFFER_SIZE; //TCP buffer size for mail server conversation.

	// $HTTP_HOST gets the host name of the server running the PHP script.
	$HTTP_HOST = $_SERVER["HTTP_HOST"];
	
	// Prep up the function return.
	$Return = array();  

	// Do the syntax validation using simple regex expression.
	// Eliminates basic syntax faults.
	if (!eregi($EMAIL_REGEX, $Email)) 
	{ 
		$Return[0] = "Bad Syntax";         
		return $Return; 
	}
   
	// load the user and domain name into a local list from email address using string split function.
	list ( $Username, $Domain ) = split ("@",$Email); 

	// check if domain has MX record(s)
	if ( checkdnsrr ( $Domain, "MX" ) )  
	{ 
		$log .= "MX el registro {$Domain} existe.\r"; 
	
		// Get DNS MX records from domain
		if ( getmxrr ($Domain, $MXHost))  
		{              
		} 

		// Get the IP address of first MX record
		$ConnectAddress = $MXHost[0]; 

		// Open TCP connection to IP address on port 25 (default SMTP port)
		$Connect = fsockopen ( $ConnectAddress, 25 );
		
		// Rerun array element index 1 contains the IP address of the target mail server
		$Return[1] = $ConnectAddress;
		  
		// Successful connection to mail server.
		if ($Connect)   
		{
			$log .= "Conexión a {$ConnectAddress} SMTP se realizó correctamente.\r"; 
			
			// look for a response code of 220 using Regex
			if ( ereg ( "^220", $reply = fgets ( $Connect, $TCP_BUFFER_SIZE ) ) ) 
			{ 
				$log .= $reply."\r";
				
				// Start SMTP conversation with HELO
				fputs ( $Connect, "HELO ". $HTTP_HOST ."\r\n" ); 
				$log .=  "> HELO ". $HTTP_HOST ."\r"; 
				$reply = fgets ( $Connect, $TCP_BUFFER_SIZE );
				$log .= $reply."\r";                  

				// Next, do MAIL FROM:
				fputs ( $Connect, "MAIL FROM: <". $FROM .">\r\n" ); 
				$log .=  "> CORREO DE: <". $FROM .">\r"; 
				$reply = fgets ( $Connect, $TCP_BUFFER_SIZE );
				$log .= $reply."\r";    
				
				// Next, do RCPT TO:
				fputs ( $Connect, "RCPT TO: <{$Email}>\r\n" ); 
				$log .= "> RCPT PARA: <{$Email}>\r"; 
				$to_reply = fgets ( $Connect, $TCP_BUFFER_SIZE );
				$log .= $to_reply."\r";  
				
				// Quit the SMTP conversation.
				fputs ( $Connect, "QUIT\r\n"); 

				// Close TCP connection
				fclose($Connect); 
			} 
		} 
		else 
		{ 
			// Return array element 0 contains a message.
			$Return[0]="500 No se puede conectar el servidor de correo electrónico ({$ConnectAddress}).";         
			return $Return; 
		} 
	} 
	else 
	{
		$to_reply = "Dominio '{$Domain}' no existe.\r";    
		$log .= "MX record para '{$Domain}' no existe.\r"; 
	}
        
	$Return[0]=$to_reply;
	$Return[2]=$log;

	return $Return;
}
?>
