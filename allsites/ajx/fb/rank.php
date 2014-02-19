<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	

//echo "/$user/likes/1424213751150594";

$cu=0;$ma=0;$fp=0;$op=0;
$response = $facebook->api("/$user/likes/1424213751150594");
if(isset($response['data'][0]['id'])){$likes[1]=1;$cu=1;}else{$likes[1]=0;}

$res=DBUpIns("UPDATE Fb_fans SET cu=$cu, ma=$ma, fp=$fp, op=$op WHERE FID=$user;");

 //$user_profile = $facebook->api("/$user");

$user_profile = $facebook->api("/$user");
$friends = $facebook->api("/$user/friends");

$name=$user_profile['name'];
//print_r($user_profile); 
 
 

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
.nber {position:relative; float:left; top:13px; width: 20px; text-align: center; font-family:Arial; font-size:14px; color:#444444}

.likA {position:absolute; top:-10px; }

</style>


<div style="position: absolute; top: 3px; left:267px;" class="miniT">Puntos</div>	
<div style="position: absolute; top: 3px; left:326px;" class="miniT">Ranking</div>	
<div class="rank" style="";>
<div style="position:relative; float:left;"><img src="https://graph.facebook.com/<?php echo $user; ?>/picture" style="width:30px; height:30px;"/></div>
<div style="position:relative; float:left; margin-left: 5px; width:155px; height: 50px;"><?php echo $name;?></div>
</div>	
	
<div style="position: absolute; width:40px; left:263px;" class="point">15251</div>	
<div style="position: absolute; width:40px; left:324px;" class="point">51</div>		
	
	
<div class="bloque shadow contenedor"></div>	
	
	
	
<div class="pest uno">Mis puntos</div>	
<div class="pest_off dos">Conseguir puntos</div>		



<div id="uno" style="position: absolute; top: 150px; left:20px;">
	

<div class="ftab" style="margin-top:30px;">
<img src="https://seekformacion.com/img/global/fb/miniLog1.png" border="0" class="ilogo">	

<div style="left:87px;" class="nber">1</div>		
<div style="left:202px;" class="nber">22</div>
<div style="left:331px;" class="nber">145</div>

</div>	
	
<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog2.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber">-</div>		
<div style="left:202px;" class="nber">-</div>
<div style="left:331px;" class="nber">-</div>

</div>	

<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog3.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber">-</div>		
<div style="left:202px;" class="nber">-</div>
<div style="left:331px;" class="nber">-</div>
	
</div>	

<div class="ftab">
<img src="https://seekformacion.com/img/global/fb/miniLog4.png" border="0" class="ilogo">

<div style="left:87px;"  class="nber">-</div>		
<div style="left:202px;" class="nber">-</div>
<div style="left:331px;" class="nber">-</div>
	
</div>	


	
<img src="https://seekformacion.com/img/global/fb/likP.png" border="0" class="likA" style="left:250px;">	
<img src="https://seekformacion.com/img/global/fb/likA.png" border="0" class="likA" style="left:385px;">	
<img src="https://seekformacion.com/img/global/fb/likAA.png" border="0" class="likA" style="left:506px;">		
	
	
</div>
