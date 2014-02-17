<?php

######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F

########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';




$config = array();
$config['appId'] = '715730281795141';
$config['secret'] = '59d82a1fcc819fc6579aba37ad1ec2c7';
$config['fileUpload'] = false; // optional

$facebook = new Facebook($config);



$user = $facebook->getUser();
if ($user) {$user_profile = $facebook->api('/me');};
$id_user=$user_profile['id'];

echo $id_user;

$response = $facebook->api("/$id_user/likes");
print_r($response);


?>