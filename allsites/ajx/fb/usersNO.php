<?php
require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
if (isset($_COOKIE["seekforFB_ID"])){
	
$user= $_COOKIE["seekforFB_ID"];

$friends = $facebook->api("/$user/friends");

$allC=0;$allusers="";
foreach($friends['data'] as $key => $val){$allusers .=$val['id'] . ","; $allC++; $usserT[$val['id']]=1;} 
$allusers=substr($allusers, 0,-1);

$rk=DBselect("SELECT FID from Fb_fans WHERE FID IN ($allusers);"); 
if(count($rk)>0){foreach($rk as $kk =>$dato){$idIN=$dato['FID']; $usserSI[$idIN]=1;
}}

$listNO=""; $NoC=0;
foreach ($usserT as $nus => $un) {if(!array_key_exists($nus, $usserSI)){$listNO.=$nus . ",";$NoC++;}}
$listNO=substr($listNO, 0,-1);



$res['play']=$allC;
$res['nplay']=$NoC;

if($NoC>0){

$fil['name']='Amigos que aun no juegan';	
$fil['user_ids']=$listNO;
	
$res['filter']=$listNO; //"{name: 'Amigos que aun no juegan', user_ids: [$listNO]}";
}else{
$res['nomore']="1";		
}


echo json_encode($res);
}


?>