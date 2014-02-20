

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
                    message: 'Sample Title', 
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
    <p><a href="javascript:facebook();">Test</a></p>
    <div id="fb-root"></div>

    <script type="text/javascript">
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/all.js#xfbml=0&appId=715730281795141";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    </body>
    </html>



