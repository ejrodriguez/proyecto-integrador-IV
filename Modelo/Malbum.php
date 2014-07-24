<?php
session_start();
//echo 'hola';
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
$email=$_SESSION['email'];
//echo $email;
$nombre=$_POST['n'];

$ver="SELECT COUNT(*) AS existe FROM misfotos WHERE email='$email' AND nombrealbum='$nombre'";
$result = mysql_query($ver);
$band= mysql_fetch_array($result);
//echo 'hola';

if($band['existe']==1)
{
    echo 'El ambum ya existe';
    
}
 else {
     $path='../Archivos/'.$email.'/Fotos/'.$nombre;
     $fec=date("Y-m-d");

$insert="INSERT INTO misfotos (email,nombrealbum,fecha) VALUES ('$email','$nombre','$fec')";
$result1 = mysql_query($insert);

mkdir($path);
echo 'Album creado';
    
}



//$result = mysql_query($insert);



?>

