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
var url='<?php echo $http_met;?>://seekformacion.com/ajx/ajxNotLog.php?url=' + url;
$.getJSON(url, function(data) {
$.each(data, function(key, val) {
if(key=='contenido'){document.getElementById('contenido').innerHTML=val;};			
});
});	
	
}
	
	
getId();	

