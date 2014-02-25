<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	

if (isset($_COOKIE["seekforFB_PID"])){$ref= $_COOKIE["seekforFB_PID"];};	


$portales[1]="cursodecursos.com";
$portales[2]="masterenmasters.com";
$portales[3]="fp-formacionprofesional.com";
$portales[4]="oposicionesa.com";


$url="https://" . $portales[$idp] . "/ajx/cApple.php?ref=$ref&idp=" . $idp;

$post= $facebook->api("/$user/feed", 'post',  array(
                                      'link' => $url,
                                      'message' => 'Ayudadme a ganar este concurso, solo teneis que dar a "Me gusta"'
                                 ) );


echo $url;

print_r($post);

?>