<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



?>

function getId(){
	
var url='<?php echo $http_met;?>://seekformacion.com/ajx/fblog.php?aT=<?php echo $aT;?>';
$.getJSON(url, function(data) {
$.each(data, function(key, val) {

if(key=='id'){alert(val);};			

if(key=='log'){logFB(val);};
	
});
});		
	
	
}


function logFB(url){
	
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=420, height=335, top=85, left=140";
window.open(url,"",opciones);	
	
}
	
	
getId();	

