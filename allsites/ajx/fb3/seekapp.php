<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
$code="";$do="";$user=0;
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$loginUrl = $facebook->getLoginUrl();
$user = $facebook->getUser();
if(!$user){header("Location: $loginUrl");}else{

$user_permissions = $facebook->api("/$user/permissions");
if(isset($user_permissions["data"][0]["user_likes"])){$participa=1;}else{$participa=0;}

//print_r($user_permissions);
//echo $user;

if($participa){include('participa.php');}else{include('noparticipa.php');};

}




?>