<?php

$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];
if ($like_status) {
include('ciphone-IL.php');
}else{
include('ciphone-NL.php');
}


?>