<?php

######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F

########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj

print_r($_GET);

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

if ($like_status) {$stat="Te gusta";}else{$stat="Aun no te gusta";}


$app_data = '';
if(isset($signed_request["app_data"])){
    $app_data = $signed_request["app_data"];
    }


?>



<div style="width: 800px; height:30px; background-color:#E7EBF2; border:1px solid #C4CDE0;"> <?php echo $stat . " $app_data";?> </div>


<script>

var $; 
var jQuery; 

// Add jQuery 
var GM_JQ = document.createElement("script"); 
GM_JQ.src = "http://code.jquery.com/jquery-latest.min.js"; 
GM_JQ.type = "text/javascript"; 

document.body.appendChild(GM_JQ); 

// Check if jQuery's loaded 
var checker = setInterval(function() { 
if (typeof unsafeWindow.jQuery != 'undefined') { 
clearInterval(checker); 
jQuery = unsafeWindow.jQuery; 
$ = jQuery.noConflict(true); 
onLoadComplete(); 
} 
},100); 

// All your GM code must be inside this function 
function onLoadComplete() { 
unsafeWindow.console.log(jQuery); // check if the dollar (jquery) function works 

jQuery('.UIComposer_Button').click(function () { 
console.log('BEGIN letsJQuery'); 
}); 
}



function getremotecookie() {

	var surl =  "http://cursodecursos.com:8080/ajx/session.php?callback=?"; 
	var me = $(this); 
	$.getJSON(surl,  function(rtndata) { 
	var cookie=rtndata.message;
	
	var csin=cookie.replace('||new','');
	if(csin.length < cookie.length){
	cookie=csin;
	}
		
	setCookie("seekforID",cookie,365);
	
	alert(cookie);
 });
 
}

getremotecookie();	
	
</script>