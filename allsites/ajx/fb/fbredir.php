<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';

$app_id = "457903137645239";
$app_secret = "49d4a51a4b2febedecd26e28c6d71e27";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));

$signed_request = $facebook->getSignedRequest();
$request_ids = $_GET['request_ids'];
$request_ids = explode(",", $request_ids);
foreach($request_ids as $request_id)
    {$request_object = $facebook->api($request_id);
     if(isset($request_object['data'])){
     	$req_data = $request_object['data']; //$req_data will be '12345' as per your request data set.
		//echo $req_data . "<br>"; 
     } 
    }





if (!isset($_COOKIE["seekforFB_REFDE"])){
$expire=time()+60*60*24*2;
setcookie("seekforFB_REFDE", $req_data, $expire, '/');	
}

$url="https://www.facebook.com/cursodecursos/app_715730281795141";

?>

<script type="text/javascript">

top.location.href ="<?php echo $url;?>";

</script>