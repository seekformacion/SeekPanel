window.top.he=new Array; window.top.opM=new Array;
window.top.he[1]=86;
window.top.he[2]=106;
window.top.he[3]=86;
window.top.he[4]=86;
window.top.he[5]=86;

function lK(url){window.location.href =	url;}

function dologin(){$.ajaxSetup({ cache: false });
var user=document.getElementById('user').value;
var pass=document.getElementById('pass').value;	

var url='/ajx/logUID.php?user=' + user + '&pass=' + pass;	
$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=="activar"){document.getElementById('contenido').innerHTML=val;}
if(key=="on"){load(val)}
if(key=="off"){document.getElementById('logE').style.visibility="visible";}
});
});	


}

function politica(){
document.getElementById('poli').style.display="block";	
}

function activa(){$.ajaxSetup({ cache: false });
	var p1=document.getElementById('p1').value;
	var p2=document.getElementById('p2').value;	
	var user=document.getElementById('user').value;
	var id=document.getElementById('id').value;
	
	if (!p1){alert ('Debe introducir una contraseña para activar la cuenta');}
	if (!p2){alert ('Debe repetir la contraseña por su seguridad');}
	if (p1!=p2){alert ('Las contraseñas no coinciden');}
	if((p1)&&(p2)&&(p1==p2)){
		
	var url='/ajx/activaAccount.php?user=' + user + '&pass=' + p1 + '&id=' + id;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {
	
	if(key=='ok'){
	dologin2(user,p1);	
	}
	
	});
	});		
		
		
		
	}	}


function dologin2(user,pass){$.ajaxSetup({ cache: false });
var url='/ajx/logUID.php?user=' + user + '&pass=' + pass;	
$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=="activar"){document.getElementById('contenido').innerHTML=val;}
if(key=="on"){load(val)}
if(key=="off"){document.getElementById('logE').style.visibility="visible";}
});
});	


}



function swapInnerHTML(objID,newHTML) {
 
$("#" + objID).empty();
$("#" + objID).append(newHTML);  

}



function loadC(){$.ajaxSetup({ cache: false });
var skpUID=getCookie('skpUID');
if(skpUID){	
	var url='/ajx/loadC.php?skpUID=' + skpUID;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {if(key=="opc"){
		//document.getElementById('selCentros').innerHTML=val;
		swapInnerHTML('selCentros',val);
		var idc=getCookie('selC');
		if(idc){document.getElementById('selCentros').value=idc;}
		}});});
}else{
	logout();}	

}





function load(skpUID){
setCookie('skpUID',skpUID,0);	
window.location="/panel";	
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


function chgCent(idc){
setCookie('selC',idc,1);
var mlat="0|0";
setCookie('mlat',mlat,0);	
lK('/panel');	
}



function logout(){
//console.log('logout');
window.location="/login";	
}

function autent(){$.ajaxSetup({ cache: false });
var skpUID=getCookie('skpUID');
if(skpUID){	
var url='/ajx/logUID.php?skpUID=' + skpUID;	


$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=="on"){window.top.skpUID=val;mlat();}
else if(key=="slc"){
if(!getCookie('selC')){setCookie('selC',val,2);}
	
}else{
	logout();
	}
});
});		
}else{
	logout();
	}


	
}

function oMenu(id){
var opens=window.top.opM;
id=id.slice(1,3);
var opp="";
for(a=0 ; a<opens.length ; a++){if(opens[a]){ 
opp=opp+a+',';
}}
if(!opp){opp="0";}else{opp=opp.slice(0, -1);}; 
var mlat=id + "|" + opp;
setCookie('mlat',mlat,0);
lK(window.top.urls[id]);	
}


function mlat(){
var mlat=getCookie('mlat');

if(!mlat){
//var mlat="5|1,2";	
}else{
var op=mlat.split('|'); var current=op[0]; var open=op[1].split(','); window.top.current=current;

if(current>0){document.getElementById('o'+ current).style.backgroundColor='#cccccc';}	

for(a=0; a < open.length ; a++){var id=open[a];
if(id>0){var h=window.top.he[id]; window.top.opM[id]=1;
$("#sm" + id).height(h);
}}


}
}






