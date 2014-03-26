<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$user=$_GET('user');

$user_permissions = $facebook->api("/$user/permissions");


$response = $facebook->api("/$user/likes/1424213751150594");

print_r($user_profile);


print_r($response);
?>