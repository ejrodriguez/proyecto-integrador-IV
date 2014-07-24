<?php 

require '../Conexion/Conexion.php';

$conn= conexionBD::getInstance();
$conn->conectarBD();
session_start(); 
?>
<div style="width:100%;" id="chat1">
<?php
$query="SELECT email, emailamigo, mensaje, fecha FROM chat WHERE (emailamigo='".$_GET['ami']."' AND email='".$_SESSION['email']."') OR (email='".$_GET['ami']."' AND emailamigo='".$_SESSION['email']."') ORDER BY fecha DESC";
$result = mysql_query($query);

while($fila=mysql_fetch_array($result)){
	$q_nombre="SELECT nombre FROM usuario WHERE email='".$fila['email']."'";
	$r_nom = mysql_query($q_nombre);
?>

<div style="background-color:#FFF; height:auto; width:100%; " >
<b><font size="2"><?php echo mysql_result($r_nom,0,'nombre').":   ";?> </font></b></br>
<?php echo $fila['mensaje']; ?> </br>
<h5 align="center"><?php echo $fila['fecha'];?> </h5></div><?php 
} 
?>
</div>



