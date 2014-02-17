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
	

cont='<div style=\'cursor:pointer; width:150px; height:30px; background-color: blue;\' onclick=\'window.open("' 
+ url + '","","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=42, height=335, top=185, left=180");\' ></div>';	



document.getElementById('contenido').innerHTML=cont;	
}
	
	
getId();	

