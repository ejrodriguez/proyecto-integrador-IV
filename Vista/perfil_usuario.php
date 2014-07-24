<!doctype html>
<?php
require '../Conexion/Conexion.php';

$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start();
	//Información del Usuario

    mysql_query("SET NAMES 'utf8'");
    $query="SELECT fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE email='".$_SESSION['email']."'";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
	//Información del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
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


#pubs
{
/*    padding-left: 5px;
    padding-right: 5px;*/
    padding-top: 12px;
    
    background-color: #188bc2;
    width: 100%;
    height: 600px;
    overflow: auto;
    color: #CFD7E2;
    
}


</style>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Red Social</title>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />

        
        <script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />
</head>

<body>
<div class="container">
  <header>
  <b><font  color="#FFFFFF" style="float:right; margin-left:32%; margin-top:2%; position:absolute"> Social-System:</font></b><?php include("../Vista/busqueda_amistades.php"); ?> 
    <a href="#"><img src="../imagenes/FIE.JPG" alt="Insertar logotipo aqu�" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
    <!--<a href="CerrarSesion.php" >Cerrar Sesion</a>-->
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
      <table width="100%" bgcolor="#FFFFFF">
     		<tr>
     		<td><a href="<?php print $user['fotos']; ?>" rel="floatbox"><img src="<?php print $user['fotos']; ?>" alt="Insertar logotipo aqui" width="150" height="190" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
      			<a href="../Modelo/SFotoPerf.html" rel="floatbox">Cambiar Foto</a></td>
      		<td><table align="center">
          		<tr>
          		<td><h1>Perfil de Usuario</h1></td>
      	  		<td><a href="perfil_usuario.php"><button type="submit" class="buttons"  id="registrar" name="submit" ><img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>Actualizar</button></a></td>
          		</tr>
      			<tr>
                <td colspan="2"><p><FONT SIZE=5><?php print ($user['nombre']." ".$user['apellido']); ?></FONT></p></td>
                </tr>
      			</table>
          	</td>
      		</tr>
      	</table>
    <section>
   
      
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
      <input  type="button" onClick="location.href='../Vista/modificar_informacion.php'" name="modificar" value="Modificar Informaci&oacute;n" />
      </br>
      </div>
        
      <div id="publicaciones">
      <!--<label>Publicaciones</label>-->
      <label style="font-size: 30px; color: #fff;">Qu&eacute; Piensas?</label>
      <br>
      <center>
          <a href="FPublicaciones.html" rel="floatbox"><button type="submit" class="buttons"  id="lingresar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/comentario.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Yo digo
              </button></a>
      <button type="submit" class="buttons"  id="refres" name="refre">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Actualizar
    </button>
      </center>
      

        <div id="pubs"></div>
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
      Contenido de dirección
    </address>
  </footer>
 </div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
        //$("#descr").val(" ");
        //var sub;
        //$('#btnenviar').attr({ value: 'asdasdasd' }); 
        //sub = $('#btnenviar');  
        //sub.replaceWith(sub.clone(true));  
        var nombre;
        nombre='alex';
        $('#pubs').load("../Modelo/MPublicaciones.php",{a:nombre});
        //$('#pubs').load(("../Modelo/MPublicaciones.php"))
	});
</script>

    <script type="text/javascript">
      $('#refres').click(function()
    {
       var nombre;
        nombre='alex';
        $('#pubs').load("../Modelo/MPublicaciones.php",{a:nombre});


    });

  </script>

</html>
