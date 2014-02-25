<?php
foreach($_GET as $nombre_campo => $valor){  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";   eval($asignacion);};
######### add boton   https://www.facebook.com/dialog/pagetab?api_key=715730281795141&next=https%3A%2F%2Fwww.facebook.com%2F
########## params https://www.facebook.com/cursodecursos?v=app_715730281795141&app_data=jajajajaj


function DBselect($queryp){
	
global $v;$resultados=array();

$dbnivel=new DB($v['conf']['host'],$v['conf']['usr'],$v['conf']['pass'],$v['conf']['db']);
if (!$dbnivel->open()){die($dbnivel->error());};

$dbnivel->query($queryp);

if($v['debug']==-1){echo $queryp . "    <br>\n";}
echo $dbnivel->error();

$cuenta=0;
while ($row = $dbnivel->fetchassoc()){$cuenta++;foreach($row as $campo => $valor){$resultados[$cuenta][$campo]=$valor;};};



if (!$dbnivel->close()){die($dbnivel->error());};	


return $resultados;	

}


function DBUpIns($queryp){
global $v;$resultados=array();

$dbnivel=new DB($v['conf']['host'],$v['conf']['usr'],$v['conf']['pass'],$v['conf']['db']);
if (!$dbnivel->open()){die($dbnivel->error());};


$dbnivel->query($queryp);

if($v['debug']==-1){echo $queryp . "    <br>\n";}
echo $dbnivel->error();


if (!$dbnivel->close()){die($dbnivel->error());};	

	
}



function DBUpInsL($queryp){
global $v;$resultados=array();

$dbnivel=new DB($v['conf']['host'],$v['conf']['usr'],$v['conf']['pass'],$v['conf']['db']);
if (!$dbnivel->open()){die($dbnivel->error());};


$dbnivel->query($queryp);

$queryp="SELECT LAST_INSERT_ID() as id;";
$dbnivel->query($queryp);
while ($row = $dbnivel->fetchassoc()){$id=$row['id'];};

if($v['debug']==-1){echo $queryp . "    <br>\n";}
echo $dbnivel->error();


if (!$dbnivel->close()){die($dbnivel->error());};	

return $id;	
}



if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 

require '/www/repositorios/facebook-php-sdk/src/facebook.php';



global $v;
$v['debug']=1;
$app_id = "1474885509399511";
$app_secret = "ec13b46a0d84e09053de337f14044567";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));

$v['conf']['host']="localhost";
$v['conf']['db']="SeekforFB";
$v['conf']['usr']="sfWEBuser";
$v['conf']['pass']="hdf7383hgd84hf74hgf";

require '/www/repositorios/FrameW_1/core/db/db.php';





$accessToken = $facebook->getAccessToken();

echo $accessToken;


?>