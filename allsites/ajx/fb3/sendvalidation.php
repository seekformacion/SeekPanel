<?php




foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('../iniAJX.php');        $v['conf']['db']="SeekforFB"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

includeCORE('mail/mail');

$user="15254451551"; $email="e.b.moya@gmail.com"; $PID="668B968EE7C191492D50900075863805";

if(array_key_exists('vCOD', $_COOKIE)){$valcod2=$_COOKIE['vCOD'];$sospechoso=1;}else{$valcod2=0;$sospechoso=0;}

$valcod=getUniqueCode(9);
setcookie("vCOD", $valcod, time() + (120 * 24 * 60 * 60), "/");


$from="concurso@publiactive.es";
$fromN="Validación";

$to="e.b.moya@gmail.com";
$toN="Eduardo Buenadicha";

$subject="Validación del perfil";

$message=loadChild('mails','validacion_concurso');
$plain="Este mensaje es para validar el perfil";

$vconf=array();

if(sendM($from,$fromN,$to,$toN,$subject,$message,$plain,'mailCDC.php',$vconf)==1){
$sed=DBUpIns("UPDATE Fb_fans SET v_email='$email', v_valcode='$valcod', v_sospechoso='$valcod2' WHERE PID='$PID';");




    
}


?>