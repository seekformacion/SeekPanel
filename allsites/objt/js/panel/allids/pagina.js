

function spandM(id){
if(id==1){var he='106px';};
if(id==2){var he='86px';};
if(id==3){var he='86px';};
if(id==4){var he='86px';};
if(id==5){var he='86px';};

	
var h = $("#sm" + id).height();
if(h==30){h=he}else{h='30px';}
$("#sm" + id).animate({ height: h }, 200, function() { // Animation complete.
														  });		
}

function opSel(ido){

for (a=1 ; a <= 10; a++){if(document.getElementById('o'+a)){
document.getElementById('o'+ a).style.backgroundColor='#ffffff';	
}}	
document.getElementById(ido).style.backgroundColor='#cccccc';	
	
}


function spandS(id,N){
if(document.getElementById('sub'+id).className=='sbsecc azul'){	
	
var h = $("#sub" + id).height();	
if(h==20){h=N+'px'}else{
h='20px';
if(document.getElementById('help'+id).style.display=='block'){
$("#help" + id).animate({ height: '0px' }, 100, function() {
document.getElementById('help'+id).style.display = 'none';
document.getElementById('bh'+id).style.display = 'none';
														  });	
}}

$("#sub" + id).animate({ height: h }, 200, function() { // Animation complete.
														  });	
}}



function spandH(id,N,Nh){
if(document.getElementById('sub'+id).className=='sbsecc azul'){	

if(document.getElementById('help'+id).style.display=='none'){

$("#sub" + id).animate({ height: N }, 100, function() { 
document.getElementById('help'+id).style.display = 'block';
document.getElementById('bh'+id).style.display = 'block';
$("#help" + id).animate({ height: Nh }, 100, function() { // Animation complete.
														  });
													  });
}else{
$("#help" + id).animate({ height: '0px' }, 100, function() {
document.getElementById('help'+id).style.display = 'none';
document.getElementById('bh'+id).style.display = 'none';
												  });	
	
} 
	
	
}}