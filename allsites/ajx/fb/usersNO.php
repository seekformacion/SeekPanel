<?php
require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
if (isset($_COOKIE["seekforFB_ID"])){
	
$user= $_COOKIE["seekforFB_ID"];

$friends = $facebook->api("/$user/friends");

print_r($friends);


//$rk=DBselect("select distinct puntos as rk from Fb_fans ORDER BY rk DESC;");
};


?>

