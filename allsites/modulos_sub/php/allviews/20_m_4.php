<?php
//print_r($v);

$Datos['opcert']="<option value=''>Seleccione</option>";	
foreach ($v['vars']['certi'] as $idcert	=> $nomcert) {
$Datos['opcert'].="<option value='$idcert'>$nomcert</option>";	
}


$Datos['opesmin']="<option value=''>Seleccione</option>";	
foreach ($v['vars']['esmin'] as $idcert	=> $nomcert) {
$Datos['opesmin'].="<option value='$idcert'>$nomcert</option>";	
}


?>