<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	


$response = $facebook->api("/$user/likes/1424213751150594");

$friends = $facebook->api("/$user/friends"); echo "/$user/friends";

print_r($friends);

$attachment = array(
    'message' => 'hola hola',
    'name' => 'titulo',
    'caption' => 'caption',
    'link' => 'http://seekformacion.com',
    'description' => 'descripcion',
    'picture' => 'http://masterenmasters.com/img/masterenmasters.com/allviews/cabcurso.gif',
  
);

/*
foreach($friendStack as $friend_data) {
    $friend_fb_id = $friend_data['fb_id'];
    $result = $facebook->api("/$friend_fb_id/feed/",'post',$attachment);
}


*/


?>