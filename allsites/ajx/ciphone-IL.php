te gusta
<?php

$user = $facebook->getUser();
  if ($user) {
        $user_profile = $facebook->api('/me');
        $friends = $facebook->api('/me/friends');
  
  
  }else{
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions' ) );
  
  	
?>


<iframe style="position: absolute; top:52px; background-color: white; "  src="<?php echo $login_url; ?>" width="300" height="300" border="0" frameborder="0" marginheight="0" scrolling="auto"></iframe>


<?php	
	
}

?>