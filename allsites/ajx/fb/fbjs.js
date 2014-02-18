<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



?>

function getId(){
	
var url='<?php echo $http_met;?>://seekformacion.com/ajx/fb/fblog.php?aT=<?php echo $aT;?>';
$.getJSON(url, function(data) {
$.each(data, function(key, val) {

if(key=='id'){alert(val);};			

if(key=='log'){logFB(val);};
	
});
});		
	
	
}


function logFB(url){
var url2='<?php echo $http_met;?>://seekformacion.com/ajx/fb/ajxNotLog.php?url=' + encodeURIComponent(url);
$.get(url2, function(data){
  document.getElementById('contenido').innerHTML=data;
});

	
}


function timer(){
document.getElementById('timer').style.visibility = "visible" ;
	

}
	
	
getId();	

