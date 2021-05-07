<?
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {                   
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}
if (!empty($_SERVER['HTTP_USER_AGENT'])) {
   $agent = $_SERVER['HTTP_USER_AGENT'];
} elseif (!empty($_SERVER['HTTP_USER_AGENT'])) {                   
   $agent = $_SERVER['HTTP_USER_AGENT'];
} else {
   $agent = $_SERVER['HTTP_USER_AGENT'];
}
?>

<?
/*
Programmed by Ing. Inoel Garcial, no-replay@miapk.app, LINK1https://www.miapk.appLINK1
Exclusively published on elchasquilatinomontreal.com.
Exclusivamente publicado el miapk.app.
If you like my scripts, please let me know or link to me.
Si te gusta mi script, por favor hágamelo saber o enlace a mí web.

You may copy, redistirubte, change and alter my scripts as long as this information remains intact
Puede copiar, redistirubte, cambiar y alterar mis guiones, siempre y cuando esta información se mantiene intacta
*/


$length        =    6; // Must be a multiple of 2 !! So 14 will work, 15 won't, 16 will, 17 won't and so on

// Password generation
    $conso=array("1","2","3","4","5","6","7","8","9",
    "10","11","12","13","14","15","16","17","18","19","20");
    $vocal=array("1","2","3","4","5");
    $password="";
    srand ((double)microtime()*1000000);
    $max = $length/2;
    for($i=1; $i<=$max; $i++)
    {
    $password.=$conso[rand(0,19)];
    $password.=$vocal[rand(0,4)];
    }
    $newpass = $password;
// ENDE Password generation
               "<p>";

?>
<?php
/************************************************************************/
/* PHP Creation et Conception site web Montreal                         */
/* ===========================                                          */
/*   Por favor Respete los créditos de autor.                           */
/*   Escrito por Ing. Inoel Garcia - http://www.copyright.com           */
/*   Web Developer - PHP, programación                                  */
/*   Website Presentación de Servicios                                  */
/*   Inoel Garcia                                                       */
/************************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//es" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
        <meta http-equiv="Content-Type"  content="text/html; charset=iso-8859-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> 
        <meta http-equiv="Content-Type" content="text/php; charset=ISO-8859-1" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
   
        <link href='./png/1_mobile.png' rel='icon' sizes='32x32' type='image/png'/>
        <!-- mobile settings -->
        <meta content='width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0' name='viewport'/>
        <title>Editor M3u</title>
        <meta property="og:description" name="description" content="El PODEROSO EDITOR ONLINE que utilizan los Programadores IPTV Para creación de listas m3u"/> 
        <meta content='./png/poderoso.png' property='og:image'/>
<!--  Bootstrap Css -->

 <link rel="stylesheet" href="./css/bootstrap.css"> 

<link href="./css/css.css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
        <style>
            body {
                background: #f8f9fb;
                font-family: 'Montserrat', sans-serif;
            }
            .mg-container {
                margin-top: 90px; 
                margin-bottom: 20px
            }
            .logo {
                background: white;
                border-bottom: solid 1pt #d8e2e7;
            }
            .btn{
                white-space:normal!important
            }
            .box {
                -webkit-border-radius: 4px;
                border-radius: 4px;
                background: #fff;
                border: solid 1px #d8e2e7;
                margin: 0 0 20px;
            }
            .box-center {
                text-align: center !important;
                /*                display: table-cell;
                                vertical-align: middle;*/
                padding: 15px;
            }
            .title {
                font-size: 30px;
                line-height: 38px;
                margin-top: 10px;
                margin-bottom: 8px;
                color: #113d67
            }
            .title-big {
                font-size: 42px;
                line-height: 50px;
                margin-top: 10px;
                margin-bottom: 24px;
            }
            .small a {
                color: black;
                text-decoration: none;
            }
            .lp1-toptitle, .lp1-form {
                font-size: 26px;
                line-height: 34px;
                font-weight: 600;
                margin-bottom: 20px;
                margin-top: 10px;
            }
            @media(max-width:767px){
                .mg-container {
                    margin-top: 40px; 
                    margin-bottom: 20px
                }
                .title {
                    font-size:20px;
                    line-height:28px;
                    margin-top:2px;
                    margin-bottom:8px
                }
                .title-big {
                    font-size:26px;
                    line-height:32px;
                    margin-top:2px;
                    margin-bottom:16px
                }
                .lp1-toptitle, .lp1-form {
                    font-size: 20px;
                    line-height: 28px;
                }
            }
            .cookie-choices-info {
                position: fixed;
                width: 100%;
                background-color: #666;
                margin: 0;
                left: 0;
                bottom: 0 !important;
                top: initial !important;
                padding: 0 0 8px 0 !important;
                z-index: 4000;
                text-align: center;
                color: #fff;
                line-height: 140%;
                font-family: roboto,Arial;
            }
            .cookie-choices-info .cookie-choices-text {
                font-size: 10px !important;
                margin: 10px !important;
                line-height: 16px
            }

            
input {
  border: 2px solid;
  border-radius: 4px;
  font-size: 1rem;
  margin: 0.25rem;
  min-width: 125px;
  padding: 0.5rem;
  transition: border-color 0.5s ease-out;
}
input:optional {
  border-color: gray;
}
input:required:valid {
  border-color: green;
}
input:invalid {
  border-color: red;
}
input:required:focus:valid {
  background: url("./css/input/hand-thumbs-up.svg") no-repeat 95% 50% #90EE90;
  background-size: 25px;
}
input:focus:invalid {
  background: url("./css/input/warning.svg") no-repeat 95% 50% #e8f7fc;
  background-size: 25px;
}

        </style>
        <b:skin><![CDATA[

            ]]></b:skin>

    </head>

<body>

<script language="Javascript">  clabHack=0;
document.oncontextmenu = function(){return false} 
 function right(e) {if (navigator.appName == 'Netscape'){
 if (e.which == 3 || e.which == 2){alert("Aqui no puedes utilizar el botón derecho del mouse...");
 for(i=0;i!=clabHack;i++)alert("Ya te lo habia advertido, ahora te penalizaré con \n                 "+(clabHack-i)+"\n              clicks !!!...");
 clabHack+=2;
 alert("La proxima vez que lo hagas será peor !!! - Estas Advertido");  return false;}}
 if (navigator.appName == 'Microsoft Internet Explorer'){
 if (event.button == 2 || event.button == 3){
 alert("TE LO DIJE NO utilizar el botón derecho del mouse...");
 for(i=0;i!=clabHack;i++)alert("TE LO DIJE NO utilizar el botón derecho, ahora te penalizaré con \n                 "+(clabHack-i)+"\n              clicks !!!...");
 clabHack+=2;
 alert("La proxima vez que lo hagas será peor !!! - Estas Advertido");
 return false;}}  return true;}  document.onmousedown = right;
 if (document.layers) window.captureEvents(Event.MOUSEDOWN);
 window.onmousedown=right; </script>

<script type="text/javascript" src="./css/uc/U_C.js"></script>

    <body>
        <b:section class='main' id='main' showaddelement='yes'/>
        <div class="container mg-container">  
            <div class="title text-center"><b class="">Solicite su editor M3U en línea. y descubrirás ...</b></div>
            <div class="title-big text-center"><b class="">“El <span class="text-danger">POTENTE EDITOR ONLINE </span> que utiliza TuTv.</p></b> ( Lanzamiento especial. ) <u><p>Visor m3u8.</u>”</b></div>
            <div class="row">
                <div class="col-md-7 form-group">
                    <div style="border: 10px solid black; border-radius: 8px" class="embed-responsive embed-responsive-16by9">
                        <img id="video" style="cursor: pointer" class="embed-responsive-item" src="./jpg/editor.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-md-5 form-group">
                    <div style="padding: 10px" id="move">
                                                <div style="margin-bottom: 20px; margin-top: 0" class="progress">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                40% Completado
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="lp1-form text-center">
                                Completa el siguiente formulario y accede ahora mismo al editor <b style="font-weight: 800">EXCLUSIVO</b>:
                            </div>
                            <form action="1enviar_email.php"  onsubmit="myButton.disabled = true; return true;" method="post" accept-charset="utf-8">
                            <div style="display: none">
                            <input id="tracker" type="hidden" name="tracker" value="Apps" />
                            <input type="hidden" name="ref" value="<?=$newpass;?>">" />
                            </div>                            <div class="row">
                                <div style="margin-bottom: 15px" class="col-md-12">
                                    <input type="text" name="Nombre" minlength="4"  value="" class="form-control form-control-lg" placeholder="Ingresa Tu Nombre Aquí..." required=""  />
                                </div>
                                <div style="margin-bottom: 15px" class="col-md-12">
                                    <input type="email" name="email" value="" class="form-control form-control-lg" placeholder="Tu Correo@Gmail o Yahoo...Solamente " required=""  />
                                </div>
                                <div class="col-md-12">

                 <input type="checkbox" name="condiciones" id='condiciones' value="Editor m3u"  required/>
                 No aceptamos otros correos para el editor en línea.</p>

                <input type="hidden" name="ip" value="<?=$ip;?>"></p>

                <input type="hidden" name="agent" value="<?=$agent;?>">



                                    <button name="myButton" type="submit" class="btn btn-primary btn-lg btn-block">
                                        Sí, Quiero Mi editor EXCLUSIVO. »
                                    </button>
                                </div>
                            </div>
                            </form>                        </div>
                        <div class="text-center small">* Tu información estará 100% Segura.</div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="container text-center">

<!-- footer -->

<?php
// Zona horaria del servidor
date_default_timezone_set("America/New_York");
echo "<p>Copyright &copy; 1999-" . date("Y") . " Editor.m3u</p>";
?>

<!-- {%FOOTER_LINK} -->
        </div>

</div>

        <script>
            // initialise on document ready
             {

                //Mover div hacer clic en video
                function errorAnim() {
                    $('#move').css('position', 'relative').animate({
                        'left': '+=10px'
                    }, 50).animate({
                        'left': '-=20px'
                    }, 100).animate({
                        'left': '+=20px'
                    }, 100).animate({
                        'left': '-=10px'
                    }, 50, function () {
                        $('#move').css('position', '');
                    });
                }

                $('#video').on('click', function () {
                    setTimeout(errorAnim, 500);
                    $("html, body").animate({scrollTop: $('#move').offset().top}, 500);
                });

            }
        </script>
    </body>

<a href="https://www.miapk.gurutv.xyz/player/"><img src="./svg/spacer.gif" alt="correo" width="1" height="1"></a>
</html>