<?php

global $v;



include('/www/dbP.php');  

#print_R($_POST);

#print_R($_GET);

$v['debug']=0;
$v['admin']=0;

$v['conf']['state']=1; # 1=test 2=produccion
$v['conf']['mode']=1; # 1=local 2=cloud


########################################################### VARIABLES DE ENTORNO
$v['where']['idp']=						1; #### ID DEL PORTAL PARA TABLA urls

$v['where']['site']=					"cursodecursos.com";
$v['path']['repo']=						"/home/ebmoya/repositorios";
$v['path']['bin']=$v['path']['repo'] .	"/SeekPanel";
$v['path']['fw']=$v['path']['repo'] .	"/FrameW_1";
$v['path']['img']=$v['path']['repo'] .	"/SeekFormacion_images";
$v['path']['httpd']=					"/home/ebmoya/httpd/" . $v['where']['site'];

$v['path']['baseURLskin'][1]=""; ## baseURL del SKIN local
$v['path']['baseURLskin'][2]="http://s3-eu-west-1.amazonaws.com/seekf"; ## baseURL del SKIN en CLOUD


#######################################################  INICIO DE APLICACION


require_once $v['path']['fw'] . '/core/templates/paths.php';



includeINIT('vars');
includeINIT('provins');
includeINIT('config');
includeCORE('db/dbfuncs');
includeCORE('templates/templates');
includeCORE('funcs/general');





?>