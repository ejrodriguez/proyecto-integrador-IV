<?php
session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
$idamig=$_SESSION['idamigo'];


$cos="SELECT email FROM usuario WHERE iduser=$idamig";
$resultz = mysql_query($cos) or die('no pasa');
$val=mysql_fetch_array($resultz);
$email=$val['email'];






//echo $email;
$albumn=$_POST['nomb'];
$idal=$_POST['ida'];
//$_SESSION['idal']=$_POST['ida'];
//$_SESSION['nombal']=$_POST['nomb'];

//$ver="SELECT idmf,nombrealbum,fecha FROM misfotos WHERE email='$email'";
//$result = mysql_query($ver);
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
<link rel="stylesheet" href="../js/floatbox/floatbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/floatbox/framebox.js"></script>
<style>
 .aside1 {
	float: right;
	width: 300px;
	margin: 5px 0 12px 0;
	background-color: #BBFFBB;
	padding: 10px 0;
        border-radius: 8px;
}
#des
{
    color:#039;
    font-size: 12px;
}
#tr1{
    width: 15px;
    border-style: solid;
    border-color: #0A99E7;
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
    height: 500px;
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
    <br>
    <h4>Album Seleccionado '<?php echo $albumn?>'</h4>
      <center>
<!--          <a href="../Modelo/formulario.html" rel="floatbox"><button type="submit" class="buttons"  id="listar" name="ingreso"></
            input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" 
            <img src="../imagenes/album.png" height="20px" width="20px" alt=""/>Subir Fotos
              </button></a>-->
          
<!--          <a href="../Vista/FormEliminarFotos.php" rel="floatbox"><button type="submit" class="buttons"  id="borrar" name="bo"></
            input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" 
            <img src="../imagenes/eliminar.png" height="20px" width="20px" alt=""/>Eliminar Fotos
              </button></a>-->
           </center>
          <br><br>
                 <?php
                    mysql_query("SET NAMES 'utf8'");
                    $ver="SELECT foto,descripcion FROM fotos WHERE email='$email' AND idmf=$idal";
                    $result = mysql_query($ver);
//                    echo "<a ";
                    echo "<table>";
//                    echo "<tr>";
                    while ($row = mysql_fetch_array($result))
                    {
                        
                        echo "<tr id='tr1'>";
                        echo "<td>";
                          echo "<a  href='../Archivos/$email/Fotos/$albumn/".$row['foto']."' rel='floatbox.group'><img src='../Archivos/$email/Fotos/$albumn/".$row['foto']."' width='150px' height='150px'/><label id='des'>".$row['descripcion']."</label><td></tr></a>  ";
                        
//                        echo "<a rel='floatbox' href='../Archivos/$email/Fotos/$albumn/".$row['foto']."'><img src='../Archivos/$email/Fotos/$albumn/".$row['foto']."' width='150px' height='150px'/></a>&nbsp;";
                    }
//                    echo "</tr>";
                    echo "</table>";
//                    echo "</a>";
                ?>
          
          <!--<a href="URL_imagen1" rel="floatbox.group">1</a> | <a href="URL_imagen2" rel="floatbox.group">2</a> | <a href="URL_imagen3" rel="floatbox.group">3</a>-->
          

     
<br>
<!--<img src='../Archivos/alex22_w@gmail.com/Fotos/Recuerdos/HammerNao.png' width='150px' height='150px'/>-->
    <!--<a rel="floatbox" href="../Archivos/alex22_w@gmail.com/Fotos/asd/pao.jpg"><img src="../Archivos/alex22_w@gmail.com/Fotos/asd/pao.jpg" height="150px" width="150px" /></a>-->
</body>
</html>