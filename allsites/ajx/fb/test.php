<?php

$user=$_GET['user'];

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';




echo $user . "\n";


$user_permissions = $facebook->api("/$user/permissions");


$response = $facebook->api("/$user/likes");

print_r($user_permissions);

$graphObject = $response->getGraphObject();

print_r($graphObject);
?>