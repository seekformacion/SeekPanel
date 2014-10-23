<?php
################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('../iniAJX.php');        $v['conf']['db']="SeekforFB"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################


$v['where']['view']='cms';
$v['where']['id']=6;

$v['where']['pagTittle']="Validación del perfil";


echo loadChild('objt','paginaV');
?>
