<?php
$url=$_GET['url'];
if($_SERVER['HTTPS']=='on'){$http_met= "https";}else{$http_met= "http";} 
?>


<style>
.bases {position:absolute; top:390px; left:49px; border: 1px solid #888888; }	
</style>



<div style="position:relative; top:0px; left:0px">
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/activapanel.gif" border="0">	
	
<div style="position:absolute; top:250px; left:230px; cursor:pointer;" onclick='window.open("<?php echo $url;?>","","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=490, height=400, top=185, left=180"),timer();'>
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/botAct.png" border="0">		
</div>	

<div style="position:absolute; top:366px; left:49px; font-family: Arial; font-size: 10px; color:#666666;">
* Al activar el panel de control, estás aceptando las <span style="text-decoration: underline; cursor:pointer;" onclick="javascript:document.getElementById('bases').style.visibility='block';">normas de uso y bases legales</span> del concurso.	
</div>

<div style="display:none" id="bases" class="bases">
<iframe width="711" scrolling="auto" height="250" frameborder="0" style="display: block;" class="poli" src="/ajx/fb/bases.php" id="poli" border="0" marginheight="0">


</iframe>
</div>


<div style="position:absolute; top:250px; left:230px; visibility: hidden;" id="timer" >
<img src="<?php echo $http_met;?>://seekformacion.com/img/global/fb/timer.gif" border="0">		
</div>	




</div>




