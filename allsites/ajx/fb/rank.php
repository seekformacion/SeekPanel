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

.rank {width:250px; height:70px; position:absolute; top:0px; left:0px;}

</style>

<div class="bloque shadow rank">
<img src="https://graph.facebook.com/<?php echo $user;?>/picture"/>
</div>


