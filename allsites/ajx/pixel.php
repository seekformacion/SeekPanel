<?php

/*
$sname=$_SERVER['SCRIPT_NAME'];
$sname=str_replace('/pixel/p_', '', $sname);
$sname=str_replace('.gif', '', $sname);
$datos=explode('_',$sname);

$mail=$datos[0];
$asunto=$datos[1];
$id_bol=$datos[2];

echo "$mail $asunto $id_bol";


################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		$v['conf']['db']="SeekforFB"; // cargo otra bd
//includeCORE('funcs/funcSESSION');
##########################
//DBUpInsSDB("UPDATE envios SET open=1 WHERE id_boletin=$id_bol;",'SeekforFB');	

 

$my_img = imagecreate( 650, 1 );
$background = imagecolorallocate( $my_img, 255, 255, 255 );

header( "Content-type: image/gif" );
imagegif( $my_img );
imagecolordeallocate( $my_img , $background );
imagedestroy( $my_img );

//$im = imagecreatetruecolor(650, 1);

// sets background to red
//$red = imagecolorallocate($im, 255, 255, 255);
//imagefill($im, 0, 0, $red);

//header('Content-type: image/gif');
//imagegif($im);
//imagedestroy($im);

 * 
 * 
 * 
 */
 
$im = file_get_contents("/www/httpd/publiactive.net/amazonlogo.gif");
header("Content-type: image/gif");
echo $im;


?>