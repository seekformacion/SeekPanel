<?php
session_start(); $idSES = session_id();$id="";

$user="";$pass="";$skpUID="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');

includeCORE('funcs/funcSESSION');


if(($user)&&($pass)){

$res=DBselect("SELECT id FROM skP_users WHERE user='$user' AND pass='$pass'");	
if(count($res)>0){$id=$res[1]['id'];

$sesionData['id']=$id;
$sesionData['idSES']=$idSES;	

$cod=json_encode($sesionData);
$cod=encryptIt($cod);
}


if($id){
$resu['on']=$cod;	
}else{
$resu['off']=1;	
}

	
}elseif($skpUID){$retC="";


//echo decryptIt($skpUID);
$datos2=json_decode(decryptIt($skpUID));
$datos = get_object_vars($datos2);

//print_r($datos);
if(array_key_exists('idSES', $datos)){
$chkSES=$datos['idSES'];
if($chkSES==$idSES){
$retC=urlencode($skpUID);	
}}

if($retC){
$resu['on']=$retC;	
}else{
$resu['off']=1;	
}



}






echo json_encode($resu);



?>