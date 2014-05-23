<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');$idp=1;
$bol="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};


$portales[1]="cursodecursos";
$portales[2]="masterenmasters";
$portales[3]="fpformacionprofesional";
$portales[4]="oposicionesa";



if($bol){
require '/www/httpd/seekformacion.com/fbdata.php';
$ii=DBUpIns("UPDATE envios SET follow=1 WHERE id_boletin=$bol;");
echo "UPDATE envios SET follow=1 WHERE id_boletin=$bol";
$ref="BOL_" . $bol;		
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />

<title>Concurso Apple. Iphone 5, IPad, IPad mini </title>


<meta name="description" content="Dale a `Me gusta` a esta página y ayúdame a ganar este concurso." />

<meta name="keywords" content="Dale a `Me gusta` a esta página y ayúdame a ganar este concurso." />

<meta property="og:locale" content="es_ES"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Concurso Apple. IPhone 5, IPad, IPad mini"/>
<meta property="og:description" content="Concurso Apple. Gana un IPhone 5 un IPad o un IPad mini"/>
<meta property="og:image" content="http://seekformacion.com/img/global/fb/banerconcurso.jpg"/>


<meta itemprop="name" content="Concurso Apple. Iphone 5, IPad, IPad mini" />
<meta itemprop="description" content="Concurso Apple. Gana un IPhone 5 un IPad o un IPad mini" />
<meta itemprop="image" content="http://seekformacion.com/img/global/fb/banerconcurso.jpg" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36119979-5', 'seekformacion.com');
  ga('send', 'pageview');


</script>

<script type="text/javascript">

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



if(!getCookie('seekforFB_REFDE')){
setCookie('seekforFB_REFDE','<?php echo $ref;?>','2');
}



if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
top.location.href = "https://www.seekformacion.com/ajx/fb3/seekapp.php";
}else{
top.location.href = "https://www.facebook.com/<?php echo $portales[$idp]; ?>/app_715730281795141";
}

</script>


<html>
<body>
	
</body>
</html>