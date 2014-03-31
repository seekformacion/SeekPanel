<?php
set_time_limit(0);
ini_set("memory_limit", "-1");


include('/www/dbP.php');

$v['debug']=0;
$v['admin']=0;

$v['conf']['state']=1; # 1=test 2=produccion
$v['conf']['mode']=1; # 1=local 2=cloud
$v['where']['idp']=						1; #### ID DEL PORTAL PARA TABLA urls
$v['where']['view']=					'scripts'; #### ID DEL PORTAL PARA TABLA urls
$v['where']['id']=					    '1'; 
$v['where']['site']=					"seekformacion.com";



$v['path']['bin']=$v['path']['repo'] .	"/SeekPanel";
$v['path']['fw']=$v['path']['repo'] .	"/FrameW_1";
$v['path']['img']=$v['path']['repo'] .	"/SeekFormacion_images";

$v['path']['baseURLskin'][1]=""; ## baseURL del SKIN local
$v['path']['baseURLskin'][2]="http://s3-eu-west-1.amazonaws.com/seekf"; ## baseURL del SKIN en CLOUD




 
require_once $v['path']['fw'] . '/core/templates/paths.php';



includeINIT('vars');
includeINIT('provins');
includeINIT('config');
includeCORE('db/dbfuncs');
includeCORE('templates/templates');


includeCORE('mail/mail');




$from="test@seekformacion.com";
$fromN="Test Seek Formación";

//$to="e.b.moya@gmail.com";
//$toN="Eduardo Buenadicha";

$to="natalia_segura@hotmail.com";
$toN="Natalia Segura";




$subject="Esta es una prueba con acentos á é í ó ú y ñ y mola un güevo";
$message=loadChild('mails','cupon');;


sendM($from,$fromN,$to,$toN,$subject,$message);








?>