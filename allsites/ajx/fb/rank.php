<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_FID"])){$user= $_COOKIE["seekforFB_FID"];};	


 $user_profile = $facebook->api("/$user");

print_r($user_profile);

?>