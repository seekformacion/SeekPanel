<?php

print_r($_SERVER);

$sname=$_SERVER['SCRIPT_NAME'];
$sname=str_replace('/pixel/p_', '', $sname);
$sname=str_replace('.gif', '', $sname);
$datos=explode('_',$sname);

$mail=$datos[0];
$asunto=$datos[1];
$id_bol=$datos[2];

echo "$mail $asunto $id_bol";

?>