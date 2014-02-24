<?php

foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

$portales[1]="cursodecursos.com";
$portales[2]="masterenmasters.com";
$portales[3]="fp-formacionprofesional.com";
$portales[4]="oposicionesa.com";




if (isset($_COOKIE["seekforFB_PID"])){
$ref=$_COOKIE["seekforFB_PID"];	
}

?>
<img src="https://seekformacion.com/img/global/fb/friends.gif" style="float: left;    left: 84px;    position: absolute;    top: 0px; " border="0">

<div style="  cursor: pointer;
    height: 40px;
    left: 92px;
    position: absolute;
    top: 115px;
    width: 251px;" onclick="postWall();"></div>

<div style="   cursor: pointer;
    height: 40px;
    left: 428px;
    position: absolute;
    top: 114px;
    width: 250px;" onclick="FacebookInviteFriends();"></div>
    
    
    
<div style=" color: #0000FF;
    font-family: Arial;
    font-size: 13px;
    left: 120px;
    position: absolute;
    top: 267px;
    width: 551px;">http://<?php echo $portales[$idp];?>/ajx/cApple.php?ref=<?php echo $ref;?>&idp=<?php echo $idp;?></div>    




