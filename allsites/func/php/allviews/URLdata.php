<?php
$idprovi="";
$url=$v['where']['url']; 
$idp=$v['where']['idp'];
$eqtempl=$v['vars']['eqtempl'];
$eqp=$v['vars']['provN'];
							

															



$res=DBselect("SELECT tipo, t_id, codTittle, pagTittleC FROM skP_urls where idp=$idp AND url='$url';");
$v['where']['view']=$eqtempl[$res[1]['tipo']];
$v['where']['id']=	$res[1]['t_id'];


$v['where']['codTittle']=$res[1]['codTittle'];
$v['where']['pagTittle']=$res[1]['pagTittleC'];
$v['where']['urlSimple']=$url;




if($v['debug']>0){
echo $v['where']['url']. " <br>\n";
echo "Tipo:" . $v['where']['view'] . " id: " . $v['where']['id']  . " Pag: " . $v['where']['pag'] . " idts: " . $v['where']['idt'] . " <br>\n";
}

?>