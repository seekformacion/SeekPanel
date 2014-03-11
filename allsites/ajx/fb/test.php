<?php

require '/home/ebmoya/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/fbdata.php';




$user_permissions = $facebook->api("/1018154356/permissions");
$user_profile = $facebook->api('/1018154356/likes','GET');

print_r($user_profile);
?>