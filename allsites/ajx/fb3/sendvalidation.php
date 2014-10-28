<?php
function encryptItS($string) {global $cryptKey; 
$output=ascii2hex((mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $string, MCRYPT_MODE_CBC, md5(md5($cryptKey)))));
//$output = str_replace("+", "%2B",$output);
//$output = str_replace(".", "|",$output);
return $output;
}




foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('../iniAJX.php');        $v['conf']['db']="SeekforFB"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

includeCORE('mail/mail');

//$user="15254451551"; $email="e.b.moya@gmail.com"; $PID="668B968EE7C191492D50900075863805";
$id=0;
$inf=DBselect("select id FROM Fb_fans WHERE PID = '$PID' AND FID='$FID';");     
if(count($inf)>0){$id=$inf[1]['id'];} 
 


if(array_key_exists('vCOD', $_COOKIE)){$valcod2=$_COOKIE['vCOD'];$sospechoso=1;}else{$valcod2=0;$sospechoso=0;}

$valcod=getUniqueCode(9);
setcookie("vCOD", $valcod, time() + (120 * 24 * 60 * 60), "/");


$from="concurso@publiactive.es";
$fromN="Validación concurso";

$to=$email;
$toN=$nombre;

$subject="Validación del perfil";

global $Datos;


$code=$FID;
$code= encryptItS($code);


$Datos['enlace']="https://www.seekformacion.com/ajx/fb3/validacion.php?cod=$code";
$message=loadChild('mails','validacion_concurso');
$plain="Este mensaje es para validar el perfil";

$vconf=array();

$envio=sendM($from,$fromN,$to,$toN,$subject,$message,$plain,'mailCDC.php',$vconf);
//$envio=1;

if($envio==1){
$sed=DBUpIns("UPDATE Fb_fans SET v_email='$email', v_valcode='$valcod', v_sospechoso='$valcod2' WHERE PID='$PID';");
$resp['ok']=1;    
}else{
$resp['ok']=1;   
}

echo json_encode($resp);



?>