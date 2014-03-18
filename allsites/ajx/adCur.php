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



if($skpUID){
$datos=getDatSKUID($skpUID);
if($datos){			
##########################

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

$q="INSERT INTO skP_cursos (id_centro,
nombre,cd1,cd2,cd3,cd4,cur_id_tipocurso,      
cur_id_metodo,cur_id_certificado,cur_titoficial,        
cur_precio,cur_mostarprecio,cur_facilidad,cur_practicas,cur_otrosdatos,
cur_duracion,cur_descripcion,cur_dirigidoa,cur_paraqueteprepara,cur_edadmin,cur_edadmax,temario,
cur_palclave,cur_minestudi,cur_cat) VALUES (
'$id_centro',
'$nombre',
'$cd1',
'$cd2',
'$cd3',
'$cd4',
'$cur_id_tipocurso',
'$cur_id_metodo',
'$cur_id_certificado',
'$cur_titoficial',
'$cur_precio',
'$cur_mostarprecio',
'$cur_facilidad',
'$cur_practicas',
'$cur_otrosdatos',
'$cur_duracion',
'$cur_descripcion',
'$cur_dirigidoa',
'$cur_paraqueteprepara',
'$cur_edadmin',
'$cur_edadmax',
'$temario',
'$cur_palclave',
'$cur_minestudi',
'$cur_cat'
);";

$idcur=DBUpInsL($q);


$sedes=substr($_POST['sedes'],0,-1);

//echo $idcur;
//$inf=DBselect("SELECT sedes FROM skP_cur_sedes WHERE id=$idcur");
//if(count($inf)>0){if()}
//$datestamp=date('Y') . date('m') . date('d') . date('H') . date('i') . date('s');

$datestamp=strtotime( date('Y') . '-' . date('m') . '-'  . date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('s')); // It'll probably be better using mktime
$datestamp=$datestamp+(60*60*6); // 60 seconds times 60 minutes times 13 hours

$eqP[1]='Curso:';
$eqP[2]='Master:';
$eqP[3]='Fp: Grado:';
$eqP[4]='Oposición:';

$idp=$_POST['idp'];
$url=$_POST['url'];
if(array_key_exists('url', $_POST)){$url=$_POST['url'];}
$inf=DBselect("SELECT nombre_corto FROM skP_centros WHERE id=$id_centro;");
$cent_url=$inf[1]['nombre_corto'];
$url="/$cent_url/$url";
$raiz=$eqP[$idp];
$codTittle="$raiz $nombre";


$sed=DBUpIns("INSERT INTO skP_C_urls (idp,url,tipo,t_id,codTittle,pagTittle,pagTittleC) VALUES ($idp,'$url',2,$idcur,'$codTittle','$nombre','$nombre');");
$sed=DBUpIns("INSERT INTO skP_cur_sedes (id,sedes) VALUES ($idcur,'$sedes');");
$sed=DBUpIns("INSERT INTO skP_actions (accion,act_id,datestamp) VALUES (1,$idcur,$datestamp);");


#########################
}}


?>

              
