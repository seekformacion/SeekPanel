<?php



$inf=DBselect("select v_sospechoso, v_vali, v_vp FROM Fb_fans WHERE FID='$user';");     
if(count($inf)>0){  $v_vp=$inf[1]['v_vp']; $v_sospechoso=$inf[1]['v_sospechoso']; $v_vali=$inf[1]['v_vali'];  }  




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.gris1_BG{  background-color: #FFFFFF !important;}  
.page {width: 700px; background-color: #ffffff;
  min-height: 780px;
    margin: 0 auto;
    padding: 0px 18px 0px 18px;
    
    }

.textos {position: relative; float:left; width: 676px;margin-left:20px; font-size: 17px; font-family: Arial; color:#555555 }
.legal {position: relative; float:left; width: 696px; font-size: 9px; font-family: Arial; color:#555555; margin-top:5px; }

.franjaAz {position: relative; float:left; width: 676px; background-color:#617087;  height: 40px;  margin-top: 25px; padding:10px; margin-bottom: 25px;}
.ultis { position:relative; float:left;  font-size: 13px; font-family: Arial; color:#ffffff; width: 666px; margin-bottom:10px;}     

.imgUlti {position:relative; float:left; width:46px; height:46px; margin-right: 6px; }

.bases {position:relative; float:left; top:50px;  border: 1px solid #888888; }  

.leyen {position:relative; float:left; font-size: 9px; top:23px; font-family: Arial; color:#444444; height:30px; width:80px; text-align: center;}

.ptos {position:relative; float:left; font-size: 14px; font-family: Arial; color:#333333;
    background-color:#FFFFFF;
     height:25px; width:50px; text-align: center; padding-top:10px;}

.bMegu {   border: 1px solid #444444;
    float: left;
    height: 86px;
    margin-top: 20px;
    padding: 10px;
    position: relative;
    width: 236px;
    margin-right: 20px;}
    
.cien {position: absolute; left: 15px; top:6px; z-index:999; background-color:#FFFFFF  }
.opciones {position:relative; }

.lks {  color: #666666;
    float: left;
    font-family: arial;
    font-size: 14px;
    list-style: outside none none;
    padding: 20px;
    position: relative;
    width: 650px;}

.lks li{  border: 1px solid #888888;
    font-family: Arial;
    font-size: 12px;
    height: 25px;
    margin-bottom: 15px;
    padding: 5px;
    width: 265px; text-transform: uppercase;position:relative; float:left;}
    
.likeU {position:relative; float:left; margin-left:5px; margin-top:5px;}    
    
.lks a{color:#617087; text-decoration: none;}


.contest {position: relative; float:left; width: 500px; margin-top:0px; padding:10px; margin-bottom: 25px; margin-left:80px;
    color: #666666;

    font-family: arial;
    font-size: 14px;}

    .users {position:relative; float:left; width:490px; margin-top:10px;}
    .users img{ width:25px; position:relative; float:left;  margin-right: 10px;}
    .users div{ position:relative; float:left; margin-right: 20px; padding-top:5px;}

h2 {position: relative; float:left; width: 100%;  margin-top: 25px; padding:10px; margin-bottom: 5px; padding:0px;
    color: #666666;
    text-align:center;
    font-family: arial;
    font-size: 20px;}


h3 {position: relative; float:left; width: 100%;  margin-top: 5px; padding:10px; margin-bottom: 5px; padding:0px;
    color: #666666;
    text-align:center;
    font-family: arial;
    font-size: 9px;}



</style>


<script type="text/javascript" src="<?php echo $http_met;?>://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>








<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  var campamia=getCookie('seekforFB_REFDE');
  ga('create', 'UA-36119979-5', 'seekformacion.com');
  ga('send', 'pageview');
  ga('send', 'event', 'pagina', 'load', 'Participa', 2);
 
</script>

<meta name="viewport" content="width=736px" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>Concurso Apple</title>
</head>

<body class="gris1_BG">

    
    
<div class="page">
<img style="position: relative; float: left;" src="/img/global/contest/cabeContest.gif">



<div class="franjaAz" style="text-align: center; font-family: Arial; font-size: 20px; font-weight: bold; color:#ffffff;">

¡Ya tenemos ganadores!
</div>

    <div class="contest">
        <div class="users">
            <div style="float:right; top:30px; margin-right:10px;">(Puntos)</div>
        </div>

        <h2> Ganadores </h2>

        <div class="users">

            <img src="/img/global/contest/users/52DF78DF55B0F93A66D5018A1B747AA5.jpg">
            <div>Alicia E. T. (Valladolid)</div>
            <div style="float:right;">9115</div>

        </div>

        <div class="users">

            <img src="/img/global/contest/users/4F21C8743206926B1992A9D962F8C27A.jpg">
            <div>Jorge R. (Madrid)</div>
            <div style="float:right;">8560</div>

        </div>




        <h2> Personas reserva </h2>
        <h3> (En el caso de no poder contactar con alguno de los ganadores o no cumplir estos con las normas del concurso) </h3>
        <div class="users">

            <img src="/img/global/contest/users/7FD7616ADDCA1EFB074303EB00DC1311.jpg">
            <div>Sonia A. (Baleares)</div>
            <div style="float:right;">6890</div>

        </div>

        <div class="users">

            <img src="/img/global/contest/users/7E5DE0195D346449865EB83CE3658F03.jpg">
            <div>Esther G. E. (Alicante)</div>
            <div style="float:right;">6050</div>

        </div>

        <div class="users">

            <img src="/img/global/contest/users/B1901AAB28E864705930EFD62337ED78.jpg">
            <div>Mª del Valle F. X. (Sevilla)</div>
            <div style="float:right;">5520</div>

        </div>

        <h2> Ganador del sorteo </h2>

        <div class="users">

            <img src="/img/global/contest/users/668B968EE7C191492D50900075863805.jpg">
            <div>Daniel P. A. (Valencia)</div>
            <div style="float:right;">960</div>

        </div>


    </div>



</div>
</body>
</html>
    