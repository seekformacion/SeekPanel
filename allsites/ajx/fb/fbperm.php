<?php
$code="";$do="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


//$facebook->setAccessToken($aT);
$user = $facebook->api('/me');

print_r($user);




?>