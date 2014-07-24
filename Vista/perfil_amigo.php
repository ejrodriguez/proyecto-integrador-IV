<!doctype html>

<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />

<script>
	function Enviar(us,am,v){
    	usr=us;
		amg=am;
    	$.ajax({url:"enviar_solicitud.php",cache:false,type:"POST",data:{user:usr,amig:amg},
	});
		alert("Se envio la solicitud de amistad");
		location.href='../Vista/perfil_amigo.php?amigo='+v;	
	};  
	function Cancelar(us,am,v){
    	usr=us;
		amg=am;
    	$.ajax({url:"cancelar_solicitud.php",cache:false,type:"POST",data:{user:usr,amig:amg},
	});
		alert("La solicitud de amistad ha sido cancelada");
		location.href='../Vista/perfil_amigo.php?amigo='+v;	
	};  
</script>
<?php
require '../Conexion/Conexion.php';

$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start();

$_SESSION['idamigo']=$_GET['amigo'];
mysql_query("SET NAMES 'utf8'");
	//Información del Usuario
    $query="SELECT nombre,email, fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE iduser=".$_GET['amigo']."";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
    
   $_SESSION['emailamigo']=$user['email']; 
	
	//Información del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$user['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
	//foto
	$query1="SELECT fotos FROM usuario WHERE email='".$_SESSION['email']."'";
    $result1 = mysql_query($query1);
    $user1=  mysql_fetch_array($result1);
	//solicitudes
	$qa="SELECT email, emailamigo, fecha, status FROM solicitudes WHERE (emailamigo='".$user['email']."' AND email='".$_SESSION['email']."') OR (email='".$user['email']."' AND emailamigo='".$_SESSION['email']."')";
	$qsql = mysql_query($qa);
        
        $solicitud=  mysql_fetch_array($qsql);
	$contar = mysql_num_rows($qsql);
        
        
        
//aumento esto 22'06'2014
//        ver si son amigos
        
        $qamig="SELECT COUNT(*) AS si FROM amigos WHERE (email='".$_SESSION['email']."' AND emailamigo='".$user['email']."') OR (email='".$user['email']."' AND emailamigo='".$_SESSION['email']."')";
	$amigsql = mysql_query($qamig);
        
        $amigos=  mysql_fetch_array($amigsql);
	//$versi = mysql_fetch_array($amigos);
        
        
        
        
        
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->

	<title>Red Social</title>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
    <script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
    <?php include("../Modelo/metodo_buscar_amigo.php"); ?>
</head>

<body>
<div class="container">
  <header>
   <b><font  color="#FFFFFF" style="float:right; margin-left:32%; margin-top:2%; position:absolute"> Social-System:</font></b><?php include("../Vista/busqueda_amistades.php"); ?>
    <a href="#"><img src="../imagenes/FIE.JPG" alt="Insertar logotipo aquí" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
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
    color: white;
    
}







</style>
  </header>
  <div class="sidebar1">
    	<ul class="nav">
    		
             <li><a href="../Vista/perfil_usuario.php">
                 <table id="salir">
                 	<tr>
                        <td>Perfil</td>
                        <td><img src="<?php print $user1['fotos']; ?>" alt="Insertar logotipo aqui" width="30px" height="30px" id="Insert_logo" display:block; /></td>
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
     <td>
      <a href="#"><img src="<?php print ($user['fotos']); ?>" alt="Insertar logotipo aquí" width="150" height="190" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
      </td>
      <td>
     
          	<h1>Perfil del Amig@</h1>
            <br>
      <p><FONT SIZE=5><?php print ($user['nombre']." ".$user['apellido']); ?></FONT></p>
      <?php if($contar==0){ ?>
      <input style="float:right;" type="button" onClick="Enviar('<?php printf($_SESSION['email']); ?>','<?php printf($user['email']); ?>','<?php printf($_GET['amigo']); ?>');" name="modificar" value="Enviar Solicitud" />		<?php }else{  if($solicitud['status']==1){ ?>
       <input style="float:right;" type="button" onClick="Cancelar('<?php printf($_SESSION['email']); ?>','<?php printf($user['email']); ?>','<?php printf($_GET['amigo']); ?>');" name="modificar" value="Cancelar Solicitud" />
       <?php }else {
		   ?>
       <input style="float:right;" type="button" name="modificar" value="Ya son Amigos" readonly />
		<?php   }} ?>
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
      </br>
      </div>
      <div id="publicaciones">
          
        <?php 
       if($amigos['si']==1)
       {
         ?>    
          
          
      <label style="font-size: 30px;color: #fff">Qu&eacute; Piensas?</label>
      <br>
      <center>
          <a href="FAmigoPublicaciones.html" rel="floatbox"><button type="submit" class="buttons"  id="lingresar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/comentario.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Yo digo
              </button></a>
      <button type="submit" class="buttons"  id="refres" name="refre">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Actualizar
    </button>
      </center>
      
      
      <div id="pubs"></div>
      
      
      <?php 
      }
      else
      { ?>
          <label style="font-size: 30px;color:#FFFFFF;">Deseas saber mas sobre <?php echo $user['nombre']; ?>, Envia una solicitud de amistad</label>
      <br>
     <?php }
      ?>
      </div>
      
      
      
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
           echo "<label style='font-size: 30px;color:#FFFFFF;'>Deseas saber mas sobre: ".$user['nombre']."<label>";
           echo '<br> "Envia una solicitud de amistad"';
       }
        ?>       
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


<script type="text/javascript">
	$(document).ready(function(){
        //$("#descr").val(" ");
        //var sub;
        //$('#btnenviar').attr({ value: 'asdasdasd' }); 
        //sub = $('#btnenviar');  
        //sub.replaceWith(sub.clone(true));  
        var nombre;
        nombre='alex';
        $('#pubs').load("../Modelo/MAmigoPublicaciones.php",{a:nombre});
        //$('#pubs').load(("../Modelo/MPublicaciones.php"))
	});
</script>


<script type="text/javascript">
      $('#refres').click(function()
    {
       var nombre;
        nombre='alex';
        $('#pubs').load("../Modelo/MAmigoPublicaciones.php",{a:nombre});


    });

  </script>
  
  
  
  







</html>
