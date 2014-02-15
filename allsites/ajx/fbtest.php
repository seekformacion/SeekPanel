
<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';

$app_id = "622071311181276";
$app_secret = "24c6ad4ef66b34ec0fd74021bfd0fb5a";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));
$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];

if ($like_status) {$stat="Te gusta";}else{$stat="Aun no te gusta";}


if (!empty($signed_request) && !empty($signed_request['app_data'])) {
  $app_data = json_decode($signed_request['app_data'], true);
}

print_r($_GET);

?>



<div style="width: 800px; height:30px; background-color:#E7EBF2; border:1px solid #C4CDE0;"> <?php echo $stat;?> </div>