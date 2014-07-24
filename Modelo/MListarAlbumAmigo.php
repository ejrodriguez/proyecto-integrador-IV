<?php
session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
$idamig=$_SESSION['idamigo'];


mysql_query("SET NAMES 'utf8'");

$cos="SELECT email FROM usuario WHERE iduser=$idamig";
$resultz = mysql_query($cos) or die('no pasa');
$val=mysql_fetch_array($resultz);
$cc=$val['email'];




$ver="SELECT idmf,nombrealbum,fecha FROM misfotos WHERE email='$cc'";
$result = mysql_query($ver) or die('no pasa');
//$band= mysql_fetch_array($result);
?>
<html>
<head>
<meta charset="utf-8">
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
    overflow: auto;
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
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>
    <div id="lista">
<table summary="Submitted table designs">
        <caption>
        Albumes
        </caption>
        <thead>
          <tr>
<!--            <th scope="col">Indicador</th>-->
            <th scope="col">Nombre</th>
            <!--<th scope="col">Fecha</th>-->
            <th scope="col">Ver</th>
            <!--<th scope="col">Eliminar</th>-->
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
                     
              <td style="color: #000;font-size: 18px" id='nombre<?php echo $num; ?>'><?php echo $row['nombrealbum'];?></td>
                     <!--<td id='ffin<?php echo $num; ?>'><?php echo $row['fecha'];?></td>-->
                     <td> <button  type="submit" class='buttons'    name='submit' onclick="ver('nombre<?php echo $num;?>','cod<?php echo $num;?>')" id='ir'><img src="../imagenes/visualizar.png" width="20px" height="20px" alt=""/> </button> </td>
					 <!--input class='buttons'  type='submit'  name='submit' onclick="render('fini<?php echo $num;?>','ffin<?php echo $num;?>')" id='brender' value='Render'/></a></center></td-->
<!--<td> <a href=""  ><button type="submit" class='buttons'  type='submit'  name='submit' onclick="generarpdf('fini<?php echo $num;?>','ffin<?php echo $num;?>')" id='bpdf'><img src="../imagenes/eliminar.png" width="20px" height="20px" alt=""/> </button> </a></td>-->
<td style="color: #fff;font-size: 12px" id='cod<?php echo $num; ?>'><?php echo $row['idmf'];?></td>
		<!--input class='buttons'  type='submit'  name='submit' onclick="generarpdf('fini<?php echo $num;?>','ffin<?php echo $num;?>')" id='bpdf' value='PDF'/></a></center></td--></tr>
                    <?php $num=$num+1;
  //require 'pChart2.1.4/examples/DatosFechas.php';
                 }
                 
              ?>
        
        </tbody>
</table>
    </div>
    <div id="fotos"></div>
    
     <script type="text/javascript">
       var nom;
      function ver(i,j)
      {  
          nom=document.getElementById(i).innerHTML;
          id=document.getElementById(j).innerHTML;

      };
      $('[id^="ir"]').click(function(){
          //alert(id+nom+'1');

        $('#fotos').load('../Vista/sus_fotos.php', {nomb:nom,ida:id})
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
