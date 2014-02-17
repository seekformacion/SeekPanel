<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
//require '/www/httpd/seekformacion.com/fbdata.php';


$app_id = "715730281795141";
$app_secret = "59d82a1fcc819fc6579aba37ad1ec2c7";
$facebook = new Facebook(array(
    'appId' => $app_id,
    'secret' => $app_secret,
    'cookie' => true
));


echo "$aT <br>";
$facebook->setAccessToken($aT);

$user = $facebook->getUser();
echo "$user <br>";


if(!$user){

$login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions') );
echo $login_url;

}else{

print_r($user);
	
}


 /*
$accessToken = $facebook->getAccessToken();
$facebook->setAccessToken($accessToken);

$user = $facebook->getUser();

$permissions = $facebook->api("/me/permissions");

print_r($user);
*/


?>