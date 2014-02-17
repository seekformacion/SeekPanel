<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

echo "$aT <br>";
$facebook->setAccessToken($code);

$user = $facebook->getUser();
echo "$user <br>";

$rd="http://seekformacion.com/ajx/fblog.php";
$rdU=urlencode($rd);

if(!$user){

$login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions') );
echo $login_url;

}else{

print_r($user);
	
}


$rd="http://seekformacion.com/ajx/fblog.php";
$rdU=urlencode($rd);


echo "https://graph.facebook.com/oauth/access_token?client_id=715730281795141&redirect_uri=$rdU&client_secret=59d82a1fcc819fc6579aba37ad1ec2c7&code=$code";


 /*
  * 
https://graph.facebook.com/oauth/access_token?client_id=715730281795141&redirect_uri=FACEBOOK_REDIRECT_URI&client_secret=59d82a1fcc819fc6579aba37ad1ec2c7&code=TOKEN_VALUE
  *  
 
$accessToken = $facebook->getAccessToken();
$facebook->setAccessToken($accessToken);

$user = $facebook->getUser();

$permissions = $facebook->api("/me/permissions");

print_r($user);
*/


?>