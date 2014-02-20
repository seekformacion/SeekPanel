

   <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <title>Test</title>

    <script type="text/javascript">
    function facebook(){        
        FB.login(function(response) {
            if (response.authResponse) {
                var access_token = FB.getAuthResponse()['accessToken'];
                FB.ui({
                    method: 'apprequests',
                    message: 'Ayudame a ganar este concurso..', 
                    data: "https://www.facebook.com/cursodecursos/app_715730281795141?app_data=edededd"
                }, function(response){          
                    console.log('OK');
                });
            }
        }, {scope: 'publish_stream'});
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
    </script>


<p><a href="javascript:facebook();">Test</a></p>

    </body>
    </html>



