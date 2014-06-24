<?php

$user=$_GET['user'];

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';



$fql = 'SELECT user_id FROM url_like WHERE url="http://cursodecursos.com/eae-deusto/direccion-de-recursos-humanos-semipresencial-en-barcelona.html" AND user_id = 100007329815113;';
$response = $facebook->api(array(
  'method' => 'fql.query',
  'query' =>$fql,
));

print_r($response);

/*
$app_access_token = $app_id . '|' . $app_secret;

$response = $facebook->api( "/$user/notifications", 'POST', array(

                'template' => 'Nueva forma de obtener puntos',

                'href' => 'newpuntos',

                'access_token' => $app_access_token

                
            ) );    

print_r($response);

*/
?>