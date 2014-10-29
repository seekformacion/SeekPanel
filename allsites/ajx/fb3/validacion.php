<?php
function decryptItS($string) {global $cryptKey;
$string = hex2ascii($string);
$output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $string, MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
return $output;
}

$submit=""; $sos=1;

foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

foreach($_POST as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('../iniAJX.php');        $v['conf']['db']="SeekforFB"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################


$v['where']['view']='cms';
$v['where']['id']=6;

$v['where']['pagTittle']="Validación del perfil";


$code2= decryptItS($cod);
global $cod;

$code2=$code2*1;
if(!is_numeric($code2)){$code2="-1";}
if($code2==0){$code2="-1";}

$id="";$vali="";
$inf=DBselect("select id, v_sospechoso, v_vali FROM Fb_fans WHERE FID='$code2';");     
if(count($inf)>0){  $id=$inf[1]['id']; $sospe=$inf[1]['v_sospechoso']; $vali=$inf[1]['v_vali'];  } 
global $sospe;

//echo "-- $id --"; echo "select id, v_sospechoso, v_vali FROM Fb_fans WHERE FID='$code2';";

if(!$submit){

if($id){
    
    if($vali){
    echo loadChild('objt','paginaV_ok');    
    }else{    
    echo loadChild('objt','paginaV');
    }


}else{
echo loadChild('objt','paginaV_err');    
}

}else{

if($pais=="ES"){
         if(substr($cp,0,2) == substr($prov,0,2)){
        $vp=1;    
        }else{
        $vp=0;    
       } 
}else{
$vp=0;    
}    


$ins=DBUpIns("update Fb_fans set v_vali='1', v_vp='$vp', v_sospechoso='$sos', v_nombre='$nombre', v_tel='$tel', v_pais='$pais', v_provincia='$prov', c_postal='$cp'  WHERE FID = '$code2';");   
   
echo loadChild('objt','paginaV_ok');    
}




?>
