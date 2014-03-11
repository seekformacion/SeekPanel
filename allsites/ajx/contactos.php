
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php


################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		$v['conf']['db']="seekformacion"; // cargo otra bd
##########################




$inf=DBselect("select idc, 
(select urlpixel from skv_centros where id=idc) as pix,
(select nombre from skv_centros where id=idc) as nomc, 
(select web from skv_centros where id=idc) as w, 
(select count(id) from skv_cursos where skv_cursos.id_centro=idc) as c, 
nom, tel, mail
 from contactos order by pix;");

$count=array();$contact=array();$count2=array();
foreach ($inf as $ky => $v){
$idc=$v['idc'];
$trc=str_replace('http://','',$v['pix']); $strs=explode('/',$trc); $trc=$strs[0];

$nomc[$idc]=$v['nomc'];
$webs[$idc]=$v['w'];
if($trc=='midominio.com'){$trc=$v['nomc'];}	


if(array_key_exists($idc, $count)){$count[$idc]=$count[$idc]+$v['c'];}else{$count[$idc]=$v['c'];}
if(array_key_exists($trc, $count2)){$count2[$trc]=$count2[$trc]+$v['c'];}else{$count2[$trc]=$v['c'];}


$contact[$idc][$ky]['n']=$v['nom'];
$contact[$idc][$ky]['t']=$v['tel'];		
$contact[$idc][$ky]['m']=$v['mail'];		

$dt[$trc][$idc]=1;

}

arsort($count2);

foreach ($count2 as $trc => $curs) {
		
echo ";;;;;<br>\n"; echo ";;;;;<br>\n"; echo ";;;;;<br>\n"; 

$lids="";
foreach ($dt[$trc] as $idc => $kk){$lids .="$idc,";}
$lids=substr($lids, 0,-1);

echo "'$curs';'$trc: $lids';;;;<br>\n"; 	

foreach ($dt[$trc] as $idc => $kk){
echo ";;;;;<br>\n";	
$nomcc=$nomc[$idc];	$wev=$webs[$idc];
echo ";'$idc:$nomcc';'$wev';;;<br>\n"; 	

foreach ($contact[$idc] as $key => $vals) {$nomp=$vals['n'];$tel=$vals['t'];$mail=$vals['m'];
echo ";;'$nomp';'$tel';'$mail';<br>\n"; 	
}



}}

//print_r($dt);

?>
	