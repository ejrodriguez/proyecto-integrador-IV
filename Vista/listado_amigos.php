<!doctype html>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />
<script>
	function Eliminar(us,am){
    	usr=us;
		amg=am;
    	$.ajax({url:"eliminar_amistad.php",cache:false,type:"POST",data:{user:usr,amig:amg},
	});
		alert("La amistad ha terminado.. :(");
		location.href='../Vista/listado_amigos.php';	
	};  
</script>
<?php
require '../Conexion/Conexion.php';

$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start();
mysql_query("SET NAMES 'utf8'");
	//Informaci�n del Usuario
    $query="SELECT fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE email='".$_SESSION['email']."'";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
	//Informaci�n del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
	
	$qa="SELECT emailamigo, email FROM amigos WHERE email='".$_SESSION['email']."' OR emailamigo='".$_SESSION['email']."'";
	$qsql = mysql_query($qa);
	
	
	
	
?>
<style>
.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
{
padding:2px;
padding-left:6px; 
font-size:18px;
height:63px;
text-decoration:none;
color:#3b5999; 
}

.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
{
background: #7f93bc;
color: #FFF;
}
</style>
<html>
<head>

 

	<title>Red Social</title>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
    
</head>

<body>
<div class="container">
  <header>
  <b><font  color="#FFFFFF" style="float:right; margin-left:32%; margin-top:2%; position:absolute"> Social-System:</font></b><?php include("../Vista/busqueda_amistades.php"); ?> 
    <a href="#"><img src="../imagenes/FIE.JPG" alt="Insertar logotipo aqu�" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
    
  </header>
  <div class="sidebar1">
    	<ul class="nav">
    		
             <li><a href="../Vista/perfil_usuario.php">
                 <table id="salir">
                 	<tr>
                        <td>Perfil</td>
                        <td><img src="<?php print $user['fotos']; ?>" alt="Insertar logotipo aqui" width="30px" height="30px" id="Insert_logo" display:block; /></td>
                  	</tr>
                 </table> </a></li>   
             <li><a href="#">Inicio</a></li>   
             <li><a href="../Vista/listado_amigos.php">Amigos</a></li>
             <li><a href="../Vista/solicitudes_pendientes.php">Solicitudes Pendientes</a></li>
             <li><a href="../Vista/listado_mensajes.php">Mensajes</a></li>
             <!--<li><a href="#">Grupos</a></li>-->
             <li><a href="CerrarSesion.php">Cerrar Social-System</a></li>
    	</ul>  
  	<!-- end .sidebar1 --></div>
  
  <article class="content">
    <section>
     <table width="100%" bgcolor="#FFFFFF">
     		<tr>
     		<td><a href="<?php print $user['fotos']; ?>" rel="floatbox"><img src="<?php print $user['fotos']; ?>" alt="Insertar logotipo aqui" width="150" height="190" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
      			<a href="../Modelo/SFotoPerf.html" rel="floatbox">Cambiar Foto</a></td>
      		<td><table align="center">
          		<tr>
          		<td><h1>Perfil de Usuario</h1></td>
      	  		<td><a href="listado_amigos.php"><button type="submit" class="buttons"  id="registrar" name="submit" ><img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>Actualizar</button></a></td>
          		</tr>
      			<tr>
                <td colspan="2"><p><FONT SIZE=5><?php print ($user['nombre']." ".$user['apellido']); ?></FONT></p></td>
                </tr>
      			</table>
          	</td>
      		</tr>
      	</table>
      
    </section>
    <section>
    
     
      <div id="informacion">
      </br>
    <h4>Informaci&oacute;n</h4>
    	<p>Estudios: <?php print ($perfil['estudios']); ?></p>
      <HR width=90% align="center">
      <p>Profesi&oacute;n: <?php print ($perfil['ocupacion']); ?></p>
      <HR width=90% align="center">
      <p>Ciudad: <?php print ($perfil['ciudad']); ?></p>
      <HR width=90% align="center">
      <p>Direcci&oacute;n: <?php print ($perfil['direccion']); ?> </p>
      <HR width=90% align="center">
      <p>Situaci&oacute;n sentimental: <?php print ($perfil['edocivil']); ?></p>
      <HR width=90% align="center">
      <p>Fecha de nacimiento: <?php print ($user['fechanac']); ?></p>
      <HR width=90% align="center">
      <p>Sexo: <?php print ($user['sexo']); ?></p>
      <HR width=90% align="center">
      <input  type="button" onClick="location.href='../Vista/modificar_informacion.php'" name="modificar" value="Modificar Informaci�n" />
      </br>
      </div>
      <div id="publicaciones">
      </br>
      <center><h4><font color="#FFFFFF">Amigos</font></h4></center>
      <div class="amigos">
      <table width="90%" style="margin-left:5%; background-color:#0CF;" border="1px">
       <?php while ($fila = mysql_fetch_array($qsql)) {
		   //Informaci�n del Usuario
		   if ($_SESSION['email']==$fila[1]){
			   $mail=$fila[0];}
			   else{
				   $mail=$fila[1];}
    $query1="SELECT email, fechanac,nombre,sexo,fotos,apellido,iduser FROM usuario WHERE email='".$mail."'";
    $result1 = mysql_query($query1);
    $user1=  mysql_fetch_array($result1);
	
	//Informaci�n del perfil
	$query_perfil1="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$mail."'";
    $resultado1 = mysql_query($query_perfil1);
    $perfil1=  mysql_fetch_array($resultado1);
		   
		   ?>
            <tr>
            <td> <img src="<?php echo $user1['fotos'];?>" width="50" height="50" /></td>
            <td class="sobre1"> <a href="../Vista/perfil_amigo.php?amigo=<?php echo $user1['iduser']; ?>" style="text-decoration:none; color:#000;"><?php print($user1['nombre']." ".$user1['apellido']);?></br><?php printf($perfil1['ciudad']." - ".$perfil1['ocupacion']);?></td></a>
      <td align="center">
      <input type="button" onClick="Eliminar('<?php printf($_SESSION['email']); ?>','<?php printf($user1['email']); ?>');" name="aceptar" value="Eliminar Amigo" />
      </td>
      </tr>
      <?php }?>
      </table>
      </div>
      </div>
      
    </section>
    
  <!-- end .content --></article>
  <aside>
    	<h4><font color="#FFFFFF">Mis Fotos</font></h4>
    	<div>
        	<a href="mi_album.php"><center><img src="../imagenes/album.png"/></center></a>
    	</div>
     	<?php include("../Vista/amigos_chat.php"); ?>
  </aside>
  <footer>
    <p>
    
    
    </p>
    <address>
      Contenido de direcci&oacute;n
    </address>
  </footer>
 </div>
</body>
</html>
