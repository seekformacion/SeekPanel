<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};


$res2=DBUpIns("UPDATE Fb_fans SET FID='$fid' WHERE PID='$pid';");



//http://seekformacion.com/ajx/fb/cApple.php?ref=5F5F46423609445E310C59A2FEA4CDDB&idp=1
?>

