<?php

$excludes["cursodecursos.com"]=1;
$v['path']['httpd']="/www/httpd";




$urls[]="/panel";
$urls[]="/login";
$urls[]="/panel/cupones";
$urls[]="/panel/ad_curso";
$urls[]="/panel/listcur";
$urls[]="/panel/editCur";
$urls[]="/contacto";
$urls[]="/";



print_r($urls);


foreach ($urls as $key => $value) {
$url="http://www.seekformacion.com" . $value;	
refress('www.seekformacion.com',$url,$value);	
}















$directories = glob($v['path']['httpd'] . '/*' , GLOB_ONLYDIR);

foreach ($directories as $key => $path) {
$domain=str_replace($v['path']['httpd'] . "/", '', $path)	;

	
	
if(!array_key_exists($domain, $excludes)){
$domains[]=$domain;	
}	
}

foreach ($domains as $key => $dom) {
	
$dir = glob($v['path']['httpd'] . "/$dom/cskin/css/A/*.css");
limpia($dir, $v['path']['httpd'], $dom);

$dir = glob($v['path']['httpd'] . "/$dom/cskin/css/B/*.css");
limpia($dir, $v['path']['httpd'], $dom);


$dir = glob($v['path']['httpd'] . "/$dom/cskin/css/*.css");
limpia($dir, $v['path']['httpd'], $dom);

$dir = glob($v['path']['httpd'] . "/$dom/cskin/js/*.js");
limpia($dir, $v['path']['httpd'], $dom);
	
}



function limpia($arr, $quito, $dom){
foreach ($arr as $key => $value) {
$path=str_replace("$quito/$dom", '', $value);
$url="http://$dom" . $path;	 echo $url;	
refress($dom,$url,$path);
}
}


function refress($idp,$url,$path){
exec("varnishadm -T 127.0.0.1:6082 -S /etc/varnish/secret ban \"req.http.host == $idp && req.url == $path\"") . "\n";
usleep(8000);
$content = file_get_contents($url);	
echo "\n\n" . $url . "\n\n";
}







?>


