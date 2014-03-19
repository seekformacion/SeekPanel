<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################
global $idSES;
$idSES = session_id();$id=""; $idcat="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_POST)){$skpUID=$_POST['skpUID'];}
if(array_key_exists('idc', $_POST)){$idc=$_POST['idc'];}
if(array_key_exists('idcur', $_POST)){$id=$_POST['idcur'];}


if($skpUID){
$datos=getDatSKUID($skpUID);
if(($datos)&&($datos['cent_sel']==$idc)&&(array_key_exists($idc, $datos['centAllow']))){	
##########################
$inf=DBselect("SELECT id_centro FROM skP_cursos WHERE id=$id;");
if($inf[1]['id_centro']==$idc){
	
	
$id_centro=$_POST['idc'];
$nombre=addslashes($_POST['nom']);
$cd1=addslashes($_POST['cd1']);
$cd2=addslashes($_POST['cd2']);
$cd3=addslashes($_POST['cd3']);
$cd4=addslashes($_POST['cd4']);
$cur_id_tipocurso=addslashes($_POST['id_tipo']);
$cur_id_metodo=addslashes($_POST['id_met']);
$cur_id_certificado=addslashes($_POST['id_titul']);
$cur_titoficial=addslashes($_POST['txt_titul']);
$cur_precio=addslashes($_POST['eur']);
$cur_mostarprecio=addslashes($_POST['show']);
$cur_facilidad=addslashes($_POST['ayu']);
$cur_practicas=addslashes($_POST['pract']);
$cur_otrosdatos=addslashes($_POST['odat']);
$cur_duracion=addslashes($_POST['dur']);
$cur_descripcion=addslashes($_POST['desc']);
$cur_dirigidoa=addslashes($_POST['diri']);
$cur_paraqueteprepara=addslashes($_POST['prepa']);
$cur_edadmin=addslashes($_POST['emin']);
$cur_edadmax=addslashes($_POST['emax']);
$temario=addslashes($_POST['temario']);
$cur_palclave=addslashes($_POST['kyw']);
$cur_minestudi=addslashes($_POST['id_esmin']);
$cur_cat=addslashes($_POST['id_cat']);


$q="UPDATE skP_cursos 
SET 
nombre='$nombre', 
cd1='$cd1', 
cd2='$cd2', 
cd3='$cd3', 
cd4='$cd4', 
cur_id_tipocurso='$cur_id_tipocurso', 
cur_id_metodo='$cur_id_metodo', 
cur_id_certificado='$cur_id_certificado', 
cur_titoficial='$cur_titoficial', 
cur_precio='$cur_precio', 
cur_mostarprecio='$cur_mostarprecio', 
cur_facilidad='$cur_facilidad', 
cur_practicas='$cur_practicas', 
cur_otrosdatos='$cur_otrosdatos', 
cur_duracion='$cur_duracion', 
cur_descripcion='$cur_descripcion', 
cur_dirigidoa='$cur_dirigidoa', 
cur_paraqueteprepara='$cur_paraqueteprepara', 
cur_edadmin='$cur_edadmin', 
temario='$temario', 
cur_palclave='$cur_palclave', 
cur_minestudi='$cur_minestudi', 
cur_cat='$cur_cat' 
WHERE id=$id;";


DBUpIns($q);

//echo $q;


$sedes=substr($_POST['sedes'],0,-1);


$datestamp=strtotime( date('Y') . '-' . date('m') . '-'  . date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('s')); // It'll probably be better using mktime
$datestamp=$datestamp+(60*60*6); // 60 seconds times 60 minutes times 13 hours

$eqP[1]='Curso:';
$eqP[2]='Master:';
$eqP[3]='Fp: Grado:';
$eqP[4]='Oposición:';

$idp=$_POST['idp'];



$raiz=$eqP[$idp];
$codTittle="$raiz $nombre";


$sed=DBUpIns("UPDATE skP_C_urls SET codTittle='$codTittle', pagTittle='$nombre', pagTittleC='$nombre' WHERE t_id=$id;");
$sed=DBUpIns("UPDATE skP_cur_sedes SET sedes='$sedes' WHERE id=$id;");
$sed=DBUpIns("INSERT INTO skP_actions (accion,act_id,datestamp) VALUES (5,$id,$datestamp);");

}
#########################
}}


?>

              
