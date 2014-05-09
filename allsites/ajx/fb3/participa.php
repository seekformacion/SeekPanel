<?php

$user_profile = $facebook->api("/$user");
//$friends = $facebook->api("/$user/friends");
$name=$user_profile['name'];

function getUniqueCode($length){
$code = md5(uniqid(rand(), true));
return $code;
}

$REF="";
if(isset($_COOKIE['seekforFB_REFDE'])){
$REF=$_COOKIE['seekforFB_REFDE'];
}



$cu=0;$ma=0;$fp=0;$op=0; $qedan=0;
$response = $facebook->api("/$user/likes/1424213751150594");
if(isset($response['data'][0]['id'])){$likes[1]=1;$cu=1;}else{$likes[1]=0;$qedan++;}
$response = $facebook->api("/$user/likes/432712510165494");
if(isset($response['data'][0]['id'])){$likes[2]=1;$ma=1;}else{$likes[2]=0;$qedan++;}
$response = $facebook->api("/$user/likes/216539681879446");
if(isset($response['data'][0]['id'])){$likes[3]=1;$fp=1;}else{$likes[3]=0;$qedan++;}
$response = $facebook->api("/$user/likes/591979084222922");
if(isset($response['data'][0]['id'])){$likes[4]=1;$op=1;}else{$likes[4]=0;$qedan++;}

if(!$qedan){$onl="";}else{$onl="chg1();";};
 
 
$inf=DBselect("select 
sum(cu) as scu, 
sum(ma) as sma, 
sum(fp) as sfp, 
sum(op) as sop 
FROM Fb_fans WHERE REF = (SELECT PID FROM Fb_fans WHERE FID='$user');");	 
if(count($inf)>0){	$DA_CU=$inf[1]['scu']; $DA_MA=$inf[1]['sma']; $DA_FP=$inf[1]['sfp']; $DA_OP=$inf[1]['sop']; } 
 

$inf=DBselect("select 
sum(cu) as scu, 
sum(ma) as sma, 
sum(fp) as sfp, 
sum(op) as sop 
FROM Fb_fans WHERE REF IN (SELECT PID FROM Fb_fans WHERE REF = (SELECT PID FROM Fb_fans WHERE FID='$user'));");	
if(count($inf)>0){	$DAA_CU=$inf[1]['scu']; $DAA_MA=$inf[1]['sma']; $DAA_FP=$inf[1]['sfp']; $DAA_OP=$inf[1]['sop']; } 
 
$SUMP=($cu + $ma + $fp + $op)*100;

 
$contL=0;  
if(!$cu){$DA_CU="-"; $DAS_CU=0; $DAAS_CU=0; $DAA_CU="-";$contL++;}else{$DAS_CU=$DA_CU;$DAAS_CU=$DAA_CU;};
if(!$ma){$DA_MA="-"; $DAS_MA=0; $DAAS_MA=0; $DAA_MA="-";$contL++;}else{$DAS_MA=$DA_MA;$DAAS_MA=$DAA_MA;};
if(!$fp){$DA_FP="-"; $DAS_FP=0; $DAAS_FP=0; $DAA_FP="-";$contL++;}else{$DAS_FP=$DA_FP;$DAAS_FP=$DAA_FP;};
if(!$op){$DA_OP="-"; $DAS_OP=0; $DAAS_OP=0; $DAA_OP="-";$contL++;}else{$DAS_OP=$DA_OP;$DAAS_OP=$DAA_OP;};

$SUMA=($DAS_CU + $DAS_MA + $DAS_FP + $DAS_OP)*30; 
$SUMAA=($DAAS_CU + $DAAS_MA + $DAAS_FP + $DAAS_OP)*5; 
$INVI=$SUMA+$SUMAA;
$PTOT=$SUMP+$SUMA+$SUMAA;



$id="";
$inf=DBselect("select id, PID from Fb_fans WHERE FID=$user;");
if(count($inf)>0){$id=$inf[1]['id']; $PID=$inf[1]['PID'];};

if(!$id){
$PID=strtoupper(getUniqueCode(9));
$ins=DBUpIns("INSERT INTO Fb_fans (PID,FID,REF,cu,ma,fp,op,puntos) VALUES ('$PID',$user,'$REF',$cu,$ma,$fp,$op,'$PTOT');");	
}else{
$ins=DBUpIns("UPDATE Fb_fans SET cu=$cu, ma=$ma, fp=$fp, op=$op, puntos='$PTOT' WHERE id=$id;");		
}




$pos=1;
$rk=DBselect("select distinct puntos as rk from Fb_fans ORDER BY rk DESC;");
if(count($rk)>0){foreach($rk as $k => $val){$rank[$val['rk']]=$pos; $pos++;}}
$ranking=$rank[$PTOT] . "º";

if($PTOT==0){$ranking="-";}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #FFFFFF !important;}	
.page {width: 700px; background-color: #ffffff;
    
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }

.textos {position: relative; float:left; width: 676px;margin-left:20px; font-size: 17px; font-family: Arial; color:#555555 }
.legal {position: relative; float:left; width: 696px; font-size: 9px; font-family: Arial; color:#555555; margin-top:5px; }

.franjaAz {position: relative; float:left; width: 676px; background-color:#617087;  height: 40px;  margin-top: 25px; padding:10px; margin-bottom: 25px;}
.ultis { position:relative; float:left;  font-size: 13px; font-family: Arial; color:#ffffff; width: 666px; margin-bottom:10px;}    	

.imgUlti {position:relative; float:left; width:46px; height:46px; margin-right: 6px; }

.bases {position:relative; float:left; top:50px;  border: 1px solid #888888; }	

.leyen {position:relative; float:left; font-size: 9px; top:23px; font-family: Arial; color:#444444; height:30px; width:80px; text-align: center;}

.ptos {position:relative; float:left; font-size: 14px; font-family: Arial; color:#333333;
	background-color:#FFFFFF;
	 height:25px; width:50px; text-align: center; padding-top:10px;}

.bMegu {   border: 1px solid #444444;
    float: left;
    height: 86px;
    margin-top: 20px;
    padding: 10px;
    position: relative;
    width: 236px;
    margin-right: 20px;}
    
.cien {position: absolute; left: 15px; top:6px; z-index:999; background-color:#FFFFFF  }
.opciones {position:relative; }
</style>


<script type="text/javascript" src="<?php echo $http_met;?>://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>







<script>

window.stop=0;

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



function chklikes(){$.ajaxSetup({ cache: false });

var url='<?php echo $http_met;?>://www.seekformacion.com/ajx/fb3/chklikes.php?user=<?php echo $user;?>';
$.getJSON(url, function(data) {
$.each(data, function(key, val) {

if(key=='1'){
	if((val==0)&&(document.getElementById('1').style.visibility=='visible')){document.getElementById('1').style.visibility='hidden';}
	if((val==1)&&(document.getElementById('1').style.visibility=='hidden')){document.getElementById('1').style.visibility='visible'; ga('send', 'event', 'pagina', 'like', 'click', 1);}
		}


if(key=='2'){
	if((val==0)&&(document.getElementById('2').style.visibility=='visible')){document.getElementById('2').style.visibility='hidden';}
	if((val==1)&&(document.getElementById('2').style.visibility=='hidden')){document.getElementById('2').style.visibility='visible';ga('send', 'event', 'pagina', 'like', 'click', 2);}
		}


if(key=='3'){
	if((val==0)&&(document.getElementById('3').style.visibility=='visible')){document.getElementById('3').style.visibility='hidden';}
	if((val==1)&&(document.getElementById('3').style.visibility=='hidden')){document.getElementById('3').style.visibility='visible';ga('send', 'event', 'pagina', 'like', 'click', 3);}
		}



if(key=='4'){
	if((val==0)&&(document.getElementById('4').style.visibility=='visible')){document.getElementById('4').style.visibility='hidden';}
	if((val==1)&&(document.getElementById('4').style.visibility=='hidden')){document.getElementById('4').style.visibility='visible';ga('send', 'event', 'pagina', 'like', 'click', 4);}
		}

if(key=='pp'){document.getElementById('pp').innerHTML=val;}
if(key=='pi'){document.getElementById('pi').innerHTML=val;}
if(key=='pt'){document.getElementById('pt').innerHTML=val;}
if(key=='ra'){document.getElementById('ra').innerHTML=val;}

if(key=='stop'){window.stop=1;}

});
});	
	
	
}



function chg1(){
var func='chg2();';
chklikes();
if(!window.stop){setTimeout(func, 3000);};
}

function chg2(){
var func='chg1();';
chklikes();
if(!window.stop){setTimeout(func, 3000);};
}


function FacebookInviteFriends(){$.ajaxSetup({ cache: false });
var filts="";
var url='<?php echo $http_met;?>://www.seekformacion.com/ajx/fb3/usersNO.php?user=<?php echo $user;?>';
$.getJSON(url, function(data) {
$.each(data, function(key, val) {
	if(key=="filter"){dialogInv(val)};
	if(key=="nomore"){};
});
});
}

function dialogInv(filts){$.ajaxSetup({ cache: false });
ref='<?php echo $PID;?>';		
var filt="[{name: 'Aun no juegan', user_ids: [" + filts + "]}]";
if(filts){
FB.ui({  method: 'apprequests',  data: ref,  message: 'Listado de amigos que no estan participando aun en el concurso.',  filters: filt });
}	
}

function comparte(){
var url='<?php echo urlencode("https://www.seekformacion.com/ajx/fb/cApple.php?ref=$PID&utm_source=share&utm_medium=facebook&utm_campaign=promoContest");?>';
var redirect='<?php echo urlencode("$http_met://www.seekformacion.com/ajx/fb3/shareclose.php?user=$user");?>';

var pageURL='https://www.facebook.com/dialog/feed?app_id=715730281795141&display=popup&link=' + url +  '&redirect_uri=' + redirect;
var title="Publicar en Facebook";
var w=400;
var h=300;
console.log(pageURL);
PopupCenter(pageURL, title,w,h);	
}


function compGog(){
var url='<?php echo urlencode("https://www.seekformacion.com/ajx/fb/cApple.php?ref=$PID&utm_source=share&utm_medium=gplus&utm_campaign=promoContest");?>';

var pageURL="https://plus.google.com/share?url=" + url;
var title="Publicar en Google+";
var w=400;
var h=300;
console.log(pageURL);
PopupCenter(pageURL, title,w,h);	
}


function compTwe(){
var url='<?php echo urlencode("https://www.seekformacion.com/ajx/fb/cApple.php?ref=$PID&utm_source=share&utm_medium=twi&utm_campaign=promoContest");?>';

var pageURL="http://twitter.com/share?text=Ayudadme a ganar un IPhone 5, Un IPad o un IPad mini..&url=" + url;
var title="Publicar en Google+";
var w=400;
var h=300;
console.log(pageURL);
PopupCenter(pageURL, title,w,h);	
}




function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var tops = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
} 


	
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  var campamia=getCookie('seekforFB_REFDE');
  ga('create', 'UA-36119979-5', 'seekformacion.com');
  ga('send', 'pageview');
  ga('send', 'event', 'pagina', 'load', 'Participa', 2);
 
</script>

<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>Concurso Apple</title>
</head>

<body class="gris1_BG" onload="<?php echo $onl;?>">


	
	
<div id="fb-root"></div>

<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({
appId      : '715730281795141',
status     : true,
xfbml      : true
});
};

(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/es_LA/all/debug.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
   
</script>	
	
	
	
<div class="page">
<img style="position: relative; float: left;" src="/img/global/contest/cabeContest.gif">

<div class="leyen" style="margin-left:200px;">Obtenidos por tus "Me gusta"</div>
<div class="leyen" style="margin-left:14px;">Obtenidos por tus invitaciones</div>
<div class="leyen" style="margin-left:8px;">Puntos Totales</div>
<div class="leyen" style="margin-left:10px;">Tu posición en el ranking</div>

<div class="franjaAz">

<div style="position:relative; float:left; margin-left: 3px;"><img src="https://graph.facebook.com/<?php echo $user; ?>/picture" style="width:30px; height:30px;"/></div>
<div style="position:relative; float:left; margin-left: 5px; width:130px; height: 30px; font-family: Arial; color: #FFFFFF; font-size: 13px;"><?php echo $name;?></div>

<div class="ptos" style="margin-left:40px;" id="pp"><?php echo $SUMP;?></div>
<div class="ptos" style="margin-left:40px;" id="pi"><?php echo $INVI;?></div>
<div class="ptos" style="margin-left:40px;" id="pt"><?php echo $PTOT;?></div>
<div class="ptos" style="margin-left:40px;" id="ra"><?php echo $ranking;?></div>

<img style="position: absolute; left: 560px; top:-55px  " src="/img/global/contest/premiosP.png">
</div>

<div class="textos" style="margin-top: 20px; text-align: center">
Consigue <strong>100 puntos</strong> por cada <strong>“Me gusta”</strong> en las páginas del grupo
</div>



<div style="position:relative; float: left; margin-left: 80px;">



<div class="bMegu">
<div style="position: absolute; z-index: 777">
<div class="fb-like-box" data-href="https://www.facebook.com/cursodecursos" data-width="280" data-height="80" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
<img style="visibility: <?php if($likes[1]){echo "visible";}else{echo "hidden";};?>;" class="cien" src="/img/global/contest/100p1.gif" id="1">	
</div>


<div class="bMegu">
<div style="position: absolute; z-index: 777">
<div class="fb-like-box" data-href="https://www.facebook.com/masterenmasters" data-width="280" data-height="80" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
<img style="visibility: <?php if($likes[2]){echo "visible";}else{echo "hidden";};?>;" class="cien" src="/img/global/contest/100p2.gif" id="2">	
</div>

<div class="bMegu">
<div style="position: absolute; z-index: 777">
<div class="fb-like-box" data-href="https://www.facebook.com/fpformacionprofesional" data-width="280" data-height="80" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
<img style="visibility: <?php if($likes[3]){echo "visible";}else{echo "hidden";};?>;" class="cien" src="/img/global/contest/100p3.gif" id="3">	
</div>


<div class="bMegu">
<div style="position: absolute; z-index: 777">
<div class="fb-like-box" data-href="https://www.facebook.com/oposicionesa" data-width="280" data-height="80" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
<img style="visibility: <?php if($likes[4]){echo "visible";}else{echo "hidden";};?>;" class="cien" src="/img/global/contest/100p4.gif" id="4">	
</div>

</div>


<div class="textos" style="margin-top: 20px; text-align: center">
Consigue <strong>más puntos</strong> invitando a participar a tus amigos. Consigues <strong>30 puntos</strong> por los “Me gusta” de cada persona que participe invitada por ti y a su vez recibiras <strong>5 puntos</strong> por los de los participantes invitados por ellos.
</div>

<div class="franjaAz" style="height: 45px;">
<div style="position:relative; float:left; text-align:center;  width:650px; height: 15px; font-family: Arial; color: #FFFFFF; font-size: 13px;">Puedes usar este enlace para invitar a tus amigos a participar y así conseguir más puntos</div>	
<input type="text" style="width: 668px; position: relative; float: left; margin-left: 0px; margin-top: 3px;font-family: Arial; text-align: center " value="<?php echo "https://www.seekformacion.com/ajx/fb/cApple.php?ref=$PID";?>">	
</div>

<div class="opciones">

<div style="margin-left:-1px; position: relative; float: left; width:200px; height: 70px; cursor:pointer" onclick="FacebookInviteFriends();">
<img style="position: absolute; top:0px; left:0px;" src="/img/global/contest/imInv.gif">
<div style="position: absolute; top:0px; left:73px; width:111px; font-size: 12px; font-family: Arial; color:#444444;">Invita a tus amigos a participar</div>
<img style="position: absolute; top:35px; left:73px;" src="/img/global/contest/botInv.png">	
</div>

<div style="margin-left:53px; position: relative; float: left; width:200px; height: 70px; cursor:pointer" onclick="comparte();">
<img style="position: absolute; top:0px; left:0px;" src="/img/global/contest/imPub.gif">
<div style="position: absolute; top:0px; left:73px; width:111px; font-size: 12px; font-family: Arial; color:#444444;">Comparte la promoción</div>
<img style="position: absolute; top:35px; left:73px;" src="/img/global/contest/botPub.png">	
</div>
	

<div style="margin-left:47px; position: relative; float: left; width:200px; height: 70px;">
<img style="position: absolute; top:0px; left:0px;" src="/img/global/contest/imRed.gif">
<div style="position: absolute; top:0px; left:73px; width:111px; font-size: 12px; font-family: Arial; color:#444444;">Compártelo en otras redes</div>
<img style="position: absolute; top:35px; left:73px; cursor: pointer" src="/img/global/contest/botGog.png" onclick="compGog();">
<img style="position: absolute; top:35px; left:112px; cursor: pointer" src="/img/global/contest/botTwe.png"  onclick="compTwe();">	
</div>


</div>


</div>
</body>
</html>
	