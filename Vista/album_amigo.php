<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />

<?php
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start();

mysql_query("SET NAMES 'utf8'");
$idamig=$_SESSION['idamigo'];
//$_SESSION['email']='sanchez@hotmail.com';
	//Información del Usuario
    $query="SELECT email,fechanac,nombre,sexo,fotos FROM usuario WHERE iduser=$idamig";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
    
    $conn->terminarConexion();
    $conn->conectarBD();
	//Información del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
	//       ver si son amigos
        
        $qamig="SELECT COUNT(*) AS si FROM amigos WHERE (email='".$_SESSION['email']."' AND emailamigo='".$user['email']."') OR (email='".$user['email']."' AND emailamigo='".$_SESSION['email']."')";
	$amigsql = mysql_query($qamig);
        
        $amigos=  mysql_fetch_array($amigsql);
?>
<html>
<head>

	<title>Red Social</title>
        

        
        <style>
            #capa
            {
                float: left;
                padding: 10px;
                height: auto;
                width: 100%;
                overflow: auto;
            }
        </style>
        <script>
            function cargar(div, desde)
            {
                 $(div).load(desde);
            }
        </script>
</head>

<body>
<div class="container">
  <header>
  <b><font  color="#FFFFFF" style="float:right; margin-left:32%; margin-top:2%; position:absolute"> Social-System:</font></b><?php include("../Vista/busqueda_amistades.php"); ?> 
  
    <a href="#"><img src="../imagenes/FIE.JPG" alt="Insertar logotipo aquí" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
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
    <h1>Albumes</h1>
    <section>
        <center>
<!--     <table width="100%" bgcolor="#66FF99">
     <tr>
     <td>-->
      <a href=""><img src="<?php print ($user['fotos']); ?>" alt="Insertar logotipo aquí" width="150" height="190" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
<!--      </td>
      <td>-->
      <p><FONT SIZE=5><?php print ($user['nombre']); ?></FONT></p>
<!--      </td>

      </tr>
      </table>-->
        </center>
    </section>
    <section>
    
     
      <center>
      <div id="albumes">
          
      <!--<h4>Crear Album</h4>-->
      <center>
      <!--<label>Nombre del Album:</label><input type="text" id="nombrealbum" />-->
      
<!--        <a href="" onclick="cargar('#carga', '../Modelo/MListarAlbums.php')">-->
<!--        <button type="submit" class="buttons"  id="enviaralb" name="ingreso">
            input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" 
            <img src="../imagenes/crearal.png" height="20px" width="20px" alt=""/>Crear
        </button>-->
        <button type="submit" class="buttons"  id="listar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/album.png" height="20px" width="20px" alt=""/>Listar Albums
        </button>
<!--<a href="FormEliminarAlbums.php" rel="floatbox"><button type="submit" class="buttons"  id="listar" name="ingreso">
            input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" 
            <img src="../imagenes/album.png" height="20px" width="20px" alt=""/>Eliminar Albumes
             </button></a>-->
        <!--</a>-->
      
      </center>
      </div>
          <div id="crear" >
            
        </div>
          </br>
          
      </center>
        <!--<label>Listar</label>-->
        
        <center>
        <div id="capa">
            
        </div>
        </center>
        
    </section>
    
  <!-- end .content --></article>
  <aside>
       <?php 
       if($amigos['si']==1)
       {
         ?>  
         <h4><font color="#FFFFFF">Mis Fotos</font></h4>
    <div>  
         <a href="album_amigo.php"><center><img src="../imagenes/album.png"/></center></a>
    </div>
    <?php include("../Vista/amigos_chat.php"); ?>  
      
         <?php
       }
       
       else
       {
           echo "Deseas saber mas sobre: ".$user['nombre'];
           echo '<br> "Envia una solicitud de amistad"';
       }
        ?>       
  </aside>
  <footer>
    <p>
    
    
    </p>
    <address>
      Contenido de direcci&Atilde;&sup3;n
    </address>
  </footer>
 </div>
<!-- <script type="text/javascript">
      $('#enviaralb').click(function()
    {
        var nombre=$('#nombrealbum').val();
        if(nombre=='')
            {
                alert('Ingrese un Nombre');
            }
            else
                {
                    $('#crear').load("../Modelo/Malbum.php",{n:nombre});
                }
    });

  </script>-->
  <script type="text/javascript">
      $('#listar').click(function()
        {
            
            $('#capa').load("../Modelo/MListarAlbumAmigo.php");
        });

  </script>

</body>
</html>
