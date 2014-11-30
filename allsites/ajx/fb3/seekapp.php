<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
$expire=time()+60*60*24*500;





$code="";$do="";$user=0;$error="";
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;



require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';



if($do=='perm'){ ########## callback de login

	$user = $facebook->getUser();
	if(!$user){
	$loginUrl = $facebook->getLoginUrl(); //print_r($_REQUEST);
	if(!$error){header("Location: $loginUrl");}else{echo "<script>window.close();</script>";};
	}else{
	$user_permissions = $facebook->api("/$user/permissions");
	if(isset($user_permissions["data"][0]["user_likes"])){
	setcookie("perm", 2, $expire, '/');		
	}else{
	setcookie("perm", 1, $expire, '/');	
	}
	echo "<script>window.close();</script>";
	}




}else{
	
$req_data="";

$signed_request = $facebook->getSignedRequest();
if(($signed_request)&&(isset($_GET['request_ids']))){
$request_ids = $_GET['request_ids'];
$request_ids = explode(",", $request_ids);
if(count($request_ids)>0){
foreach($request_ids as $request_id)
    {$request_object = $facebook->api($request_id);
     if(isset($request_object['data'])){
     	$req_data = $request_object['data']; //$req_data will be '12345' as per your request data set.
		//echo $req_data . "<br>"; 
     } 
    }}

if (!isset($_COOKIE["seekforFB_REFDE"])){
$expire=time()+60*60*24*2;
setcookie("seekforFB_REFDE", $req_data, $expire, '/');	
}
}




	
	
$loginUrl = $facebook->getLoginUrl();
$user = $facebook->getUser();

#######################3##################
##########################################
if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";}
//    $http_met= "http";

#######################3##################
##########################################

    $finpromo=TRUE;
    $finpromo2=FALSE;
//$user=100007329815113;



$users_ban[545870963]=1;
$users_ban[100001770109514]=1;
$users_ban[638135366]=1;
$user_test[1000073298151131]=1;


 $ppar="participa.php";
 $pnopar="noparticipa.php";

if((array_key_exists($user, $user_test))||($finpromo)){
 $ppar="participa_fin.php";
 $pnopar="noparticipa_fin.php";   
    
}

    if((array_key_exists($user, $user_test))||($finpromo2)){
        $ppar="participa_fintotal.php";
        $pnopar="noparticipa_fin.php";

    }




if((array_key_exists($user, $users_ban))&&($finpromo)){
$ppar="ban_participa_fin.php";
$pnopar="noparticipa_fin.php";     
}


if(!$user){

if(isset($_COOKIE["perm"])){
	
		if($_COOKIE["perm"]==2){
			
		header("Location: $loginUrl");
	
		}else{
		include($pnopar);		
		}	

	}else{
	include($pnopar);		
	}

}else{
	
$user_permissions = $facebook->api("/$user/permissions");
if(isset($user_permissions["data"][0]["user_likes"])){
		 
       
        include($ppar);    
           
}else{
		include($pnopar);
}	
	

}


}


?>