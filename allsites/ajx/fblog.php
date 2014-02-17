<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$user = $facebook->getUser();

$permissions = $facebook->api("/me/permissions");

print_r($user);

?>