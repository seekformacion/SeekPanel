<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('/www/repositorios/facebook-php-sdk/src/facebook.php');




$app_id = "439386826192305";
$app_secret = "8f802ef919d61d26708df95dbac11af2";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));

  $user_id = $facebook->getUser();
  
  print_r($facebook);
  echo "<br><br>";
  
  print_r($user_id);
  
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>

  </body>
</html>

