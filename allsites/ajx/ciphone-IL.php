<?php

$user = $facebook->getUser();
  if ($user) {
        $user_profile = $facebook->api('/me');
        $friends = $facebook->api('/me/friends');
         print_r($user_profile);
  }else{
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions', 'next' => "$http_met://www.facebook.com/cursodecursos/app_715730281795141" ) );

  header("Location: $login_url");	
}



?>