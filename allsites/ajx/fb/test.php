<?php

$user=$_GET['user'];

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';



$fql = "SELECT user_id FROM url_like WHERE url='http://masterenmasters.com/masters-en-direccion-de-operaciones.html' AND user_id = $user;";
$response = $facebook->api(array(
  'method' => 'fql.query',
  'query' =>$fql,
));

print_r($response);



?>