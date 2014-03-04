<?php

global $ids; global $tit; global $hM;

$path=$v['path']['bin'] . "/allsites/modulos_sub/html/allviews/" . $v['where']['id'] . "_h_$ids.html";
$f = fopen($path, 'r');
$line = fgets($f);
fclose($f);
$valP=json_decode(trim($line), true);

$Datos['hH']=$valP['h']; $Datos['hM']=$hM;
$Datos['ids']=$ids;
$Datos['txthelp']=loadChild('modulos_sub',$v['where']['id'] . "_h_$ids");


?>