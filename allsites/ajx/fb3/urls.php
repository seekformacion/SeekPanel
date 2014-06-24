<?php




header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
$expire=time()+60*60*24*500;

if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 


foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
$expire=time()+60*60*24*2;

$hoy=date('Y') . date('m') . date('d');

require_once('/www/repositorios/facebook-php-sdk/src/facebook.php');
require_once('/www/httpd/seekformacion.com/fbdata.php');

function getURLL($idp,$user){
$nurls=DBselect("SELECT id FROM urls WHERE id NOT IN (SELECT idURL FROM fid_urls WHERE FID=$user) AND idp=$idp ORDER BY count ASC, peso DESC limit 20;");
return $nurls;	
}


$idu=DBselect("SELECT id FROM Fb_fans WHERE FID=$user;"); 
if(array_key_exists(1, $idu)){
	
$k=1;
$urls=DBselect("SELECT * FROM fid_urls WHERE FID=$user AND date=$hoy;");	
if(count($urls)==0){
$idp=1;	
while ($idp <= 4){	
## busco nuevas
$nurls=getURLL($idp,$user);
$nc=count($nurls);
	if($nc==0){$nurls=getURLL(1,$user);$nc=count($nurls);}
	if($nc>0){
	$get=rand(1, $nc);
	$id=$nurls[$get]['id'];
	DBUpIns("INSERT INTO fid_urls (FID,idURL,date) VALUES ('$user',$id,'$hoy');");	
	
	$urls[$k]['idURL']=$id;
	$urls[$k]['done']=0;
	
	$k++;}
$idp++;}

	
}	
	
$html="";$chk=0;

foreach ($urls as $key => $uval) {
			
			$id=$uval['idURL'];
			$done=$uval['done'];
							
			$dat=DBselect("SELECT * FROM urls where id=$id;");	
			$catU=$dat[1]['urlca'];
			$curU=$dat[1]['urlcu'];
			$nom =$dat[1]['nom'];
			 
			 if(!$done){
					
					$response=array();
						
					$fql = "SELECT user_id FROM url_like WHERE url='$curU' AND user_id = $user;";
					//echo $fql . "\n";
					$response = $facebook->api(array(
					  'method' => 'fql.query',
					  'query' =>$fql,
					));	
					
					//print_r($response);
					$done=FALSE;
					if(array_key_exists(0, $response)){
					if(array_key_exists('user_id', $response[0])){
					$done=TRUE;
					$chk=1;
					DBUpIns("UPDATE urls SET count=count+1 where id=$id;");	
					DBUpIns("UPDATE fid_urls SET done=1 where idURL=$id AND FID=$user;");
					}}		
				
			
			  }
			
			if($done){$img='<img class="likeU" src="/img/global/fb/like.png">';}else{$img="";}
			
			
			$html .="<li><a href='$catU' target='_new'>$nom</a></li> $img \n";





}

if($chk){
$ccc=DBselect("SELECT count(id) as cc FROM fid_urls WHERE FID=$user AND done=1;");
if(array_key_exists(1, $ccc)){$plikes=($ccc[1]['cc'])*20;}

$ap=DBselect("SELECT url_likes FROM Fb_fans WHERE FID=$user;");
if(array_key_exists(1, $ap)){$alikes=$ap[1]['url_likes'];}

if($plikes!=$alikes){$res['chk']=$plikes;
DBUpIns("UPDATE Fb_fans SET url_likes=$plikes  WHERE FID=$user;");		
}
}



$res['html']=$html;
echo json_encode($res);	
	
}












?>