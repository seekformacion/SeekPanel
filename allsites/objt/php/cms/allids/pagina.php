<?php 


$idcms=$v['where']['id'];


if($idcms==1){$Datos['contenido']=loadChild('objt','login');};
if($idcms==100){$Datos['contenido']=loadChild('objt','home');};
if($idcms==101){$Datos['contenido']=loadChild('objt','contacto');};

$Datos['metas']=loadChild('objt','metas');






?>