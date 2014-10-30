<?php
set_time_limit(0);
ini_set("memory_limit", "-1");


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

$users_ban[545870963]=1;
$users_ban[100001770109514]=1;
$users_ban[638135366]=1;


/*

$fql = "SELECT user_id FROM url_like WHERE url='http://masterenmasters.com/masters-en-direccion-de-operaciones.html' AND user_id = $user;";
$response = $facebook->api(array(
  'method' => 'fql.query',
  'query' =>$fql,
));

print_r($response);
*/

$app_access_token = $app_id . '|' . $app_secret;
$ap=DBselect("SELECT FID, puntos FROM Fb_fans WHERE puntos > 0 AND env=0;");



$ap=array();
$ap[1]['FID']=100007329815113;
$ap[1]['puntos']=10;
$ap[2]['FID']=545870963;
$ap[1]['puntos']=10;



foreach ($ap as $key => $value) {$user=$value['FID']; $puntos=$value['puntos'];
DBUpIns("UPDATE Fb_fans SET env=1 WHERE FID=$user;");	

$mens="La promoción ha finalizado";

if(!array_key_exists($user, $users_ban)){
$response = $facebook->api( "/$user/notifications", 'POST', array(
                'template' => $mens,
                'href' => 'newpuntos',
                'access_token' => $app_access_token
                        ) );    

print_r($response);
echo $user . " \n";
}else{
echo $user . " \n";    
}


	
}







?>