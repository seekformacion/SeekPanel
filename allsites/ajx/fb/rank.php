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
//print_r($friends); 
 
 

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

.bloque { padding:10px; border:1px solid #CCCCCC;}	

.rank {  background-color: #DDDDDD;
    border-bottom: 1px solid #CCCCCC;
    border-top: 1px solid #CCCCCC;
    color: #333333;
    font-family: Arial;
    font-size: 12px;
    height: 51px;
    left: 0;
    padding: 4px;
    position: absolute;
    top: 1px;
    width: 410px;
}

</style>

<div class="rank" style="";>
<div style="position:relative; float:left;"><img src="https://graph.facebook.com/100007329815113/picture"/></div>
<div style="position:relative; float:left; margin-left: 5px; width:155px; height: 50px;">Eduardo buena moya</div>
</div>	
	
	


