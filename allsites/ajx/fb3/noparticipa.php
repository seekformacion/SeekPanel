<?php

$ultis="";
$inf=DBselect("select FID from Fb_fans WHERE FID NOT LIKE '' ORDER BY id DESC limit 4;");
if(count($inf)>0){ foreach ($inf as $key => $value) {$FID=$value['FID'];
$ultis .="<a href='http://www.facebook.com/$FID' target='_top' ><img class='imgUlti' src='https://graph.facebook.com/$FID/picture'></a>";	
}}



$redirect="$http_met://www.seekformacion.com/ajx/fb3/seekapp.php?do=perm";
//$redirect=urlencode($redirect);
$perm_url = $facebook->getLoginUrl( array( 'redirect_uri' => $redirect, 'scope' => 'basic_info,user_likes', 'display' => 'popup') );



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #FFFFFF !important;}	
.page {width: 700px; background-color: #ffffff;
    height: 1000px;
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }

.textos {position: relative; float:left; width: 696px; font-size: 16px; font-family: Arial; color:#555555 }
.legal {position: relative; float:left; width: 696px; font-size: 9px; font-family: Arial; color:#555555; margin-top:5px; }

.franjaAz {position: relative; float:left; width: 666px; background-color:#617087;  height: 130px;  margin-top: 60px; padding:15px; margin-bottom: 40px;}
.ultis { position:relative; float:left;  font-size: 13px; font-family: Arial; color:#ffffff; width: 666px; margin-bottom:10px;}    	

.imgUlti {position:relative; float:left; width:46px; height:46px; margin-right: 6px; }

.bases {position:relative; float:left; top:50px;  border: 1px solid #888888; }	

</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36119979-5', 'seekformacion.com');
  ga('send', 'pageview');

</script>



<script>



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





function PopupCenter(pageURL, title,w,h) {
  var left = (screen.width/2)-(w/2);
  var tops = (screen.height/2)-(h/2);


  var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
timer();

} 

function timer(){
//document.getElementById('timer').style.visibility = "visible" ;
setCookie('perm',0,20);
chk1();	
}	

function getperm(){
var a=getCookie('perm');	
return a;
}


function chk1(){
var func='chk2();'
var st=getperm();

if(st==0){setTimeout(func, 500);}
if(st==1){}
if(st==2){panel();}	


}

function chk2(){
var func='chk1();'
var st=getperm();

if(st==0){setTimeout(func, 500);}
if(st==1){}
if(st==2){panel();}	

	
}

function panel(){
document.getElementById('page').innerHTML='<img style="position:absolute; top:150px; left:350px;" src="/img/global/contest/timer.gif">'	
setTimeout('relodd();', 1200);
}

function relodd(){
window.location="<?php echo $loginUrl;?>";	
}
	
</script>



<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>Concurso Apple</title>
</head>

<body class="gris1_BG">
	
<div class="page" id="page">
<img style="position:absolute; top:150px; left:350px; display: none;" src="/img/global/contest/timer.gif">
<img style="position: relative; float: left;" src="/img/global/contest/cabeContest.gif">

<div class="textos" style="margin-top: 50px;">
Participa en este concurso y si eres una de las dos personas que más “Me gusta” consigue, ganarás directamente y sin sorteos uno de estros dos productos de Apple: 	
</div>

<img style="position: relative; float: left;   left: 211px;  margin-top: 15px;" src="/img/global/contest/premi1.gif">

<div class="textos" style="margin-top: 15px;">
Todos los participantes en el concurso, participareis también en un sorteo con un número de papeletas proporcional al número de “Me gusta” obtenidos durante el concurso. Se sorteará:	
</div>


<img style="position: relative; float: left; left: 270px;  margin-top: 15px;" src="/img/global/contest/premi2.gif">

	
<div class="franjaAz">

<div class="ultis">Últimos participantes:</div>

<?php echo $ultis;?>

<div style="clear:both"></div>

<img style="position: relative; float: left; margin-top: 15px; cursor:pointer;" src="/img/global/contest/botParti.png" onclick='PopupCenter("<?php echo $perm_url;?>","",490,400);'>


<img style="position: absolute; left: 425px; top:-90px  " src="/img/global/contest/premiosG.png">
</div>
	
<div class="legal">
* Al participar, estás aceptando las <span style="text-decoration: underline; cursor:pointer;" onclick="javascript:document.getElementById('bases').style.display='block';">normas de uso y bases legales</span> del concurso. Promoción válida para residentes en territorio español.	
</div>	
	
<div class="legal">
** Facebook no patrocina, avala ni administra de modo alguno esta promoción, ni está asociado a ella. Esta promoción esta avalada por Seek Formación S.L.	
</div>		
	


<div style="display:none" id="bases" class="bases">
<iframe width="696" scrolling="auto" height="250" frameborder="0" style="display: block; " class="poli" src="/ajx/fb3/bases.php" id="poli" border="0" marginheight="20" marginwidth="20">

</iframe>
</div>

</div>
</body>
</html>