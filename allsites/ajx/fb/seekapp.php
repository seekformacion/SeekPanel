<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F
########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$accessToken = $facebook->getAccessToken();
$signed_request = $facebook->getSignedRequest();

$portales[1]="cursodecursos.com";
$portales[2]="masterenmasters.com";
$portales[3]="fp-formacionprofesional.com";
$portales[4]="oposicionesa.com";


$expire=time()+60*60*24*2;
	
setcookie("seekforFB_ID",'', $expire, '/');
setcookie("seekforFB_PID",'', $expire, '/');



$eqP[1424213751150594]=1;
$eqP[432712510165494]=2;
$eqP[216539681879446]=3;
$eqP[591979084222922]=4;

$like_status = $signed_request["page"]["liked"];
$idpFB = $eqP[$signed_request["page"]["id"]];
$portal=$portales[$idpFB];

//echo $signed_request["page"]["id"];

$app_data = '';
if(isset($signed_request["app_data"])){ $app_data = $signed_request["app_data"]; }; 



if($b=='iphone'){include('ciphone.php');};



?>

<div id="fb-root"></div>

<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({
appId      : '457903137645239',
status     : true,
xfbml      : true
});
};

(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/es_LA/all/debug.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
   
</script>







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