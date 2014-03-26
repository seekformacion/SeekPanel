<?php

require '/home/ebmoya/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/fbdata.php';




$user_permissions = $facebook->api("/1052060952/permissions");
$user_profile = $facebook->api('/1052060952/','GET');

$response = $facebook->api("/1052060952/likes/1424213751150594");

print_r($user_profile);
print_r($user_permissions);
print_r($response);
?>