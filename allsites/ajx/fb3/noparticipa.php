<?php

$ultis="";
$inf=DBselect("select FID from Fb_fans WHERE FID NOT LIKE '' ORDER BY id DESC limit 4;");
if(count($inf)>0){ foreach ($inf as $key => $value) {$FID=$value['FID'];
$ultis .="<a href='http://www.facebook.com/$FID'><img class='imgUlti' src='https://graph.facebook.com/$FID/picture'></a>";	
}}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #EBEBEB !important;}	
.page {width: 700px; background-color: #ffffff;
    height: 1000px;
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }

.textos {position: relative; float:left; width: 696px; font-size: 15px; font-family: Arial; color:#555555 }
.legal {position: relative; float:left; width: 696px; font-size: 9px; font-family: Arial; color:#555555; margin-top:5px; }

.franjaAz {position: relative; float:left; width: 666px; background-color:#617087;  height: 130px;  margin-top: 60px; padding:15px; margin-bottom: 40px;}
.ultis { position:relative; float:left;  font-size: 13px; font-family: Arial; color:#ffffff; width: 666px; margin-bottom:10px;}    	

.imgUlti {position:relative; float:left; width:46px; height:46px; margin-right: 6px; }
</style>



<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php echo $user;?>	</title>
</head>

<body class="gris1_BG">
	
<div class="page">

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

<img style="position: relative; float: left; margin-top: 15px; cursor:pointer;" src="/img/global/contest/botParti.png">

<img style="position: absolute; left: 425px; top:-90px  " src="/img/global/contest/premiosG.png">
</div>
	
<div class="legal">
* Al participar, estás aceptando las normas de uso y bases legales del concurso. Promoción válida para residentes en territorio español.	
</div>	
	
<div class="legal">
** Facebook no patrocina, avala ni administra de modo alguno esta promoción, ni está asociado a ella. Esta promoción esta avalada por Seek Formación S.L.	
</div>		
	
</div>



</body>
</html>