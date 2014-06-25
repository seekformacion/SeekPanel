<?php
set_time_limit(0);
ini_set("memory_limit", "-1");


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
$ap=DBselect("SELECT FID, puntos FROM Fb_fans WHERE puntos < 400 AND env=0;");

$ap=array();
$ap[1]['FID']=100007329815113;
$ap[1]['puntos']=0;

foreach ($ap as $key => $value) {$user=$value['FID']; $puntos=$value['puntos'];

DBUpIns("UPDATE Fb_fans SET env=1 WHERE FID=$user;");	

if($puntos==0){
$mens="Para participar en el sorteo necesitas tener algún punto.";	
}else{
$mens="Tienes muy pocos puntos. Cuantos más puntos, más posibilidades en el sorteo.";		
}

$response = $facebook->api( "/$user/notifications", 'POST', array(

                'template' => 'Nueva forma de obtener puntos',

                'href' => 'newpuntos',

                'access_token' => $app_access_token

                
            ) );    

print_r($response);


echo $user . " <br>\n";
	
}







?>