<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

$portales[1]="cursodecursos.com";
$portales[2]="masterenmasters.com";
$portales[3]="fp-formacionprofesional.com";
$portales[4]="oposicionesa.com";




if (isset($_COOKIE["seekforFB_PID"])){
$ref=$_COOKIE["seekforFB_PID"];	
}

?>

<div style="font-family: Arial; font-size: 13px; width:620px;left: 34px;    position: absolute;  top: 61px;">
Obtienes puntos por tus “Me gusta” y por los que realizan tus amigos y los amigos de tus amigos, siempre y cuando hayan sido invitados por ti. Para que técnicamente podamos contabilizar esto, es importante que invites a tus amigos enviándoles el siguiente enlace:	
</div>


<div style="  color: #0000FF;
    font-family: Arial;
    font-size: 13px;
    left: 34px;
    position: absolute;
    top: 141px;
    width: 691px;">http://seekformacion.com/ajx/fb/cApple.php?ref=<?php echo $ref;?>&idp=<?php echo $idp;?></div>    


<div style="font-family: Arial; font-size: 13px; width:620px; left: 34px;    position: absolute;  top: 191px;">

Puedes enviárselo por el medio que consideres oportuno así como publicarlo en las páginas web que quieras. El único requisito es que no lo modifiques, de lo contrario no podremos contabilizar los puntos. 
	
</div>


<div style=" 
    height: 20px;
    left: 185px;
    position: absolute;
    text-align: center;
    top: 127px;
    width: 251px; visibility: hidden;" id="mtim"><img src="http://seekformacion.com/img/global/fb/mtimer.gif"></div>


<div style=" 
     color: #336600;
    font-size: 11px;
    height: 20px;
    left: 99px;
    position: absolute;
    top: 159px;
    width: 251px;  visibility: hidden;" id="mtim2">!Enlace publicado en tu muro correctamente! </div>


<!--
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
    
-->    
    


