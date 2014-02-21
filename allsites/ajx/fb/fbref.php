<?php
require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



function getUniqueCode($length){
$code = md5(uniqid(rand(), true));
return $code;
}


function create_new_user(){




if (isset($_COOKIE["seekforFB_REFDE"])){$REF= $_COOKIE["seekforFB_REFDE"];}

$PID=strtoupper(getUniqueCode(9));
$res=DBUpIns("INSERT INTO Fb_fans (PID,REF) values ('$PID','$REF');");

return $PID;

}


$val['PID']=create_new_user($ref);

echo json_encode($val);


?>