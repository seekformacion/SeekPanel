<?php
$code="";$do="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


//$facebook->setAccessToken($aT);
$user = $facebook->getUser();


if(!$user){

$login_url = $facebook->getLoginUrl( array( 'redirect_uri' => $redirect, 'scope' => 'publish_stream,publish_actions') );
$res['log']= $login_url;

}else{

$res['id']=$user;
	
}


echo json_encode($res);


?>