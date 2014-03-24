<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>activador</title>



</head>





<body>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>

function adcent(){
var cents=document.getElementById('cents').value;	
var url='/ajx/activar_addcents.php?cents=' + cents;	
$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=='cc'){
document.getElementById('lcent').innerHTML=val;	
}

});});	
	
}
	
function activar(){
var gestora=document.getElementById('gestora').value;	
var user=document.getElementById('user').value;
var pass=document.getElementById('pass').value;	

var url='/ajx/activar_add.php?gestora=' + gestora + '&user=' + user + '&pass=' + pass;

for (var a=1; a <= 50 ; a++){
if(document.getElementById(a)){	

url=url + '&cent[' + a + '][1]=' + document.getElementById(a).value  + '&cent[' + a + '][2]=' + document.getElementById('cpl_' + a).value;	
	
	
}}

$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=='ok'){

}

});});	
	
}

	
</script>



<input type="text" id="cents" />
<input type="button" value="Añadir centros" onclick="adcent();">


<div id="lcent" style="margin-top:20px;">

	
</div>


<div style="margin-top:20px;">

<input type='text' value="" id="gestora"/>

</div>


<div style="margin-top:10px;">

<input type='text' value="user" id="user"/>
<input type='text' value="activar" id="pass"/>
<input type="button" value="activar" onclick="activar();">	
</div>





</body></html>