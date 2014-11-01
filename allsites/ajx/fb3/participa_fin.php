<?php

$test=0;



 /*
if($user==100007329815113){

$test=1;        
}
*/



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

//$cu=1; $ma=1; $fp=1; $op=1;

if(!$qedan){$onl="";$test=1;}else{$onl="chg1();";};
#$onl="";$test=1; 
 
$v_vali=""; 
$inf=DBselect("select v_sospechoso, v_vali, v_vp FROM Fb_fans WHERE FID='$user';");     
if(count($inf)>0){  $v_vp=$inf[1]['v_vp']; $v_sospechoso=$inf[1]['v_sospechoso']; $v_vali=$inf[1]['v_vali'];  }  

 
$inf=DBselect("select 
sum(cu) as scu, 
sum(ma) as sma, 
sum(fp) as sfp, 
sum(op) as sop 
FROM Fb_fans WHERE REF = (SELECT PID FROM Fb_fans WHERE FID='$user');");     
if(count($inf)>0){  $DA_CU=$inf[1]['scu']; $DA_MA=$inf[1]['sma']; $DA_FP=$inf[1]['sfp']; $DA_OP=$inf[1]['sop']; } 

$inf=DBselect("select 
sum(cu) as scu, 
sum(ma) as sma, 
sum(fp) as sfp, 
sum(op) as sop 
FROM Fb_fans WHERE REF = (SELECT PID FROM Fb_fans WHERE FID='$user') AND v_sospechoso=1 AND v_vali=1 AND v_vp=1;");
if(count($inf)>0){  $V_DA_CU=$inf[1]['scu']; $V_DA_MA=$inf[1]['sma']; $V_DA_FP=$inf[1]['sfp']; $V_DA_OP=$inf[1]['sop']; } 

 

$inf=DBselect("select 
sum(cu) as scu, 
sum(ma) as sma, 
sum(fp) as sfp, 
sum(op) as sop 
FROM Fb_fans WHERE REF IN (SELECT PID FROM Fb_fans WHERE REF = (SELECT PID FROM Fb_fans WHERE FID='$user'));"); 
if(count($inf)>0){  $DAA_CU=$inf[1]['scu']; $DAA_MA=$inf[1]['sma']; $DAA_FP=$inf[1]['sfp']; $DAA_OP=$inf[1]['sop']; } 


$inf=DBselect("
select
sum(cu) as scu,
sum(ma) as sma,
sum(fp) as sfp,
sum(op) as sop
FROM Fb_fans WHERE
REF IN (SELECT PID FROM Fb_fans WHERE
REF = (SELECT PID FROM Fb_fans WHERE FID='$user') AND v_sospechoso=1 AND v_vali=1 AND v_vp=1) AND v_sospechoso=1 AND v_vali=1 AND v_vp=1;");
if(count($inf)>0){  $V_DAA_CU=$inf[1]['scu']; $V_DAA_MA=$inf[1]['sma']; $V_DAA_FP=$inf[1]['sfp']; $V_DAA_OP=$inf[1]['sop']; } 
 

 
 
$inf=DBselect("select url_likes FROM Fb_fans WHERE FID='$user';");  
if(count($inf)>0){$url_likes=$inf[1]['url_likes'];}  
 
 
$SUMP=($cu + $ma + $fp + $op)*100;
$V_SUMP=($cu + $ma + $fp + $op)*100;
 
$contL=0; $V_contL=0;  
if(!$cu){$DA_CU="-"; $DAS_CU=0; $DAAS_CU=0; $DAA_CU="-";$contL++;}else{$DAS_CU=$DA_CU;$DAAS_CU=$DAA_CU;};
if(!$ma){$DA_MA="-"; $DAS_MA=0; $DAAS_MA=0; $DAA_MA="-";$contL++;}else{$DAS_MA=$DA_MA;$DAAS_MA=$DAA_MA;};
if(!$fp){$DA_FP="-"; $DAS_FP=0; $DAAS_FP=0; $DAA_FP="-";$contL++;}else{$DAS_FP=$DA_FP;$DAAS_FP=$DAA_FP;};
if(!$op){$DA_OP="-"; $DAS_OP=0; $DAAS_OP=0; $DAA_OP="-";$contL++;}else{$DAS_OP=$DA_OP;$DAAS_OP=$DAA_OP;};

if(!$cu){$V_DA_CU="-"; $V_DAS_CU=0; $V_DAAS_CU=0; $V_DAA_CU="-";$V_contL++;}else{$V_DAS_CU=$V_DA_CU;$V_DAAS_CU=$V_DAA_CU;};
if(!$ma){$V_DA_MA="-"; $V_DAS_MA=0; $V_DAAS_MA=0; $V_DAA_MA="-";$V_contL++;}else{$V_DAS_MA=$V_DA_MA;$V_DAAS_MA=$V_DAA_MA;};
if(!$fp){$V_DA_FP="-"; $V_DAS_FP=0; $V_DAAS_FP=0; $V_DAA_FP="-";$V_contL++;}else{$V_DAS_FP=$V_DA_FP;$V_DAAS_FP=$V_DAA_FP;};
if(!$op){$V_DA_OP="-"; $V_DAS_OP=0; $V_DAAS_OP=0; $V_DAA_OP="-";$V_contL++;}else{$V_DAS_OP=$V_DA_OP;$V_DAAS_OP=$V_DAA_OP;};



$SUMA=($DAS_CU + $DAS_MA + $DAS_FP + $DAS_OP)*30; 
$SUMAA=($DAAS_CU + $DAAS_MA + $DAAS_FP + $DAAS_OP)*5; 
$INVI=$SUMA+$SUMAA;
$PTOT=$SUMP+$SUMA+$SUMAA;

$V_SUMA=($V_DAS_CU + $V_DAS_MA + $V_DAS_FP + $V_DAS_OP)*30; 
$V_SUMAA=($V_DAAS_CU + $V_DAAS_MA + $V_DAAS_FP + $V_DAAS_OP)*5; 
$V_INVI=$V_SUMA+$V_SUMAA;
$V_PTOT=$V_SUMP+$V_SUMA+$V_SUMAA;



$V_SUMP=$V_SUMP+$url_likes;
$V_PTOT=$V_SUMP+$V_SUMA+$V_SUMAA;

if(!$v_vali){$V_PTOT=0;}


$id="";
$inf=DBselect("select id, PID from Fb_fans WHERE FID=$user;");
if(count($inf)>0){$id=$inf[1]['id']; $PID=$inf[1]['PID'];};

if(!$id){
$ippp=$_SERVER['REMOTE_ADDR'];  
$PID=strtoupper(getUniqueCode(9));
$ins=DBUpIns("INSERT INTO Fb_fans (PID,FID,REF,cu,ma,fp,op,puntos,accTK,v_puntos) VALUES ('$PID',$user,'$REF',$cu,$ma,$fp,$op,'$PTOT','$ippp','$V_PTOT');");   
}else{
$ins=DBUpIns("UPDATE Fb_fans SET cu=$cu, ma=$ma, fp=$fp, op=$op, puntos='$PTOT', v_puntos='$V_PTOT' WHERE id=$id;");        
}


$SUMP=$SUMP+$url_likes;
$PTOT=$SUMP+$SUMA+$SUMAA;

$pos=1;





?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #FFFFFF !important;}  
.page {width: 700px; background-color: #ffffff;
  min-height: 780px;
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

.lks {  color: #666666;
    float: left;
    font-family: arial;
    font-size: 14px;
    list-style: outside none none;
    padding: 20px;
    position: relative;
    width: 650px;}

.lks li{  border: 1px solid #888888;
    font-family: Arial;
    font-size: 12px;
    height: 25px;
    margin-bottom: 15px;
    padding: 5px;
    width: 265px; text-transform: uppercase;position:relative; float:left;}
    
.likeU {position:relative; float:left; margin-left:5px; margin-top:5px;}    
    
.lks a{color:#617087; text-decoration: none;}

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

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function senV(){ $.ajaxSetup({ cache: false });

var email=document.getElementById('emailv').value;

if(validateEmail(email)){

document.getElementById('sendB').value="Enviando";


var url='<?php echo $http_met;?>://www.seekformacion.com/ajx/fb3/sendvalidation.php?PID=<?php echo $PID;?>&nombre=<?php echo $name;?>&FID=<?php echo $user;?>&email=' + email;
$.getJSON(url, function(data) {
$.each(data, function(key, val) {
if((key=='ok')&&(val==1)){document.getElementById('sendB').value="Enviar";document.getElementById('txtOK').innerHTML="e-mail enviado correctamente. Si no puede encontrarlo verifique en su carpeta de spam."; }
if((key=='ok')&&(val==2)){document.getElementById('sendB').value="Enviar";document.getElementById('emailv').style.background="yellow"; }

});
}); 
}else{
document.getElementById('emailv').style.background="yellow";    
}    

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

    
    
<div class="page">
<img style="position: relative; float: left;" src="/img/global/contest/cabeContest.gif">



<div class="franjaAz" style="text-align: center; font-family: Arial; font-size: 20px; font-weight: bold; color:#ffffff;">

La promoción ha finalizado
</div>

<p style="font-family: Arial; font-size: 14px; color:#444444;">
Tras haber comprobado el intento de fraude por algunos participantes utilizando perfiles falsos y con el objeto de poder designar a los justos ganadores, se va a proceder a solicitar la validación de los perfiles. Para ello le enviaremos un enlace al correo electrónico que nos indique. 
<br><br>
Tal y como figura en las <a href="http://cursodecursos.com/concurso_apple/bases.html" target="_new">bases del concurso</a>, los perfiles falsos o que no cumplan los requisitos establecidos en las mismas, serán anulados y retirados los puntos a aquellos que hubieran sumado puntos por la invitación de estos usuarios.  
<br><br>
Este proceso de validación finalizará el próximo 30 de Noviembre, dándose por no válidos aquellos perfiles no validados antes de dicha fecha. 
<br><br>
Una vez terminado este proceso de validación se procederá a publicar el listado definitivo de ganadores así como el ganador del sorteo.        
<br>
<br>

</p>



<script>
window.stopLK=1;    
</script>
<div style="margin-top:10px; background-color: #617087; position:relative; float:left; padding-top:10px; height: 25px; width:693px; color:#ffffff;font-family: Arial;font-size: 13px; text-align: center;  ">
Validación de usuario.  
</div>
<div style=" border: 1px solid #888888; float: left; margin: 0 0 25px 0; position: relative;  width: 691px;">
    
  
  
<div id="links" class="lks">
<?php
if(!$v_vali){
 ?>  
    
Indiquenos la dirección de correo electrónico donde desea recibir el enlace de validación.   


<div style="position:relative;float:left; top:20px; left:120px; ">
<div style="font-family: Arial; font-size: 14px; width:52px; height: 30px;position:relative;float:left; padding-top: 5px;">E-mail:</div> 
<div style="font-family: Arial; font-size: 14px; width:350px; height: 30px;position:relative;float:left;">
<input type="text" name="email" id="emailv" style=""> <input type="button" value="Enviar" id="sendB" onclick="senV();"/>
</div>
</div>  

<?php }else{ ?>

Sus datos de validación han sido recibidos correctamente.

<?php } ?>
</div>


<div id="txtOK" style="font-family: Arial; font-size: 14px; position:relative;float:left; padding: 5px; width:100%; text-align: center;  margin-bottom: 10px; color:green;"></div> 

</div>    
    







<div class="leyen" style="margin-left:363px;">Puntos Totales</div>
<div class="leyen" style="margin-left:10px;">Puntos Validados</div>

<div class="franjaAz">

<div style="position:relative; float:left; margin-left: 3px;"><img src="https://graph.facebook.com/<?php echo $user; ?>/picture" style="width:30px; height:30px;"/></div>
<div style="position:relative; float:left; margin-left: 5px; width:130px; height: 30px; font-family: Arial; color: #FFFFFF; font-size: 13px;"><?php echo $name;?></div>


<div class="ptos" style="margin-left:200px;" id="pt"><?php echo $PTOT;?></div>
<div class="ptos" style="margin-left:40px;" id="ra"><?php echo $V_PTOT;?></div>

<img style="position: absolute; left: 560px; top:-55px  " src="/img/global/contest/premiosP.png">
</div>


</div>
</body>
</html>
    