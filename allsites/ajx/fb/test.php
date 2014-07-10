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
$response=array();
$app_access_token = $app_id . '|' . $app_secret;
$ap=DBselect("SELECT FID FROM Fb_fans WHERE puntos >= 400 AND url_likes=0 AND FID > 100 AND env=1;");
foreach ($ap as $key => $value) {$user=$value['FID'];

DBUpIns("UPDATE Fb_fans SET env=2 WHERE FID=$user;");	

$response = $facebook->api( "/$user/notifications", 'POST', array(

                'template' => 'Te recordamos que existe una nueva forma de obtener puntos.',

                'href' => 'newpuntos',

                'access_token' => $app_access_token

                
            ) );    

print_r($response);

if(count($response)>0){
DBUpIns("UPDATE Fb_fans SET env=2 WHERE FID=$user;");		
}
echo $user . " <br>\n";
	
}







?>