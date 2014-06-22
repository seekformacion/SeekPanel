<?php

$user=$_GET['user'];

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';




echo $user . "\n";


$fql = "SELECT user_id FROM url_like WHERE url='http://cursodecursos.com/cursos-de-informatica.html';";
$response = $facebook->api(array(
  'method' => 'fql.query',
  'query' =>$fql,
));

print_r($response);



?>