<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



?>


function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
if(exdays==0){
var c_value=escape(value);
}else{
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());	
}

document.cookie=c_name + "=" + c_value + '; path=/';
}




function getCookie(w){
	cName = "";
	pCOOKIES = new Array();
	pCOOKIES = document.cookie.split('; ');
	for(bb = 0; bb < pCOOKIES.length; bb++){
		NmeVal  = new Array();
		NmeVal  = pCOOKIES[bb].split('=');
		if(NmeVal[0] == w){
			cName = unescape(NmeVal[1]);
		}
	}
	return cName;
}


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


function getperm(){
var a=getCookie('seekforFB_PEM');	
return a;
}




function timer(){
document.getElementById('timer').style.visibility = "visible" ;
setCookie('seekforFB_PEM',0,20);




chk1();
//
}


function chk1(){
var func='chk2();'
var st=getperm();
if(st==0){
console.log('aun no');
setTimeout(func, 2000);	
}else{
document.getElementById('timer').style.visibility = "hidden" ;	
}	

}

function chk2(){
var func='chk1();'
var st=getperm();
if(st==0){
console.log('aun no2');
setTimeout(func, 2000);	
}else{
document.getElementById('timer').style.visibility = "hidden" ;	
}
	
}

	
	
getId();	

