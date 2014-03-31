<?php
################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
##########################




$inf=DBselect("select * from skP_users where id > 3 order by activo DESC;");


echo "Activos <br>"; $f=0;
foreach ($inf as $ky => $vall){

if(($activo==0)&&(!$f)){$f++;echo "<br>Pendientes <br>";}

$user=$vall['user']; $activo=$vall['activo'];
	
echo "$user <br>";	
	
}

?>