<!doctype html>
<?php
session_start();
require '../Conexion/Conexion.php';
mysql_query("SET NAMES 'utf8'");
 $idp=$_GET['id'];
 $_SESSION['idam']=$_GET['id'];
$ema=$_GET['email'];
$_SESSION['emaccome']=$_GET['email'];


$conn=  conexionBD::getInstance();
$conn->conectarBD();
//session_start();
	//Información del Usuario

//    mysql_query("SET NAMES 'utf8'");
    $query="SELECT email,fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE iduser='".$_SESSION['idamigo']."'";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
	//Información del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
    
    
    $query_perfil="SELECT texto FROM publicaciones WHERE idpub=$idp AND email='$ema'";
    $resultado1 = mysql_query($query_perfil);
    $pub=mysql_fetch_array($resultado1);
	
	//        ver si son amigos
        
        $qamig="SELECT COUNT(*) AS si FROM amigos WHERE (email='".$_SESSION['email']."' AND emailamigo='".$user['email']."') OR (email='".$user['email']."' AND emailamigo='".$_SESSION['email']."')";
	$amigsql = mysql_query($qamig);
        
        $amigos=  mysql_fetch_array($amigsql);
    
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


#coments
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
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Comentarios</title>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />
        <!--<script type="text/javascript" src="../js/jquery.js"></script>-->
        <script type="text/javascript" src="../js/floatboxchat/framebox.js"></script>
        
        
       
        <script src="../js/jquery-1.6.3.min.js" type="text/javascript"></script>
<!--        <script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>-->
        
    
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
      <li><a href="#">Grupos</a></li>
             <li><a href="CerrarSesion.php">Cerrar Social-System</a></li>
   	</ul>  
  <!-- end .sidebar1 --></div>
  <article class="content">
      <table width="100%" bgcolor="#FFFFFF">
          <tr>
              <td>
                <h1>Perfil de Amigo</h1>
              </td>
              <td>
                  <!--?id=25&email=bsolorzano@yahoo.e-->
                  
                  
                  <a href="FAmigoComentarios.php?id=<?php echo $idp; ?>&email=<?php echo $ema; ?>"><button type="submit" class="buttons"  id="registrar" name="submit" >
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>Actualizar
            </button></a>
              </td>
      </tr>
      </table>
    <section>
     <table width="100%" bgcolor="#fff">
     <tr>
     <td>
         
         
         <a href="#" rel="floatbox"><img src="<?php print $user['fotos']; ?>" alt="Insertar logotipo aqui" width="150" height="190" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
      </td>
      <td>
      <p><FONT SIZE=5><?php print ($user['nombre']." ".$user['apellido']); ?></FONT></p>
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
      <!--<input  type="button" onClick="location.href='../Vista/modificar_informacion.php'" name="modificar" value="Modificar Información" />-->
      </br>
      </div>
        
      <div id="publicaciones">
      <!--<label>Publicaciones</label>-->
      <h1 style="font-size: 30px;color: #fff;">Comentario</h1>
      <label style="font-size: 20px;color: #fff;"><?php print ($pub['texto']); ?></label>
      <br>
      <center>
          <a href="FAmigoComentario.html" rel="floatbox"><button type="submit" class="buttons"  id="lingresar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/comentario.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Yo digo
              </button></a>
      <button type="submit" class="buttons"  id="refres" name="refre">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/actualiza.png" height="20px" width="20px" alt=""/>&nbsp;&nbsp;Actualizar
    </button>
      </center>
      

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        
        <div id="coments"></div>
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
           echo "Deseas saber mas sobre: ".$user['nombre'];
           echo '<br> "Envia una solicitud de amistad"';
       }
        ?>       
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



<!--<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
        
        
          var nombre;
        nombre='alex';
        alert(nombre);
        $('#pubs').load("../Modelo/MPublicaciones.php",{a:nombre});
    });
</script>-->










<script type="text/javascript">
	$(document).ready(function(){
        //$("#descr").val(" ");
        //var sub;
        //$('#btnenviar').attr({ value: 'asdasdasd' }); 
        //sub = $('#btnenviar');  
        //sub.replaceWith(sub.clone(true));  
        var nombre;
        nombre='alex';
        $('#coments').load("../Modelo/MAmigoComentarios.php",{a:nombre});
        //$('#pubs').load(("../Modelo/MPublicaciones.php"))
	});
</script>

    <script type="text/javascript">////
      $('#refres').click(function()
    {
       var nombre;
        nombre='alex';
        //alert(nombre);
        $('#coments').load("../Modelo/MAmigoComentarios.php",{a:nombre});


    });

  </script>

</html>
