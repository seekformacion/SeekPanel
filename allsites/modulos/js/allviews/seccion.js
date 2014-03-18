var slug = function(str) {
str = str.replace(/^\s+|\s+$/g, '');
str = str.toLowerCase();
var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
var to   = "aaaaaeeeeeiiiiooooouuuunc------";
for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }
str = str.replace(/[^a-z0-9 -]/g, '') 
    .replace(/\s+/g, '-') 
    .replace(/-+/g, '-'); 

  return str;
};


function deblock(id){
if(document.getElementById('sub'+id).className!='sbsecc azul'){
document.getElementById('sub'+id).className='sbsecc azul';
var N=window.top.altos[id];
spandS(id,N);	
}

}



function chkCOMBtip(id){window.top.idtip=id;
if(id==1){loadCAT(1);}
if(id==2){loadCAT(1183);}
if(id==3){loadCAT(2365);}
if(id==4){loadCAT(3547);}
document.getElementById('tipo').innerHTML='<option value="0">Seleccione</option>' + window.top.combos[id];chk_TIP();}

function doURL(){
	if(document.getElementById('nom').value){
		
		var url=slug($('#nom').val()) + ".html";
		
		
		var skpUID=getCookie('skpUID');
		var idc=getCookie('selC');
		if(skpUID){	
		var url2='/ajx/chkNomCur.php?skpUID=' + skpUID + '&idc=' + idc + '&nom=' + document.getElementById('nom').value + '&url=' + url;	
		$.getJSON(url2, function(data) {$.each(data, function(key, val) {if(key=="ok"){
			document.getElementById('url').value=url;
			}else{
			alert('Ya tiene dado de alta un curso con ese nombre o URL.\nIndique otro nombre de curso.');	
			}
			
			});});
		}else{
		logout();}	
		
		
}}



function chkMET(v){window.top.idmet=v;
if(v<=3){document.getElementById('blockSED').style.display='none';}else{document.getElementById('blockSED').style.display='block';}
	
deblock(3);	
}


function chk_TIP(h){
doURL();	
if(document.getElementById('nom').value){window.top.nom=document.getElementById('nom').value;}else{var no=1;}	
if(document.getElementById('url').value){window.top.url=document.getElementById('url').value;}else{var no=1;}	
if(document.getElementById('tipo').value!=0){window.top.tipo=document.getElementById('tipo').value;}else{var no=1;}	
	
if(!no){deblock(2);}
}


function chk_DET(h){
	
if(document.getElementById('det_esmin').value!=''){window.top.det_esmin=document.getElementById('det_esmin').value;}else{var no=1;}	
if(document.getElementById('det_tit').value!=''){window.top.det_tit=document.getElementById('det_tit').value;}else{var no=1;}	

	
if(!no){deblock(5);}
}


function chk_DESC(){
if(document.getElementById('kyw').value){window.top.kyw=document.getElementById('kyw').value;}else{var no=1;}	
if(document.getElementById('desc').value!=''){window.top.det_desc=document.getElementById('desc').value;}else{var no=1;}	

console.log(document.getElementById('kyw').value)
console.log(document.getElementById('desc').value)
	
if(!no){deblock(6);}	
	
}

function loadSEDES(){
var skpUID=getCookie('skpUID');
var idc=getCookie('selC');
if(skpUID){	
	var url='/ajx/loadSEDES.php?skpUID=' + skpUID + '&idc=' + idc;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {if(key=="sedes"){document.getElementById('sedesL').innerHTML=val;}});});
}else{
	logout();}	
}


function initLIST(){window.top.opCAT=new Array;
var skpUID=getCookie('skpUID');
var idc=getCookie('selC');
if(skpUID){	
	var url='/ajx/getTipsCats.php?skpUID=' + skpUID + '&idc=' + idc;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {
		
		if(key=="a1"){window.top.opCAT[1]=val;}
		if(key=="a2"){window.top.opCAT[2]=val;}
		if(key=="a3"){window.top.opCAT[3]=val;}
		if(key=="a4"){window.top.opCAT[4]=val;}
		if(key=="tt"){document.getElementById('ctip').innerHTML=val;}
		if(key=="ft"){initLISTtip(val);}
		
		});});



}else{
	logout();}		
}

function initLISTtip(t){
$.ajaxSetup({ cache: false });	
window.top.idtipi=t;
document.getElementById('cats').innerHTML=window.top.opCAT[t];
loadCurs(0)	
}

function loadCurs(c){//console.log(window.top.idtipi);
var skpUID=getCookie('skpUID');
var idc=getCookie('selC');
if(skpUID){	
document.getElementById('listcur').src='/ajx/listaCur.php?skpUID=' + skpUID + '&idcat=' + c + '&idc=' + idc + '&idp=' + window.top.idtipi;	
}else{
	logout();}	

}




function loadCAT(id){$.ajaxSetup({ cache: false });
window.top.CATSEL=0;
var skpUID=getCookie('skpUID');
var idc=getCookie('selC');
if(skpUID){	
	var url='/ajx/getCAT.php?skpUID=' + skpUID + '&idcat=' + id;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {if(key=="cats"){document.getElementById('subCats').innerHTML=val;}});});
}else{
	logout();}	
}


function selCAT(idc){
window.top.CATSEL=idc;
deblock(4);	
}

function chgCent(idc){
setCookie('selC',idc,1);
var mlat="0|0";
setCookie('mlat',mlat,0);	
lK('/panel');	
}

function loadC(){$.ajaxSetup({ cache: false });
var skpUID=getCookie('skpUID');
if(skpUID){	
	var url='/ajx/loadC.php?skpUID=' + skpUID;	
	$.getJSON(url, function(data) {$.each(data, function(key, val) {if(key=="opc"){document.getElementById('selCentros').innerHTML=val;}});});
}else{
	logout();}	

}




function getEditcur(){
var url=document.URL; var urls=url.split('#'); window.top.idcurEdit=urls[1];
editcur();	
}









function creaCur(){
	
//////// nom y tip	
var nom=document.getElementById('nom').value; 				
var url=document.getElementById('url').value; 				
var idp=window.top.idtip; 									
var id_tipo=document.getElementById('tipo').value; 			
var cd1=document.getElementById('cd1').value; 				
var cd2=document.getElementById('cd2').value; 				
var cd3=document.getElementById('cd3').value; 				
var cd4=document.getElementById('cd4').value; 				
//////// metodo y sedes		
var id_met=window.top.idmet;								
var sedes="";
if(id_met<=3){for (var a=1; a<=70 ; a++){
if(document.getElementById('sede_'+a)){
if(document.getElementById('sede_'+a).checked){
sedes=sedes
+document.getElementById('sede_'+a).value+',';}}	
}sedes=sedes.trim();console.log(sedes);}
//////// categoria
var id_cat=window.top.CATSEL;								
//////// detalles
var eur=document.getElementById('eur').value; 				
if(document.getElementById('show').checked){
var show=1;	
}else{
show=0;	
}															
var ayu=document.getElementById('ayu').value; 				
var dur=document.getElementById('dur').value; 				
var id_titul=document.getElementById('det_tit').value; 		
var txt_titul=document.getElementById('txt_tit').value; 	
var id_esmin=document.getElementById('det_esmin').value; 	
var emin=document.getElementById('emin').value; 			
var emax=document.getElementById('emax').value; 			
var pract=document.getElementById('pract').value; 			
var odat=document.getElementById('odat').value; 			
//////// descripcion y temario
var kyw=document.getElementById('kyw').value; 				
var desc=document.getElementById('desc').value; 			
var diri=document.getElementById('diri').value; 			
var prepa=document.getElementById('prepa').value; 			
var editor=CKEDITOR.instances.editor1;
var temario=editor.getData();								

//// obligatorios
var error="";
if(!nom.trim()){error=error + 'Debe especificar un nombre para el curso \n';}
if(!url.trim()){error=error + 'Debe especificar una URL para el curso \n';}
if(id_tipo==0){error=error + 'Debe especificar el tipo de formación \n';}

if(!id_met){error=error + 'Debe especificar el método de enseñanza \n';}else{
if((id_met<=3)&&(sedes.length==0)){error=error + 'Debe seleccionar alguna sede donde se imparte \n';}	
}

if(!id_cat){error=error + 'Debe especificar la categoría \n';}
if(id_titul==''){error=error + 'Debe especificar la titulación obtenida \n';}
if(id_esmin==''){error=error + 'Debe especificar el nivel de estudios requerido \n';}

if(!kyw.trim()){error=error + 'Debe especificar las keywords \n';}
if(!desc.trim()){error=error + 'Debe incluir una descripción \n';}
if(!temario.trim()){error=error + 'Debe incluir un temario \n';}

if(error){
alert(error);	
}else{


var skpUID=getCookie('skpUID');
var idc=getCookie('selC');
if((skpUID)&&(idc)){	
	

$.post('/ajx/adCur.php', 
  {
skpUID:skpUID,
idc:idc,
nom:nom,
url:url,
idp:idp,
id_tipo:id_tipo,
cd1:cd1,
cd2:cd2,
cd3:cd3,
cd4:cd4,
id_met:id_met,
sedes:sedes,
id_cat:id_cat,
eur:eur,
show:show,
ayu:ayu,
dur:dur,
id_titul:id_titul,
txt_titul:txt_titul,
id_esmin:id_esmin,
emin:emin,
emax:emax,
pract:pract,
odat:odat,
kyw:kyw,
desc:desc,
diri:diri,
prepa:prepa,
temario:temario
  },
  
   function(response) {
    // log the response to the console
    //console.log("Response: "+response);
    alert('Curso creado correctamente');
    window.location="/panel/ad_curso";
});

	

}else{
	logout();}	

	
}}




