<?php

session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();

//echo $_POST['nomf'];
//echo $_POST['idf'];
$email=$_SESSION['email'];
//$idmf=$_SESSION['idal'];
//$nomfo=$_POST['nomf'];
//$nomalb=$_SESSION['nombal'];
$noma=$_POST['nomf'];
$idmf=$_POST['idf'];
if($noma=="")
{
    echo "Error, Todavia NO Ha Seleccionado Nada. <a href='javascript:history.back();'>Regresar Y Seleccionar</a>";
}
 else {
    
mysql_query("SET NAMES 'utf8'");
//$ver="DELETE FROM misfotos WHERE idmf=$idmf AND email='$email' AND nombrealbum='$noma'";
//$result = mysql_query($ver) or die('No se pudo eliminar');
//$direc='../Archivos/'.$email.'/Fotos/'.$noma.'/';


$fot="SELECT foto FROM fotos WHERE email='$email' AND idmf=$idmf";
$res = mysql_query($fot) or die('No se pudo ');
while ($row = mysql_fetch_array($res))
{
    $nomfot=$row['foto'];
    $direc='../Archivos/'.$email.'/Fotos/'.$noma.'/';
    unlink($direc.$nomfot);
}

$ver="DELETE FROM misfotos WHERE idmf=$idmf AND email='$email' AND nombrealbum='$noma'";
$result = mysql_query($ver) or die('No se pudo eliminar');
$direc='../Archivos/'.$email.'/Fotos/'.$noma.'/';
rmdir($direc);
 echo "Se ha eliminado la fotografia. <a href='javascript:history.back();'>Regresar Y Seleccionar</a>";

}

?>
