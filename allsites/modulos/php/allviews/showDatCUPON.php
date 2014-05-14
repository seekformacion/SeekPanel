<?php
global $inf2;
global $DatHTML;



$EqEST[1]="Sin estudios";
$EqEST[2]="Graduado escolar";
$EqEST[3]="ESO";
$EqEST[4]="Bachillerato";
$EqEST[5]="COU";
$EqEST[6]="FP I";
$EqEST[7]="Grado Medio";
$EqEST[8]="FP 2";
$EqEST[9]="Grado Superior";
$EqEST[10]="Diplomado";
$EqEST[11]="Licenciado";
$EqEST[12]="Doctorado";
$sex[1]="Hombre";
$sex[2]="Mujer";

//$inf2[1]['estudi']=$EqEST[$inf2[1]['estudi']];
//$inf2[1]['sexo']=$sex[$inf2[1]['sexo']];

$inf2[1]['cv1C']="";
$inf2[1]['cv2C']="";
$inf2[1]['MA']="";

if($inf2[1]['gestion']==1){$inf2[1]['cv1C']="checked";}
if($inf2[1]['gestion']==2){$inf2[1]['cv2C']="checked";}
if($inf2[1]['ROI']==1){$inf2[1]['MA']="checked";}

$Datos=$inf2[1];
$rDatos=$DatHTML;






?>