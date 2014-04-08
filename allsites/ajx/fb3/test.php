<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F
########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';



$app_id = "715730281795141";
$app_secret = "59d82a1fcc819fc6579aba37ad1ec2c7";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));


$accessToken = $facebook->getAccessToken();
$user = $facebook->getUser();


echo $accessToken . "\n";
echo $user . "\n";


?>