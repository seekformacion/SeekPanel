

<?php


require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$accessToken = $facebook->getAccessToken();

$user_id="1018154356";

$apprequest_url ="https://graph.facebook.com/" .
    $user_id .
    "/apprequests?message=AAAAAAAA’" . 
    "&data=BBBBBBBB&"  .   
    $accessToken . "&method=post";


echo $apprequest_url;
$result = file_get_contents($apprequest_url);
 echo("Request id number: " . $result);



?>



<!--

   <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <title>Test</title>

    <script type="text/javascript">
    function facebook(){
    	
    FB.ui({method: 'apprequests', data: "https://www.facebook.com/cursodecursos/app_715730281795141?app_data=edededd" ,message: 'Ayudame a ganar este concurso..'}, requestCallback);	        
  
    }
    </script>

    </head>

    <body>
    
    <div id="fb-root"></div>

    <script type="text/javascript">
          window.fbAsyncInit = function() {
        FB.init({
          appId      : '715730281795141',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all/debug.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
   
   
function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
data: "https://www.facebook.com/cursodecursos/app_715730281795141?app_data=edededd" ,
message: 'Ayudame a ganar este concurso..'
});
}
   
   
 </script>


<script type='text/javascript'>
if (top.location!= self.location)
{
top.location = self.location
}
</script>


//HTML Code
<div id="fb-root"></div>
<a href='#' onclick="FacebookInviteFriends();"> 
Facebook Invite Friends Link
</a>

    </body>
    </html>

-->

