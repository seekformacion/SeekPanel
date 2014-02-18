<?php
$url=$_GET['url'];
if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 
?>

<div style="position:relative; top:0px; left:0px">
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/activapanel.gif" border="0">	
	
<div style="position:absolute; top:250px; left:230px; cursor:pointer;" onclick='timer();window.open("<?php echo $url;?>","","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=420, height=335, top=185, left=180")'>
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/botAct.png" border="0">		
</div>	


<div style="position:absolute; top:250px; left:230px; visibility: hidden;" id="timer" >
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/timer.gif" border="0">		
</div>	




</div>




