   <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <title>Test</title>

  
    </head>

    <body>
    
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
         js.src = "//connect.facebook.net/en_US/all/debug.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
   
   
function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
link: "http://seekformacion.com" ,
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

