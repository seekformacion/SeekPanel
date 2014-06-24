<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
$expire=time()+60*60*24*500;

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;

$hoy=date('Y') . date('m') . date('d');

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';




$idu=DBselect("SELECT id FROM Fb_fans WHERE FID=$user;"); 
if(array_key_exists(1, $idu)){
	

$urls=DBselect("SELECT * FROM fid_urls WHERE FID=$user AND date=$hoy;");	
if(count($urls)==0){
$idp=1;	
while ($idp <= 4){	
$nurls=DBselect("SELECT id FROM urls WHERE idp=$idp ORDER BY count ASC, peso DESC limit 20;");	### busco nuevas
$nc=count($nurls);
if($nc>0){$get=rand(1, $nc);
$id=$nurls[$get]['id'];
DBUpIns("INSERT INTO fid_urls (FID,idURL,date) VALUES ('$user',$id,'$hoy');");	
	
}



$idp++;}

	
}else{
	
}	
	
	
	
}





?>