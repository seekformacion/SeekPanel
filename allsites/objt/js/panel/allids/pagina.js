

function spandM(id){
var he=window.top.he[id]
	
var h = $("#sm" + id).height();
if(h==30){h=he; window.top.opM[id]=1;}else{h='30px'; window.top.opM[id]=0;}
$("#sm" + id).animate({ height: h }, 100, function() { // Animation complete.
														  });		
}



function opSel(ido){

for (a=1 ; a <= 20; a++){if(document.getElementById('o'+a)){
document.getElementById('o'+ a).style.backgroundColor='#ffffff';	
}}	
document.getElementById(ido).style.backgroundColor='#cccccc';	

oMenu(ido);	
}


function deblock(id){
if(document.getElementById('sub'+id).className!='sbsecc azul'){
document.getElementById('sub'+id).className='sbsecc azul';
var N=window.top.altos[id];
spandS(id,N);	
}

}

function spandS(id,N){
if(document.getElementById('sub'+id).className=='sbsecc azul'){	
	
var h = $("#sub" + id).height();	
if(h==20){
	h=N+'px'
	
	}else{
	h='20px';
	
	if(document.getElementById('help'+id)){
	if(document.getElementById('help'+id).style.display=='block'){
			$("#help" + id).animate({ height: '0px' }, 100, function() {
			document.getElementById('help'+id).style.display = 'none';
			document.getElementById('bh'+id).style.display = 'none';  });	
	}}
	
	
	}

$("#sub" + id).animate({ height: h }, 100, function() { });	

}
}



function spandH(id,N,Nh){
if(document.getElementById('sub'+id).className=='sbsecc azul'){	

var N2=N+Nh; 
if(document.getElementById('help'+id).style.display=='none'){

$("#sub" + id).animate({ height: N2 }, 100, function() { 
document.getElementById('help'+id).style.display = 'block';
document.getElementById('bh'+id).style.display = 'block';
$("#help" + id).animate({ height: Nh }, 100, function() { // Animation complete.
														  });
													  });
}else{
$("#help" + id).animate({ height: '0px' }, 100, function() {
document.getElementById('help'+id).style.display = 'none';
document.getElementById('bh'+id).style.display = 'none';
$("#sub" + id).animate({ height: N }, 100, function() {});
												  });	
	
} 
	
	
}}









$( document ).ready( function() {
$( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
//$( '#editable' ).ckeditor(); // Use CKEDITOR.inline().
} );

function setValue() {
$( '#editor1' ).val( $( 'input#val' ).val() );
}

function GetContents() {
var editor = CKEDITOR.instances.editor1;
console.log( editor.getData() );
}
