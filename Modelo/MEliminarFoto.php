<?php


session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();

//echo $_POST['nomf'];
//echo $_POST['idf'];
$email=$_SESSION['email'];
$idmf=$_SESSION['idal'];
$nomfo=$_POST['nomf'];
$nomalb=$_SESSION['nombal'];

if($nomfo=="")
{
    echo "Error, Todavia NO Ha Seleccionado Nada. <a href='javascript:history.back();'>Regresar Y Seleccionar</a>";
}
 else {
    
mysql_query("SET NAMES 'utf8'");
$ver="DELETE FROM fotos WHERE idmf=$idmf AND email='$email' AND foto='$nomfo'";
$result = mysql_query($ver) or die('No se pudo eliminar');
$direc='../Archivos/'.$email.'/Fotos/'.$nomalb.'/';

unlink($direc.$nomfo);
 echo "Se ha eliminado la fotografia. <a href='javascript:history.back();'>Regresar Y Seleccionar</a>";

}

//require '../Archivos/alex22_w@gmail.com/Fotos/Nuevo3/';
?>
