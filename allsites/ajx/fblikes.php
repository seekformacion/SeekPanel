<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('/www/repositorios/facebook-php-sdk/src/facebook.php');

  $config = array(
    'appId' => '439386826192305',
    'secret' => '8f802ef919d61d26708df95dbac11af2',
    'cookie' => true,
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user = $facebook->getUser();
  
  print_r($facebook);
  echo "<br><br><br>";
  
  print_r($user_id);
  
?>
<html>
  <head></head>
  <body>
<?php

if ($user <> '0' && $user <> '') { /*if valid user id i.e. neither 0 nor blank nor null*/
try {
// Proceed knowing you have a logged in user who's authenticated.
$user_profile = $facebook->api('/me');
} catch (FacebookApiException $e) { /*sometimes it shows user id even if user in not logged in and it results in Oauth exception. In this case we will set it back to 0.*/
error_log($e);
$user = '0';
}
}
if ($user <> '0' && $user <> '') { /*So now we will have a valid user id with a valid oauth access token and so the code will work fine.*/
echo "UserId : " . $user;

$params = array( 'next' => 'http://www.anujkumar.com' );
echo "<p><a href='". $facebook->getLogoutUrl($params) . "'>Logout</a>";

$user_profile = $facebook->api('/me');
echo "<p>Name : " . $user_profile['name'];
echo "<p>";
print_r($user_profile);

} else {/*If user id isn't present just redirect it to login url*/
header("Location:{$facebook->getLoginUrl(array('req_perms' => 'email,offline_access'))}");
}

?>

  </body>
</html>

