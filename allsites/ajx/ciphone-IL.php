te gusta
<?php

$user = $facebook->getUser();
  if ($user) {
        $user_profile = $facebook->api('/me');
        $friends = $facebook->api('/me/friends');
  
  
  }else{
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions' ) );

	
}

?>