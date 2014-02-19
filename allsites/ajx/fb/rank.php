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
print_r($friends); 
 
 

?>

<img src="https://graph.facebook.com/<?php echo $user;?>/picture"/>