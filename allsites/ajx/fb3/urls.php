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
print_r($idu);
if(array_key_exists(1, $idu)){
	
echo $hoy;	
	
	
	
	
}





?>