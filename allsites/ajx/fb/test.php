<?php

$user=$_GET['user'];

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

/*

$fql = "SELECT user_id FROM url_like WHERE url='http://masterenmasters.com/masters-en-direccion-de-operaciones.html' AND user_id = $user;";
$response = $facebook->api(array(
  'method' => 'fql.query',
  'query' =>$fql,
));

print_r($response);
*/

$app_access_token = $app_id . '|' . $app_secret;
$ap=DBselect("SELECT FID FROM Fb_fans WHERE puntos >= 400;");
foreach ($ap as $key => $value) {$user=$value['FID'];

/*
$response = $facebook->api( "/$user/notifications", 'POST', array(

                'template' => 'Nueva forma de obtener puntos',

                'href' => 'newpuntos',

                'access_token' => $app_access_token

                
            ) );    

print_r($response);
*/

echo $user . " <br>\n";
	
}







?>