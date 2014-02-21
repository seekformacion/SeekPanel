<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	

//echo "/$user/likes/1424213751150594";

$cu=0;$ma=0;$fp=0;$op=0;
$response = $facebook->api("/$user/likes/1424213751150594");
if(isset($response['data'][0]['id'])){$likes[1]=1;$cu=1;}else{$likes[1]=0;}

$response = $facebook->api("/$user/likes/432712510165494");
if(isset($response['data'][0]['id'])){$likes[2]=1;$ma=1;}else{$likes[2]=0;}

$response = $facebook->api("/$user/likes/216539681879446");
if(isset($response['data'][0]['id'])){$likes[3]=1;$fp=1;}else{$likes[3]=0;}

$response = $facebook->api("/$user/likes/591979084222922");
if(isset($response['data'][0]['id'])){$likes[4]=1;$op=1;}else{$likes[4]=0;}


$res=DBUpIns("UPDATE Fb_fans SET cu=$cu, ma=$ma, fp=$fp, op=$op WHERE FID=$user;");

 //$user_profile = $facebook->api("/$user");

$user_profile = $facebook->api("/$user");
//$friends = $facebook->api("/$user/friends");

$name=$user_profile['name'];
//print_r($friends); 
 
$DA_CU=0;$DA_MA=0;$DA_FP=0;$DA_OP=0; 
$DAA_CU=0;$DAA_MA=0;$DAA_FP=0;$DAA_OP=0; 



$inf=DBselect("SELECT PID from Fb_fans WHERE FID='$user';");
if(count($inf)>0){	$PID=$inf[1]['PID'];};
$redire=$PID;
 
 
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
if(!$cu){$cu='<img src="https://seekformacion.com/img/global/fb/warnG.png" border="0">'; $DA_CU="-"; $DAS_CU=0; $DAAS_CU=0; $DAA_CU="-";$contL++;}else{$DAS_CU=$DA_CU;$DAAS_CU=$DAA_CU;};
if(!$ma){$ma='<img src="https://seekformacion.com/img/global/fb/warnG.png" border="0">'; $DA_MA="-"; $DAS_MA=0; $DAAS_MA=0; $DAA_MA="-";$contL++;}else{$DAS_MA=$DA_MA;$DAAS_MA=$DAA_MA;};
if(!$fp){$fp='<img src="https://seekformacion.com/img/global/fb/warnG.png" border="0">'; $DA_FP="-"; $DAS_FP=0; $DAAS_FP=0; $DAA_FP="-";$contL++;}else{$DAS_FP=$DA_FP;$DAAS_FP=$DAA_FP;};
if(!$op){$op='<img src="https://seekformacion.com/img/global/fb/warnG.png" border="0">'; $DA_OP="-"; $DAS_OP=0; $DAAS_OP=0; $DAA_OP="-";$contL++;}else{$DAS_OP=$DA_OP;$DAAS_OP=$DAA_OP;};

$SUMA=($DAS_CU + $DAS_MA + $DAS_FP + $DAS_OP)*30; 
$SUMAA=($DAAS_CU + $DAAS_MA + $DAAS_FP + $DAAS_OP)*5; 

$PTOT=$SUMP+$SUMA+$SUMAA;


$res=DBUpIns("UPDATE Fb_fans SET puntos=$PTOT WHERE FID=$user;");

$pos=1;
$rk=DBselect("select distinct puntos as rk from Fb_fans ORDER BY rk DESC;");
if(count($rk)>0){foreach($rk as $k => $val){$rank[$val['rk']]=$pos; $pos++;}}

$ranking=$rank[$PTOT];
?>
<style>

.shadow {
    -moz-box-shadow: 3px 4px 8px #999;
    -webkit-box-shadow: 3px 4px 8px #999;
    box-shadow: 3px 4px 8px #999;
    /* IE 8 */
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=8, Direction=135, Color='#999999')";
    /* IE 5.5 - 7 */
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=8, Direction=135, Color='#999999');
}

.bloque { padding:10px; border:1px solid #BBBBBB;}	

.rank {    background-color: #DDDDDD;
    border-bottom: 1px solid #BBBBBB;
    border-top: 1px solid #BBBBBB;
    color: #333333;
    font-family: Arial;
    font-size: 12px;
    height: 31px;
    left: 0;
    padding: 4px;
    position: absolute;
    top: 15px;
    width: 410px;
}    

.miniT{ font-family:Arial; font-size:10px; color:#333333;}

.point { top: 19px; height:23px; background-color: #FFFFFF; border:1px solid #BBBBBB; border-radius: 20%; padding-top:7px; 
font-family:Arial; font-size:10px; color:#333333; text-align: center}


.contenedor{width:780px; height:450px; position:absolute; top:110px;}

.pest {height: 23px; background-color: #FFFFFF;  border-right: 1px solid #BBBBBB; border-left: 1px solid #BBBBBB; padding:7px 30px 0px 30px;
text-align:center; font-family:Arial; font-size:13px; font-style:italic;
 border-top: 1px solid #BBBBBB; position:absolute; top: 80px;}

.pest_off {height: 23px; padding:7px 30px 0px 30px; cursor:pointer;
text-align:center; font-family:Arial; font-size:13px; font-style:italic;
position:absolute; top: 80px;}



.uno { left:20px;}

.dos { left:147px;}

.ilogo {position:relative; float:left;}
.ftab {background-color: #EEEEEE; border:1px solid #BBBBBB; height:40px; width:750px; position:relative; float:left; margin-bottom:10px; }

.ftabB {background-color: #EEEEEE; border:1px solid #BBBBBB; height:40px; width:200px; position:relative; float:right; margin-bottom:10px; margin-right: 36px; }

.nber {position:relative; float:left; top:13px; width: 20px; text-align: center; font-family:Arial; font-size:14px; color:#444444}

.nberB {position:relative; float:left; top:13px;  text-align: center; font-family:Arial; font-size: 15px;  color:#444444}


.likA {position:absolute; top:-10px; }

</style>



<div style="position: absolute; top: 3px; left:267px;" class="miniT">Puntos</div>	
<div style="position: absolute; top: 3px; left:326px;" class="miniT">Ranking</div>	
<div class="rank">
<div style="position:relative; float:left; margin-left: 3px;"><img src="https://graph.facebook.com/<?php echo $user; ?>/picture" style="width:30px; height:30px;"/></div>
<div style="position:relative; float:left; margin-left: 5px; width:155px; height: 50px;"><?php echo $name;?></div>
</div>	
	
<div style="position: absolute; width:40px; left:263px;" class="point"><?php echo $PTOT;?></div>	
<div style="position: absolute; width:40px; left:324px;" class="point"><?php echo $ranking;?></div>		
	
	
<div class="bloque shadow contenedor"></div>	
	
	
	
<div id="p1" class="pest uno" onclick="chkp(1);">Mis puntos</div>	
<div id="p2" class="pest_off dos" onclick="chkp(2);">Conseguir puntos</div>		



<div id="1" style="position: absolute; top: 150px; left:20px; visibility: visible;">


<div class="ftab" style="margin-top:30px;">
<img src="https://seekformacion.com/img/global/fb/miniLog1.png" border="0" class="ilogo">	

<div style="left:87px;" class="nber"><?php echo $cu;?></div>		
<div style="left:202px;" class="nber"><?php echo $DA_CU;?></div>
<div style="left:331px;" class="nber"><?php echo $DAA_CU;?></div>

</div>	
	
<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog2.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber"><?php echo $ma;?></div>		
<div style="left:202px;" class="nber"><?php echo $DA_MA;?></div>
<div style="left:331px;" class="nber"><?php echo $DAA_MA;?></div>

</div>	

<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog3.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber"><?php echo $fp;?></div>		
<div style="left:202px;" class="nber"><?php echo $DA_FP;?></div>
<div style="left:331px;" class="nber"><?php echo $DAA_FP;?></div>
	
</div>	

<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog4.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber"><?php echo $op;?></div>		
<div style="left:202px;" class="nber"><?php echo $DA_OP;?></div>
<div style="left:331px;" class="nber"><?php echo $DAA_OP;?></div>
	
</div>	


<div class="ftab">


<div style="left:6px;"   class="nber">Subtotales:</div>
<div style="left:278px;" class="nber"><?php echo $SUMP;?></div>		
<div style="left:394px;" class="nber"><?php echo $SUMA;?></div>
<div style="left:524px;" class="nber"><?php echo $SUMAA;?></div>
	
</div>	


<div class="ftabB">
<div style="left:32px;"   class="nberB">Total puntos: <?php echo $PTOT;?></div>
</div>	


	
<img src="https://seekformacion.com/img/global/fb/likP.png" border="0" class="likA" style="left:250px;">	
<img src="https://seekformacion.com/img/global/fb/likA.png" border="0" class="likA" style="left:385px;">	
<img src="https://seekformacion.com/img/global/fb/likAA.png" border="0" class="likA" style="left:506px;">		
	
	
</div>

<script type="text/javascript">
	

	
</script>

<div id="2" style="position: absolute; top: 150px; left:20px; visibility: hidden;">

<div style="position: absolute; top: 150px; left:334px;"><img src="https://seekformacion.com/img/global/fb/preloader.gif" border="0" /></div>		
	
</div>






