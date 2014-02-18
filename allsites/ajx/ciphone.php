<?php

$signed_request = $facebook->getSignedRequest();

print_r($signed_request);

$like_status = $signed_request["page"]["liked"];

$app_data = '';
if(isset($signed_request["app_data"])){ $app_data = $signed_request["app_data"]; }; 
//echo "app_data: $app_data  <br>";


if ($like_status) {
include('ciphone-IL.php');
}else{
include('ciphone-NL.php');
}


?>