<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
$expire=time()+60*60*24*500;

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

$code="";$do="";$user=0;
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;



require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';




$cu=0;$ma=0;$fp=0;$op=0; $qedan=0;
$response = $facebook->api("/$user/likes/1424213751150594");
if(isset($response['data'][0]['id'])){$likes[1]=1;$cu=1;}else{$likes[1]=0;$qedan++;}
$response = $facebook->api("/$user/likes/432712510165494");
if(isset($response['data'][0]['id'])){$likes[2]=1;$ma=1;}else{$likes[2]=0;$qedan++;}
$response = $facebook->api("/$user/likes/216539681879446");
if(isset($response['data'][0]['id'])){$likes[3]=1;$fp=1;}else{$likes[3]=0;$qedan++;}
$response = $facebook->api("/$user/likes/591979084222922");
if(isset($response['data'][0]['id'])){$likes[4]=1;$op=1;}else{$likes[4]=0;$qedan++;}


if(!$qedan){$likes['stop']=1;};
 
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
 
 
 
$inf=DBselect("select url_likes FROM Fb_fans WHERE FID='$user';");	
if(count($inf)>0){$url_likes=$inf[1]['url_likes'];} 
 
 
$SUMP=($cu + $ma + $fp + $op)*100;

$likes['pp']=$SUMP;
 
$contL=0;  
if(!$cu){$DA_CU="-"; $DAS_CU=0; $DAAS_CU=0; $DAA_CU="-";$contL++;}else{$DAS_CU=$DA_CU;$DAAS_CU=$DAA_CU;};
if(!$ma){$DA_MA="-"; $DAS_MA=0; $DAAS_MA=0; $DAA_MA="-";$contL++;}else{$DAS_MA=$DA_MA;$DAAS_MA=$DAA_MA;};
if(!$fp){$DA_FP="-"; $DAS_FP=0; $DAAS_FP=0; $DAA_FP="-";$contL++;}else{$DAS_FP=$DA_FP;$DAAS_FP=$DAA_FP;};
if(!$op){$DA_OP="-"; $DAS_OP=0; $DAAS_OP=0; $DAA_OP="-";$contL++;}else{$DAS_OP=$DA_OP;$DAAS_OP=$DAA_OP;};

$SUMA=($DAS_CU + $DAS_MA + $DAS_FP + $DAS_OP)*30; 
$SUMAA=($DAAS_CU + $DAAS_MA + $DAAS_FP + $DAAS_OP)*5; 
$INVI=$SUMA+$SUMAA;
$PTOT=$SUMP+$SUMA+$SUMAA;


$likes['pi']=$INVI;
$likes['pt']=$PTOT;


$id="";
$inf=DBselect("select id from Fb_fans WHERE FID=$user;");
if(count($inf)>0){$id=$inf[1]['id'];};

if(!$id){
$PID=strtoupper(getUniqueCode(9));
$ins=DBUpIns("INSERT INTO Fb_fans (PID,FID,REF,cu,ma,fp,op,puntos) VALUES ('$PID',$user,'$REF',$cu,$ma,$fp,$op,'$PTOT');");	
}else{
$ins=DBUpIns("UPDATE Fb_fans SET cu=$cu, ma=$ma, fp=$fp, op=$op, puntos='$PTOT' WHERE id=$id;");		
}

$SUMP=$SUMP+$url_likes;
$PTOT=$SUMP+$SUMA+$SUMAA;


$pos=1;
$rk=DBselect("select distinct (puntos + url_likes) as rk from Fb_fans ORDER BY rk DESC;");
if(count($rk)>0){foreach($rk as $k => $val){$rank[$val['rk']]=$pos; $pos++;}}
$ranking=$rank[$PTOT] . "º";

if($PTOT==0){$ranking="-";}

$likes['ra']=$ranking;

echo json_encode($likes);

?>