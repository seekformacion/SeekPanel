<?php
$code="";$do="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if($aT){
$facebook->setAccessToken($aT);
}elseif($code){
$getaT= "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=https%3A%2F%2Fseekformacion.com%2Fajx%2Ffblog.php&client_secret=$app_secret&code=$code";
$content = file_get_contents($getaT);
$datos=explode('&',$content);
foreach($datos as $key => $valor){ if(strlen($valor) > strlen(str_replace('access_token=','',$valor)) ) { $access_token=str_replace('access_token=','',$valor);} };
$facebook->setAccessToken($access_token);
}



$user = $facebook->getUser();
if(!$user){

$login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions') );
$res['log']= $login_url;

}else{

$res['id']=$user;
	
}

if($do=='out'){
echo "<script>window.close();</script>";	
}else{
echo json_encode($res);
}


 /*
  * 
https://graph.facebook.com/oauth/access_token?client_id=715730281795141&redirect_uri=FACEBOOK_REDIRECT_URI&client_secret=59d82a1fcc819fc6579aba37ad1ec2c7&code=TOKEN_VALUE
https://seekformacion.com/ajx/fblog.php?code=AQD_4VEdg6CgWv8uSRRgLgW2a8YTKX6PMQc0GFH
  * kT_iXvt97skFKgBeHX1wcK4MA-ooiDibk1CASLA90gsIT-9onTwtcrC2GRCSncmNQ-V8MxIfL_zHk47euX_hLeVAm-nxqtMCY9ikDB72dfhi4d3pf7
  * ZpeJHH2XtwKnD4vZs5qprKUOwATsezoITnemToLwI2NZykxQTzTZyu5zGRGpNnTIpJog4lUhFgvuT70Jr7UGzvYH2KCwYjyxfJ5AMJ6Dqw4Uem-5z0
  * OpLcEJujjcUc-HqYV16Lr0P8iQf-RCYqCAsN-BAjZiunYah_Te4K4LC4&state=0f829704a440b1fc37b34c577030763a#_=_
  *   *  
 
$accessToken = $facebook->getAccessToken();
$facebook->setAccessToken($accessToken);

$user = $facebook->getUser();

$permissions = $facebook->api("/me/permissions");

print_r($user);
*/


?>