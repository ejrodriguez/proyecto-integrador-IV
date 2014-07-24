<?php
require '../Conexion/Conexion.php';

$conn=  conexionBD::getInstance();
$conn->conectarBD();
session_start(); 



?>
<?php
$mensaje=$_POST['men'];
$usuario=$_POST['usr'];
$amigo=$_POST['ami'];
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time());
if($usuario!="" and $mensaje!="" and $amigo!=""){

$q=mysql_query("INSERT INTO chat( email, emailamigo, mensaje, fecha) VALUES ('".$usuario."','".$amigo."','".$mensaje."','".$fecha."')");
if($q){

}

}
?> 
