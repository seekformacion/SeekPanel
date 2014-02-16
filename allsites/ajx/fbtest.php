<?php

######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F

########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';

$app_id = "715730281795141";
$app_secret = "59d82a1fcc819fc6579aba37ad1ec2c7";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));
$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];

if ($like_status) {$stat="Te gusta y entras por: $http_met";}else{$stat="Aun no te gusta y entras por: $http_met";}


$app_data = '';
if(isset($signed_request["app_data"])){
    $app_data = $signed_request["app_data"];
    }


?>



<div style="width: 800px; height:30px; background-color:#E7EBF2; border:1px solid #C4CDE0;"> <?php echo $stat . " $app_data";?> </div>

<script type="text/javascript" src="<?php echo $http_met;?>://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<?php





$user_permissions = $facebook->api("/me/permissions");

print_r($user_permissions);

if( array_key_exists('publish_actions', $permissions['data'][0]) ) {
    echo "we have permission";
	echo "<br><br>";
	
 
	
	
} else {
    // We don't have the permission

  $user = $facebook->getUser();
  if ($user) {
        $user_profile = $facebook->api('/me');
        $friends = $facebook->api('/me/friends');

        echo '<ul>';
        foreach ($friends["data"] as $value) {
            echo '<li>';
            echo '<div class="pic">';
            echo '<img src="https://graph.facebook.com/' . $value["id"] . '/picture"/>';
            echo '</div>';
            echo '<div class="picName">'.$value["name"].'</div>'; 
            echo '</li>';
        }
        echo '</ul>';
    }
    
    
    echo "no perms";
    echo "<br><br>";
	
    $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream,publish_actions' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';
}

print_r($user_profile);


$mensaje='Probando la publicación de mensajes en Facebook...';
 print_r( $facebook->api('/100007329815113/feed', 'post', array('message' => $mensaje)));



?>