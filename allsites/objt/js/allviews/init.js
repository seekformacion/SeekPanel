window.top.he=new Array; window.top.opM=new Array;
window.top.he[1]=86;
window.top.he[2]=106;
window.top.he[3]=86;
window.top.he[4]=86;
window.top.he[5]=86;

function lK(url){window.location.href =	url;}

function dologin(){
var user=document.getElementById('user').value;
var pass=document.getElementById('pass').value;	

var url='/ajx/logUID.php?user=' + user + '&pass=' + pass;	
$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=="on"){load(val)}else{logout();}
});
});	


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
	//logout();
	}
});
});		
}else{
	//logout();
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






