<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	

echo "/$user/likes/1424213751150594";
$response = $facebook->api("/$user/likes/1424213751150594");

 //$user_profile = $facebook->api("/$user");

print_r($response);

?>