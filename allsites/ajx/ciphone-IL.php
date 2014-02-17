<?php




?>

<script>

function getId(){
	
var url='<?php echo $http_met;?>://seekformacion.com/ajx/fblog.php?aT=<?php echo $accessToken;?>';
$.getJSON(url, function(data) {
$.each(data, function(key, val) {

if(key=='id'){alert(val);};			

if(key=='log'){alert(val);};
	
});
});		
	
	
}

	
	
getId();	
</script>

<script type="text/javascript" src="<?php echo $http_met;?>://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
