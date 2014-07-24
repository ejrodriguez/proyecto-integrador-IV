<!doctype html>

<script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />
<?php
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start();
	//Informaci�n del Usuario
    $query="SELECT pass,fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE email='".$_SESSION['email']."'";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
	//Informaci�n del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
	 $contar = mysql_num_rows($resultado);
 	$clave=$user['pass'];
	$fotos=$user['fotos'];
	$anio=substr($user['fechanac'],0,4);
	$mes=substr($user['fechanac'],5,2);
	$dia=substr($user['fechanac'],8,2);
?>
<html>
<head>

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Red Social</title>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
</head>

<body>
<div class="container">
  <header>
   <?php include("../Vista/busqueda_amistades.php"); ?>
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
      
    </section>
    <section>
    
     <form action="modificar_informacion.php" method="post">
      <div align="center">
    <h4>Modificar Informaci&oacute;n del Perfil</h4>
      <p>Nombres: <input type="text" name="nombres" value="<?php print ($user['nombre']); ?>" required/>* </p>
      <HR width=40% align="center">
      <p>Nombres: <input type="text" name="apellidos" value="<?php print ($user['apellido']); ?>" required/>* </p>
      <HR width=40% align="center">
      <p>Contrase&ntilde;a Actual: <input type="password" name="clave1" required/>* </p>
      <HR width=40% align="center">
      <p>Contrase&ntilde;a Nueva: <input type="password" name="contrasenia1" /> </p>
      <HR width=40% align="center">
      <p>Repetir Contrase&ntilde;a: <input type="password" name="contrasenia2" /> </p>
      <HR width=40% align="center">
    	<p>Estudios: <input type="text" name="estudios" value="<?php print ($perfil['estudios']); ?>" /></p>
        
      <HR width=40% align="center">
      <p>Profesi&oacute;n: <input type="text" name="profesion" value="<?php print ($perfil['ocupacion']); ?>" required/>* </p>
       
      <HR width=40% align="center">
      <p>Ciudad: <input type="text" name="ciudad" value="<?php print ($perfil['ciudad']); ?>" required/>* </p>
      <HR width=40% align="center">
      <p>Direcci&oacute;n: <input type="text" name="direccion" value="<?php print ($perfil['direccion']); ?>"/> </p>
      <HR width=40% align="center">
      
      <p>Situaci&oacute;n Sentimental: <select id="est_civil" name="est_civil">
            <option value="soltero" <?php if ('Soltero'==$perfil['edocivil']){?> selected <?php }?>>Soltero</option>
            
            <option value="Tiene una relaci�n" <?php if ('Tiene una relaci�n'==$perfil['edocivil']){?> selected <?php }?>>Tiene una relaci�n</option>
            <option value="Divorsiado" <?php if ('Divorsiado'==$perfil['edocivil']){?> selected <?php }?>>Divorsiado</option>
            
            <option value="Casado" <?php if ('Casado'==$perfil['edocivil']){?> selected <?php }?>>Casado</option>
            <option value="Amigos con Derecho" <?php if ('Amigos con Derecho'==$perfil['edocivil']){?> selected <?php }?>>Amigos con derecho</option>
            
            
            
            </select> </p>
     
     
     
     
     
     
      
      <HR width=40% align="center">
      <p>
      <table>
      <tr>
       <td><label class="lab">Fecha de Nacimiento:</label></td>
<!--            <td><label>Dia:</label></td>-->
            
            <td> <select id="dia" name="dia">
            <option value="1" <?php if ('01'==$dia){?> selected <?php }?>>1</option>
            <option value="2" <?php if ('02'==$dia){?> selected <?php }?>>2</option>
            <option value="3" <?php if ('03'==$dia){?> selected <?php }?>>3</option>
            <option value="4" <?php if ('04'==$dia){?> selected <?php }?>>4</option>
            <option value="5" <?php if ('05'==$dia){?> selected <?php }?>>5</option>
            <option value="6" <?php if ('06'==$dia){?> selected <?php }?>>6</option>
            <option value="7" <?php if ('07'==$dia){?> selected <?php }?>>7</option>
            <option value="8" <?php if ('08'==$dia){?> selected <?php }?>>8</option>
            <option value="9" <?php if ('09'==$dia){?> selected <?php }?>>9</option>
            <option value="10" <?php if ('10'==$dia){?> selected <?php }?>>10</option>
            <option value="11" <?php if ('11'==$dia){?> selected <?php }?>>11</option>
            <option value="12" <?php if ('12'==$dia){?> selected <?php }?>>12</option>
            <option value="13" <?php if ('13'==$dia){?> selected <?php }?>>13</option>
            <option value="14" <?php if ('14'==$dia){?> selected <?php }?>>14</option>
            <option value="15" <?php if ('15'==$dia){?> selected <?php }?>>15</option>
            <option value="16" <?php if ('16'==$dia){?> selected <?php }?>>16</option>
            <option value="17" <?php if ('17'==$dia){?> selected <?php }?>>17</option>
            <option value="18" <?php if ('18'==$dia){?> selected <?php }?>>18</option>
            <option value="19" <?php if ('19'==$dia){?> selected <?php }?>>19</option>
            <option value="20" <?php if ('20'==$dia){?> selected <?php }?>>20</option>
            <option value="21" <?php if ('21'==$dia){?> selected <?php }?>>21</option>
            <option value="22" <?php if ('22'==$dia){?> selected <?php }?>>22</option>
            <option value="23" <?php if ('23'==$dia){?> selected <?php }?>>23</option>
            <option value="24" <?php if ('24'==$dia){?> selected <?php }?>>24</option>
            <option value="25" <?php if ('25'==$dia){?> selected <?php }?>>25</option>
            <option value="26" <?php if ('26'==$dia){?> selected <?php }?>>26</option>
            <option value="27" <?php if ('27'==$dia){?> selected <?php }?>>27</option>
            <option value="28" <?php if ('28'==$dia){?> selected <?php }?>>20</option>
            <option value="29" <?php if ('29'==$dia){?> selected <?php }?>>29</option>
            <option value="30" <?php if ('30'==$dia){?> selected <?php }?>>30</option>
            <option value="31" <?php if ('31'==$dia){?> selected <?php }?>>31</option>
        </select> </td>
            <!--<td><label>Mes:</label></td>-->
            <td> <select id="mes" name="mes">
            <option value="1" <?php if ('01'==$mes){?> selected <?php }?>>Enero</option>
            <option value="2" <?php if ('02'==$mes){?> selected <?php }?>>Febrero</option>
            <option value="3" <?php if ('03'==$mes){?> selected <?php }?>>Marzo</option>
            <option value="4" <?php if ('04'==$mes){?> selected <?php }?>>Abril</option>
            <option value="5" <?php if ('05'==$mes){?> selected <?php }?>>Mayo</option>
            <option value="6" <?php if ('06'==$mes){?> selected <?php }?>>Junio</option>
            <option value="7" <?php if ('07'==$mes){?> selected <?php }?>>Julio</option>
            <option value="8" <?php if ('08'==$mes){?> selected <?php }?>>Agosto</option>
            <option value="9" <?php if ('09'==$mes){?> selected <?php }?>>Septiembre</option>
            <option value="10" <?php if ('10'==$mes){?> selected <?php }?>>Octubre</option>
            <option value="11" <?php if ('11'==$mes){?> selected <?php }?>>Noviembre</option>
            <option value="12" <?php if ('12'==$mes){?> selected <?php }?>>Diciembre</option>
        </select> </td>
            <td> <select id="anio" name="anio">
            <!--<option value="2005">2005</option>-->
                          
                           <option value="2005" <?php if ('2005'==$anio){?> selected <?php }?>>2005</option>
                           <option value="2004" <?php if ('2004'==$anio){?> selected <?php }?>>2004</option>
                           <option value="2003" <?php if ('2003'==$anio){?> selected <?php }?>>2003</option>
                           <option value="2002" <?php if ('2002'==$anio){?> selected <?php }?>>2002</option>
                           <option value="2001" <?php if ('2001'==$anio){?> selected <?php }?>>2001</option>
                           <option value="2000" <?php if ('2000'==$anio){?> selected <?php }?>>2000</option>
                           <option value="1999" <?php if ('1999'==$anio){?> selected <?php }?>>1999</option>
                           <option value="1998" <?php if ('1998'==$anio){?> selected <?php }?>>1998</option>
                           <option value="1997" <?php if ('1997'==$anio){?> selected <?php }?>>1997</option>
                           <option value="1996" <?php if ('1996'==$anio){?> selected <?php }?>>1996</option>
                           <option value="1995" <?php if ('1995'==$anio){?> selected <?php }?>>1995</option>
                           <option value="1994" <?php if ('1994'==$anio){?> selected <?php }?>>1994</option>
                           <option value="1993" <?php if ('1993'==$anio){?> selected <?php }?>>1993</option>
                           <option value="1992" <?php if ('1992'==$anio){?> selected <?php }?>>1992</option>
                           <option value="1991" <?php if ('1991'==$anio){?> selected <?php }?>>1991</option>
                           <option value="1990" <?php if ('1990'==$anio){?> selected <?php }?>>1990</option>
                           <option value="1989" <?php if ('1989'==$anio){?> selected <?php }?>>1989</option>
                           <option value="1988" <?php if ('1988'==$anio){?> selected <?php }?>>1988</option>
                           <option value="1987" <?php if ('1987'==$anio){?> selected <?php }?>>1987</option>
                           <option value="1986" <?php if ('1986'==$anio){?> selected <?php }?>>1986</option>
                           <option value="1985" <?php if ('1985'==$anio){?> selected <?php }?>>1985</option>
                           <option value="1984" <?php if ('1984'==$anio){?> selected <?php }?>>1984</option>
                           <option value="1983" <?php if ('1983'==$anio){?> selected <?php }?>>1983</option>
                           <option value="1982" <?php if ('1982'==$anio){?> selected <?php }?>>1982</option>
                           <option value="1981" <?php if ('1981'==$anio){?> selected <?php }?>>1981</option>
                           <option value="1980" <?php if ('1980'==$anio){?> selected <?php }?>>1980</option>
                           <option value="1979" <?php if ('1979'==$anio){?> selected <?php }?>>1979</option>
                           <option value="1978" <?php if ('1978'==$anio){?> selected <?php }?>>1978</option>
                           <option value="1977" <?php if ('1977'==$anio){?> selected <?php }?>>1977</option>
                           <option value="1976" <?php if ('1976'==$anio){?> selected <?php }?>>1976</option>
                           <option value="1975" <?php if ('1975'==$anio){?> selected <?php }?>>1975</option>
                           <option value="1974" <?php if ('1974'==$anio){?> selected <?php }?>>1974</option>
                           <option value="1973" <?php if ('1973'==$anio){?> selected <?php }?>>1973</option>
                           <option value="1972" <?php if ('1972'==$anio){?> selected <?php }?>>1972</option>
                           <option value="1971" <?php if ('1971'==$anio){?> selected <?php }?>>1971</option>
                           <option value="1970" <?php if ('1970'==$anio){?> selected <?php }?>>1970</option>
                           <option value="1969" <?php if ('1969'==$anio){?> selected <?php }?>>1969</option>
                           <option value="1968" <?php if ('1968'==$anio){?> selected <?php }?>>1968</option>
                           <option value="1967" <?php if ('1967'==$anio){?> selected <?php }?>>1967</option>
                           <option value="1966" <?php if ('1966'==$anio){?> selected <?php }?>>1966</option>
                           <option value="1965" <?php if ('1965'==$anio){?> selected <?php }?>>1965</option>
                           <option value="1964" <?php if ('1964'==$anio){?> selected <?php }?>>1964</option>
                           <option value="1963" <?php if ('1963'==$anio){?> selected <?php }?>>1963</option>
                           <option value="1962" <?php if ('1962'==$anio){?> selected <?php }?>>1962</option>
                           <option value="1961" <?php if ('1961'==$anio){?> selected <?php }?>>1961</option>
                           <option value="1960" <?php if ('1960'==$anio){?> selected <?php }?>>1960</option>
                           <option value="1959" <?php if ('1959'==$anio){?> selected <?php }?>>1959</option>
                           <option value="1958" <?php if ('1958'==$anio){?> selected <?php }?>>1958</option>
                           <option value="1957" <?php if ('1957'==$anio){?> selected <?php }?>>1957</option>
                           <option value="1956" <?php if ('1956'==$anio){?> selected <?php }?>>1956</option>
                           <option value="1955" <?php if ('1955'==$anio){?> selected <?php }?>>1955</option>
                           <option value="1954" <?php if ('1954'==$anio){?> selected <?php }?>>1954</option>
                           <option value="1953" <?php if ('1953'==$anio){?> selected <?php }?>>1953</option>
                           <option value="1952" <?php if ('1952'==$anio){?> selected <?php }?>>1952</option>
                           <option value="1951" <?php if ('1951'==$anio){?> selected <?php }?>>1951</option>
                           <option value="1950" <?php if ('1950'==$anio){?> selected <?php }?>>1950</option>
            
        </select> </td>
            <!--<td><label>A�o:</label></td>-->
        </tr>
        </table>
        </p>
      <HR width=40% align="center">
    
    	<p>Sexo: <select name="sexo">
      			<option value="Hombre" <?php if ('Hombre'==$user['sexo']){?> selected <?php }?>>Hombre</option>
                <option value="Mujer" <?php if ('Mujer'==$user['sexo']){?> selected <?php }?>>Mujer</option>
                </select>* </p>
      <HR width=40% align="center">
      <p><font color="#990000" size="-1">Los campos que tengan un * son obligatorios.</font></p>
      <HR width=40% align="center">
      <input  type="submit" name="modificar" value="GUARDAR CAMBIOS" />
      
      </br>
      </div>
      </form>
    </section>
    
  <!-- end .content --></article>
  
  <?php
  if (isset($_POST['modificar']))
  {
	  if ($_POST['clave1']==$clave)
	  {
		  $fecha=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
	  if ($_POST['contrasenia1']==$_POST['contrasenia2'])
	  {
	
if($_POST['contrasenia1']!=""){
	$clave=$_POST['contrasenia1'];
}
if($_POST['fotos']!=""){
	$fotos=$_POST['fotos'];
}
	//Informaci�n del Usuario
	$actualizar="UPDATE usuario SET pass='".$clave."',fechanac='".$fecha."',nombre='".$_POST['nombres']."',apellido='".$_POST['apellidos']."',sexo='".$_POST['sexo']."' WHERE email='".$_SESSION['email']."'";
    $result = mysql_query($actualizar)or die(mysql_error());
    
	//Informaci�n del perfil
	if ($contar==0){
		$act_perfil="INSERT INTO perfil(email, direccion, edocivil, ocupacion, estudios, ciudad) VALUES ('".$_SESSION['email']."','".$_POST['direccion']."','".$_POST['est_civil']."','".$_POST['profesion']."','".$_POST['estudios']."','".$_POST['ciudad']."')";
	}else{
$act_perfil="UPDATE perfil SET direccion='".$_POST['direccion']."',edocivil='".$_POST['est_civil']."',ocupacion='".$_POST['profesion']."',estudios='".$_POST['estudios']."',ciudad='".$_POST['ciudad']."' WHERE email='".$_SESSION['email']."'";

}
$ejecutar = mysql_query($act_perfil)or die(mysql_error());
	if ($result and $ejecutar)
	{
	?>
    <script type="text/javascript">
        	window.location = "../Vista/perfil_usuario.php";
  	</script>
    <?php
    
	}
	  }else
	  {
		  ?>
		  <script type="text/javascript">
        	alert("Las contraseñas no coinciden");
  	</script>
    <?php
	  }
	  }else{
		    ?>
		  <script type="text/javascript">
        	alert("Su contraseña anterior no es la correcta");
  	</script>
    <?php
		 }
  }
?>
 
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
