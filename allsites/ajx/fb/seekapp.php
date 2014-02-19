<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};

######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F

########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$accessToken = $facebook->getAccessToken();

//echo "$accessToken <br>";
//echo "view: $b <br>";


$signed_request = $facebook->getSignedRequest();

$portales[1]="cursodecursos.com";
$portales[2]="masterenmasters.com";
$portales[3]="fp-formacionprofesional.com";
$portales[4]="oposicionesa.com";

$eqP[1424213751150594]=1;


$like_status = $signed_request["page"]["liked"];
$idpFB = $eqP[$signed_request["page"]["id"]];
$portal=$portales[$idpFB];


$app_data = '';
if(isset($signed_request["app_data"])){ $app_data = $signed_request["app_data"]; }; 
echo "app_data: $app_data  <br>";



if($b=='iphone'){include('ciphone.php');};


?>







<?php


/*
  
 $app_data = '';
if(isset($signed_request["app_data"])){ $app_data = $signed_request["app_data"]; }; 
  
 
<div style="width: 800px; height:30px; background-color:#E7EBF2; border:1px solid #C4CDE0;"> <?php echo $stat . " $app_data";?> </div>
/// esto solo funciona si ya se tienen permisos
//$user_permissions = $facebook->api("/me/permissions");

print_r($user_permissions);

if( array_key_exists('publish_actions', $user_permissions['data'][0]) ) {
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




$post= $facebook->api('/100007329815113/feed', 'post',  array(
                                      'link' => 'cursodecursos.com/cursos-de-belleza-y-estetica.html',
                                      'message' => 'Como me gustan estos cursos.'
                                 ) );


*/


?>