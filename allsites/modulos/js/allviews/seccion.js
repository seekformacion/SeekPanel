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


function chkCOMBtip(id){
if(id==1){loadCAT(1);}
if(id==2){loadCAT(1183);}
if(id==3){loadCAT(2365);}
if(id==4){loadCAT(3547);}
document.getElementById('tipo').innerHTML='<option value="0">Seleccione</option>' + window.top.combos[id];chk_TIP();}

function doURL(val){if((!val)&&(document.getElementById('nom').value)){document.getElementById('url').value=slug($('#nom').val()) + ".html";}chk_TIP();}



function chkMET(v){
if(v<=3){document.getElementById('blockSED').style.display='none';}else{document.getElementById('blockSED').style.display='block';}
	
deblock(6);	
}


function chk_TIP(h){
if(document.getElementById('nom').value){window.top.nom=document.getElementById('nom').value;}else{var no=1;}	
if(document.getElementById('url').value){window.top.url=document.getElementById('url').value;}else{var no=1;}	
if(document.getElementById('tipo').value!=0){window.top.tipo=document.getElementById('tipo').value;}else{var no=1;}	
	
if(!no){deblock(2);}
}




