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


$ver="DELETE FROM comentarios WHERE idcom=$id";
$result = mysql_query($ver) or die('No se pudo eliminar');
//include '../Vista/perfil_usuario.php';
header('Location: ../Vista/FComentarios.php?id='.$id."&email=".$email);
//echo "'<a href='javascript:history.back();'>La Publicacion ha sido eliminada</a>'";
?>
