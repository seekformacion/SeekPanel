<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

?>



<div style='cursor:pointer; width:150px; height:30px; background-color: blue;' 
onclick='window.open("<?php echo $url;?>","","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=420, height=335, top=185, left=180")'>


</div>	

