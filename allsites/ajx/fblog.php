<?php

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$user = $facebook->getUser();

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