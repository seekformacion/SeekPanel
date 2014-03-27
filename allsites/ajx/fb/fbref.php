<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

$fid="";$ref="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



function getUniqueCode($length){
$code = md5(uniqid(rand(), true));
return $code;
}


function create_new_user($REF){
$PID=strtoupper(getUniqueCode(9));
$res=DBUpIns("INSERT INTO Fb_fans (PID,REF) values ('$PID','$REF');");
return $PID;
}

if(!$fid){
$val['PID']=create_new_user($ref);
}else{
$inf=DBselect("select PID from Fb_fans WHERE FID='$fid';");
if(count($inf)>0){
$val['PID']=$inf[0]['PID'];	
}	
}

echo json_encode($val);

//http://seekformacion.com/ajx/fb/cApple.php?ref=5F5F46423609445E310C59A2FEA4CDDB&idp=1
?>

