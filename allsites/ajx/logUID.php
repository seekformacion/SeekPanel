<?php
session_start(); //
//$idSES = session_id();
$id=""; $retC="";

//echo $idSES;

$user="";$pass="";$skpUID="";
//foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

if(array_key_exists('user', $_GET)){$user=$_GET['user'];}
if(array_key_exists('pass', $_GET)){$pass=$_GET['pass'];}

if(array_key_exists('skpUID', $_GET)){
$skpUID=$_GET['skpUID'];
}

$v['where']['view']='panel';
$v['where']['id']=1; 

require_once ('iniAJX.php');



includeCORE('funcs/funcSESSION');


if(($user)&&($pass)){

$res=DBselect("SELECT id, egestora, activo FROM skP_users WHERE user='$user' AND pass='$pass';");	
if(count($res)>0){$id=$res[1]['id']; $id_acc=$res[1]['egestora']; $activo=$res[1]['activo'];
if($activo==1){
$sesionData['id']=$id;
//$sesionData['idSES']=$idSES;	
$sesionData['id_acc']=$id_acc;

$res=DBselect("SELECT id_cent FROM skP_relAccCent WHERE id_acc=$id_acc;"); 
$cents="";
if(count($res)>0){foreach($res as $kk => $val){$idcc=$val['id_cent'];;
$centros['idcs'][]=$idcc; 
}};
$firstC=$centros['idcs'][0];

if (!isset($_COOKIE["selC"])){
$expire=time()+60*60*24*2;
setcookie("selC", $firstC, $expire, '/');
}
$resu['slc']=$firstC;


$cod=json_encode($sesionData);
$cod=encryptIt($cod);
}else{
global $datA; 	$datA['id']=$id_acc; $datA['user']=$user; 
$resu['activar']=loadChild('modulos','activar');
$cod="";	
}


}else{
$resu['off']="A ";	
}


if($id){if($cod){
$resu['on']=$cod;	
}}else{
$resu['off']="A ";	
}

	
}elseif($skpUID){$retC="";

//echo decryptIt($skpUID);
//echo "\n_________________________________\n";

$datos=json_decode(decryptIt($skpUID), TRUE);

//print_r($datos);
if(is_array($datos)){
//$chkSES=$datos['idSES'];
$cents="";
foreach ($datos['idcs'] as $key => $idc) {
$cents.=$idc . ",";	
}	
$cents=substr($cents,0,-1);

$firstC=$datos['idcs'][0];

if (!isset($_COOKIE["selC"])){
$expire=time()+60*60*24*2;
setcookie("selC", $firstC, $expire, '/');
}
$resu['slc']=$firstC;


$retC=$skpUID;	
}

if($retC){
$resu['on']=$retC;	
}else{
$resu['off']="B ";	
}



}else{
$resu['off']="C ";		
}






echo json_encode($resu);



?>