<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};



?>



window.fbAsyncInit = function() {
        FB.init({
          appId      : '457903137645239',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/es_ES/all/debug.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
   
   






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




function refer(ref){
var cref=getCookie('seekforFB_REF');
var pid =getCookie('seekforFB_PID');	


if((!cref)&&(!pid)){


var url='<?php echo $http_met;?>://seekformacion.com/ajx/fb/fbref.php?ref=' + ref;

console.log(url);

$.getJSON(url, function(data) {
$.each(data, function(key, val) {
if(key=='PID'){setCookie('seekforFB_PID',val,400);setCookie('seekforFB_REF',ref,400);	}

});
});



}
}


function getId(){
	
var url='<?php echo $http_met;?>://seekformacion.com/ajx/fb/fblog.php?aT=<?php echo $aT;?>';
$.getJSON(url, function(data) {
	
$.each(data, function(key, val) {
if(key=='id'){setCookie('seekforFB_ID',val,400);panel();};			
if(key=='PID'){setCookie('seekforFB_PID',val,400);};	
if(key=='log'){logFB(val);};
});});		
	
	
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

if(st==0){setTimeout(func, 3000);}
if(st==1){document.getElementById('timer').style.visibility = "hidden" ;}
if(st==2){panel();}	


}

function chk2(){
var func='chk1();'
var st=getperm();

if(st==0){setTimeout(func, 3000);}
if(st==1){document.getElementById('timer').style.visibility = "hidden" ;}
if(st==2){panel();}	

	
}


function panel(){
document.getElementById('contenido').innerHTML='<div style="position: absolute; top: 150px; left:360px;"><img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/preloader.gif" border="0" /></div>	';
var url2='<?php echo $http_met;?>://seekformacion.com/ajx/fb/rank.php';
$.get(url2, function(data){
  document.getElementById('contenido').innerHTML="";	
  document.getElementById('ranking').innerHTML=data;
  panel2();
});

}

function panel2(){
var url2='<?php echo $http_met;?>://seekformacion.com/ajx/fb/friends.php';
$.get(url2, function(data){
   document.getElementById('2').innerHTML=data;
 });

	
}

function chkp(v){
if(v==1){	document.getElementById('2').style.visibility = "hidden";
			document.getElementById('1').style.visibility = "visible";
			document.getElementById('p1').className = "pest uno";
			document.getElementById('p2').className = "pest_off dos"
			
			}
if(v==2){	document.getElementById('1').style.visibility = "hidden";
			document.getElementById('2').style.visibility = "visible";
			document.getElementById('p1').className = "pest_off uno"
			document.getElementById('p2').className = "pest dos"
			}	
}



function FacebookInviteFriends()
{$.ajaxSetup({'async': false});
ref=getCookie('seekforFB_PID');	

var filts="";

var url='<?php echo $http_met;?>://seekformacion.com/ajx/fb/usersNO.php';

console.log("--- aqui si --");
	
$.getJSON(url, function(data) {
$.each(data, function(key, val) {
if(key=="filter"){setCookie('sekf_fNO',val,1);};
console.log(key + " : " + val);	
});
});


filts=getCookie('sekf_fNO');	
console.info(filts);


var filt="[{name: 'Amigos que aun no juegan', user_ids: [" + filts + "]}]";


console.info(filt);


FB.ui({
  method: 'apprequests',
  data: ref, 
  message: 'Ayudame a ganar el concurso Apple', 
  filters: filt	
});


//var json = '{"result":true,"count":1}',
//obj = JSON.parse(fill);

//filters: [{name: 'Amigos que aun no juegan', user_ids: [1018154356, 100007329815113]}]


}












refer('<?php echo $ref;?>');	
	
getId();	

