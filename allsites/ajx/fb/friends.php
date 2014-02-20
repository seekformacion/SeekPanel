<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';

if (isset($_COOKIE["seekforFB_ID"])){$user= $_COOKIE["seekforFB_ID"];};	


//$response = $facebook->api("/$user/likes/1424213751150594");

$friends = $facebook->api("/$user/friends"); //echo "/$user/friends";

//print_r($friends);

$attachment = array(
    'message' => 'hola hola',
    'name' => 'titulo',
    'caption' => 'caption',
    'link' => 'http://seekformacion.com',
    'description' => 'descripcion',
    'picture' => 'http://masterenmasters.com/img/masterenmasters.com/allviews/cabcurso.gif',
  
);



//www.facebook.com/dialog/apprequests?app_id=715730281795141&message=Facebook%20Dialogs%20are%20so%20easy!&redirect_uri=http://www.example.com/response

//$result = $facebook->api("/1018154356/feed/",'post',$attachment);

/*
foreach($friendStack as $friend_data) {
    $friend_fb_id = $friend_data['fb_id'];
    $result = $facebook->api("/$friend_fb_id/feed/",'post',$attachment);
}


*/


?>
<html>
<body>
<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '715730281795141',
          status     : true,
          xfbml      : true
        });
        
        
FB.ui({method: 'apprequests',
  message: 'My Great Request'
}, requestCallback);
        
        
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/es_ES/all/debug.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));




    </script>







</body>
</html>





