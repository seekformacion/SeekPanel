<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

// Remember to copy files from the SDK's src/ directory to a
 // directory in your application on the server, such as php-sdk/
require_once('/www/repositorios/facebook-php-sdk/src/facebook.php');
require '/www/httpd/seekformacion.com/fbdata.php';

//$session = $facebook->getSession();

$user_id = $facebook->getUser();
  
print_r($session);
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



$post= $facebook->api('/100007329815113/feed', 'post',  array(
                                      'link' => 'masterenmasters.com/masters-en-ciencia-y-tecnologia.html',
                                      'message' => 'Como me gustan estos cursos.'
                                 ) );
								 
print_r($post);


  ?>

  </body>
</html>

