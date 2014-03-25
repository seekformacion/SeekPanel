<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');

if (isset($_COOKIE["seekforFB_ID"])){
$uss=$_COOKIE["seekforFB_ID"];
}

if($uss==1018154356){
include('ciphone-IL.php');	
}else{

if ($like_status) {
include('ciphone-IL.php');
}else{
include('ciphone-NL.php');
}

}
?>