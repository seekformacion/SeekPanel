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
		echo $req_data . "<br>"; 
     } 
    }



?>

<script type="text/javascript">

//top.location.href ="<?php echo $req_data;?>";

</script>