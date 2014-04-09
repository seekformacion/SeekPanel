<?php
ini_set('session_save_path', '/home/ec2-user/tmp');
session_name('ec2-user');
if(@session_start() == false){session_destroy();session_start();}


header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');

$code="";$do="";$user=0;
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;

global $_REQUEST;
print_r($_REQUEST);

require '/www/repositorios/facebook-php-sdk/src/facebook.php';
require '/www/httpd/seekformacion.com/fbdata.php';


$loginUrl = $facebook->getLoginUrl();

$user = $facebook->getUser();


if(!$user){
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>

.gris1_BG{  background-color: #EBEBEB !important;}	
.page {width: 700px; background-color: #ffffff;
    height: 1000px;
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }

.textos {position: relative; float:left; width: 696px; font-size: 15px; font-family: Arial; color:#555555 }
.legal {position: relative; float:left; width: 696px; font-size: 9px; font-family: Arial; color:#555555; margin-top:5px; }

.franjaAz {position: relative; float:left; width: 666px; background-color:#617087;  height: 130px;  margin-top: 60px; padding:15px; margin-bottom: 40px;}
.ultis { position:relative; float:left;  font-size: 13px; font-family: Arial; color:#ffffff; width: 666px; margin-bottom:10px;}    	

.imgUlti {position:relative; float:left; width:46px; height:46px; margin-right: 6px; }
</style>

<script>
	
	function login(){
	
	window.location='<?php echo $loginUrl; ?>';	
		
	}
	
</script>

<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>Concurso Apple</title>
</head>

<body class="gris1_BG" onload="login();">



</body>
</html>


<?php	
	
	
}else{

$user_permissions = $facebook->api("/$user/permissions");
if(isset($user_permissions["data"][0]["user_likes"])){$participa=1;}else{$participa=0;}

//print_r($user_permissions);
//echo $user;

if(!$participa){include('noparticipa.php');}else{include('noparticipa.php');};

}




?>