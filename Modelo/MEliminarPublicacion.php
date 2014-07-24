<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();

$id=$_GET['id'];
$email=$_GET['email'];


$ver="DELETE FROM publicaciones WHERE idpub=$id";
$result = mysql_query($ver) or die('No se pudo eliminar');
//include '../Vista/perfil_usuario.php';
header('Location: ../Vista/perfil_usuario.php');
//echo "'<a href='javascript:history.back();'>La Publicacion ha sido eliminada</a>'";
?>
