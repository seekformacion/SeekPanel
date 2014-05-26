<?php

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

$id=""; $bol="";
if(array_key_exists('id', $_GET)){$id=$_GET['id'];}
if(array_key_exists('bol', $_GET)){$bol=$_GET['bol'];}

if(($id)&&($bol)){
DBUpInsSDB("UPDATE envios SET baja=1 WHERE id_boletin=$id AND email = '$bol';",'SeekforFB');		
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #CCCCCC !important;}	
.page {width: 700px; background-color: #ffffff;
    height: 1000px;
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }


</style>




<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>Baja del fichero</title>
</head>

<body class="gris1_BG">
	
<div class="page" id="page">

<img style="position: relative; float: left; width: 200px;" src="/img/pbactive/pbactlogo.png">

<div style="position:absolute; top:100px; left:100px; border:1px solid green;  padding: 10px; width: 500px; font-family: Arial; font-size:12px; color:#888888;">
Sus datos han sido eliminados de nuestro fichero informático. Muchas Gracias.	
</div>

</div>
</body>
</html>