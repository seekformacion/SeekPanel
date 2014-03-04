<?php

function getsubmod($idsec){global $v;

$donde=$v['path']['bin'] . "/allsites/modulos_sub/html/allviews/$idsec" . "_m_*.html";
//echo $donde;	

$files=glob($donde);
//print_r($files);

foreach ($files as $key => $path) {
$f = fopen($path, 'r');
$line = fgets($f);
fclose($f);

$valP=json_decode(trim($line), true);

$idsub=str_replace($v['path']['bin'] . "/allsites/modulos_sub/html/allviews/$idsec" . "_m_", '', $path);
$idsub=str_replace('.html', '', $idsub);
$valores[$idsub]['tit']=$valP['tit'];	
$valores[$idsub]['h']=$valP['h'];
$valores[$idsub]['st']=$valP['st'];	
$valores[$idsub]['expand']=$valP['expand'];	
	
}


return $valores;	
}

?>

