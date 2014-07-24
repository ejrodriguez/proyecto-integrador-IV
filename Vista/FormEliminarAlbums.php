<?php
session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
$email=$_SESSION['email'];
//$idalb=$_SESSION['idal'];
//$nomalb=$_SESSION['nombal'];

mysql_query("SET NAMES 'utf8'");
$ver="SELECT idmf,nombrealbum,fecha FROM misfotos WHERE email='$email'";
$result = mysql_query($ver);
//$band= mysql_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Red Social</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="../css/estilotab.css" type="text/css" media="screen" />-->
<!--<link rel="stylesheet" href="../js/floatbox/floatbox.css" type="text/css" media="screen" />-->
<script type="text/javascript" src="../js/jquery.js"></script>
<!--<script type="text/javascript" src="../js/floatbox/framebox.js"></script>-->
<style>
 .aside1 {
	float: right;
	width: 300px;
	margin: 5px 0 12px 0;
	background-color: #BBFFBB;
	padding: 10px 0;
        border-radius: 8px;
}
#lista
{
    left: 20%;
    border-radius: 12px;
/*    border-color: #188bc2;
    border-style: solid;*/
    /*overflow: auto;*/
    color: white;
    height: 200px;
    /*background-color: #92c9e3;*/
}
#info
{
    background-color: #BBFFBB;
    width: 300px;
}
#fotos
{
    /*background-color: #188bc2;*/
    width: 100%;
    float: right;
    height: 200px;
    overflow: auto;
}

.lab
{
    color: white;
}
#regis
{
    height: 110px;
/*    left: 13%;*/
        
}
#datos
{
   background-color: rgba(0,64,128,0.6);
   border-radius: 15px;
   left: 3px;
   width: 80%;
/*    left: 13%;*/
        
}
.sidebar11
{
    background-color: white;
    width: 100px;
    float: left;
}
#bo{
    font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #FFF;
	margin: 0;
	padding: 0;
	color: #000;
}
</style>

</head>

<body id="bo">
    <div id="res"></div>
    <br><br>
        <center>
<table summary="Submitted table designs">
        <caption>
        Mis Albumes
        </caption>
        <thead>
          <tr>
<!--            <th scope="col">Indicador</th>-->
            <th scope="col">Album</th>
            <!--<th scope="col">Fecha</th>-->
            <th scope="col">Fecha</th>
            <!--<th scope="col">Descripcion</th>-->
            <th scope="col">Eliminar</th>
            <!--<th scope="col">ID</th>-->
            
            
          </tr>
        </thead>
        <tfoot>
<!--          <tr>
            <th scope="row">Total</th>
            <td colspan="4"> Social System</td>
          </tr>-->
        </tfoot>
         <tbody>
          <tr>
              <?php
               
                   $num=1;
                while($row = mysql_fetch_array($result)) {?>
                     
              <td style="border:1px solid #084257" id='nombre<?php echo $num; ?>'><?php echo $row['nombrealbum'] ;?></td>
                     <td style="border:1px solid #084257" id='fec<?php echo $num; ?>'><?php echo $row['fecha'];?></td>
                     
                 <td style="color: white;font-size: 0px" id='idal<?php echo $num; ?>'><?php echo $row['idmf'];?></td>
                <td style="border:1px solid #084257"> <a href=""  ><button type="submit" class='buttons'  type='submit'  name='submit' onclick="mandaral('idal<?php echo $num;?>','nombre<?php echo $num;?>')" id='borra'><img src="../imagenes/eliminar.png" width="20px" height="20px" alt=""/> </button> </a></td>
                
          </tr>
                    <?php $num=$num+1;
  //require 'pChart2.1.4/examples/DatosFechas.php';
                 }
                 
              ?>
        
        </tbody>
</table>
        </center>
    <div id="foto"></div>
    
     <script type="text/javascript">
       var nom;
       var id;
      function mandaral(i,j)
      {  
          nom=document.getElementById(j).innerHTML;
          id=document.getElementById(i).innerHTML;

      };
      $('[id^="borra"]').click(function(){
          alert(id+nom);
          $.post('../Modelo/MEliminarAlbum.php', {nomf:nom,idf:id})
          
//        $('#foto').load('../Modelo/MEliminarFoto.php',{nomf:nom,idf:id})
            });
      </script>
    
    
<!--    <script type="text/javascript">
       var nomb;
       //var fina;
      function ver(i)
      {  
          
          nomb=document.getElementById(i).innerHTML;
          //fina=document.getElementById(f).innerHTML;
      };
      $('[id^="ir"]').click(function(){
          alert(nomb);

        $.post('../Modelo/Mnombrealbum.php', {noal:'alex'});
            location.href = "../Modelo/Mnombrealbum.php";
            
            });
  </script>-->
</body>
</html>
