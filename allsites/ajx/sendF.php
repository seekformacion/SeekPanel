<?php


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');

includeCORE('mail/mail');

$from="contenidos@seekformacion.com";
$fromN="Alertas WEB";

$to="e.b.moya@gmail.com";
$toN="Eduardo Buenadicha";

$subject="Contacto WEB";
$message="$nom <br>\n";
$message.="$mail <br>\n";
$message.="$tel <br>\n";
$message.="$cent <br>\n";
$message.="$web <br>\n";
$message.="$coment <br>\n";

if(sendM($from,$fromN,$to,$toN,$subject,$message)){
$do['do']=1;
echo json_encode($do);		
};

?>