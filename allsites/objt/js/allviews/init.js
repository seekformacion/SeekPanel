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


function logout(){
window.location="/login";	
}

function autent(){
var skpUID=getCookie('skpUID');
if(skpUID){	
var url='/ajx/logUID.php?skpUID=' + skpUID;	
$.getJSON(url, function(data) {$.each(data, function(key, val) {
if(key=="on"){window.top.skpUID=val;}else{logout();}
});
});		
}else{logout();}


	
}

