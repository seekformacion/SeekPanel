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
$app_data = '';
if(isset($signed_request["app_data"])){ $app_data = $signed_request["app_data"]; }; 


/*
foreach($request_ids as $request_id)
    {
        $request_object = $facebook->api($request_id);
         if(isset($request_object['data'])) $req_data = $request_object['data']; //$req_data will be '12345' as per your request data set.
       // after getting the data, you may like to delete the request.
           $full_request_id = $request_id."_".$fbid; //$fbid is current user facebook id
          $facebook->api("$full_request_id","DELETE");
     }

 * 
 */
 
 
			$request_object = $facebook->api(589173694494833);
           if(isset($request_object['data'])) $req_data = $request_object['data']; //$req_data will be '12345' as per your request data set.
           // after getting the data, you may like to delete the request.
           //$full_request_id = $request_id."_".$fbid; //$fbid is current user facebook id
           //$facebook->api("$full_request_id","DELETE");




echo "<br>";
print_r($req_data);

echo "<br>";


print_r($_GET);
echo "<br>";
print_r($_POST);

echo "<br>";

print_r($signed_request);

echo "<br>";

echo $app_data;


?>

<script type="text/javascript">

window.location = "https://www.facebook.com/cursodecursos/app_715730281795141"

</script>