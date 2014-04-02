<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';

$app_id = "695305357192305";
$app_secret = "46258d32495f23804a167195a3a4201d";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));


  
  $my_url = 'http://seekformacion.com/ajx/chkmails.php';

  
  
  
  if(array_key_exists('code', $_REQUEST)){
  $code = $_REQUEST["code"];
  
  }else{$code="";}
  
 // auth user
 if(empty($code)) {
 	
	
$redirect=$my_url;
//$redirect=urlencode($redirect);
$dialog_url = $facebook->getLoginUrl( array( 'redirect_uri' => $redirect, 'scope' => 'email,user_education_history', 'display' => 'popup') );
	
	
echo("<script>top.location.href='" . $dialog_url . "'</script>");
 
}


  // get user access_token
  $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
    . $app_id . '&redirect_uri=' . urlencode($my_url) 
    . '&client_secret=' . $app_secret 
    . '&code=' . $code;

  // response is of the format "access_token=AAAC..."
  $access_token = substr(file_get_contents($token_url), 13);

  // run fql query
  $fql_query_url = 'https://graph.facebook.com/'
    . 'fql?q=SELECT+name+FROM+standard_user_info+WHERE+email=\'e_b_moya@hotmail.com\''
    . '&access_token=' . 'CAAJ4YGTTbHEBAC3W7JpeeqJEHlFhkQNw29qYlamsslIvIk3Jd1FBlrQemaqN0RvqS7kBTcV7tFZASdsUZBqEFaagfwiQN9VPhOZAM7NzZCZAZAab5zaeGrZAvpoX7Xw6wjIdKe3ZCdgJh1K9NhtiIHZC90aiDyyvc0jEjcRfg8WO5N409tE1EmjIupr4f6kh86xoei0rjgUQtigZDZD';
	
echo "<br> <br> $fql_query_url  <br> <br>";	
  $fql_query_result = file_get_contents($fql_query_url);
  $fql_query_obj = json_decode($fql_query_result, true);

  // display results of fql query
  echo '<pre>';
  print_r("query results:");
  print_r($fql_query_obj);
  echo '</pre>';

  // run fql multiquery
  $fql_multiquery_url = 'https://graph.facebook.com/'
    . 'fql?q={"all+friends":"SELECT+uid2+FROM+friend+WHERE+uid1=me()",'
    . '"my+name":"SELECT+name+FROM+user+WHERE+uid=me()"}'
    . '&access_token=' . $access_token;
  $fql_multiquery_result = file_get_contents($fql_multiquery_url);
  $fql_multiquery_obj = json_decode($fql_multiquery_result, true);

  // display results of fql multiquery
  echo '<pre>';
  print_r("multi query results:");
  print_r($fql_multiquery_obj);
  echo '</pre>';
?>





