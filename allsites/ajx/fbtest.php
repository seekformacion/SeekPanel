<?php

######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F

########## params https://www.facebook.com/cursodecursos?v=app_622071311181276&app_data=jajajajaj



require '/www/repositorios/facebook-php-sdk/src/facebook.php';

$app_id = "715730281795141";
$app_secret = "59d82a1fcc819fc6579aba37ad1ec2c7";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));
$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];

if ($like_status) {$stat="Te gusta";}else{$stat="Aun no te gusta";}


$app_data = '';
if(isset($signed_request["app_data"])){
    $app_data = $signed_request["app_data"];
    }


?>



<div style="width: 800px; height:30px; background-color:#E7EBF2; border:1px solid #C4CDE0;"> <?php echo $stat . " $app_data";?> </div>