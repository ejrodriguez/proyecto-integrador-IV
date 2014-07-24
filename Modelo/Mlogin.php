<?php
require '../Conexion/Conexion.php';
session_start();
$conn=  conexionBD::getInstance();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$email=$_POST['loguser'];
$pass=$_POST['logclave'];

if($email=="" || $pass=="")
{
    echo 'Ingrese los datos correctamente';
}
 else {
            //echo 'pasa';
            $conn->conectarBD();
            $query="SELECT COUNT(email) AS existe FROM usuario WHERE email='$email' AND pass='$pass'";
            $result = mysql_query($query);
            //$band= mysql_result($result,0,'existe');
            $band= mysql_fetch_array($result);
            $conn->terminarConexion();
            if($band['existe']==1)
            {
                //echo 'El usuario existe';
                $_SESSION['email']=$email;
               // echo $_SESSION['email'];
               header('Location: ../Vista/perfil_usuario.php');
//                $items='si';
//                 $data = json_encode($items);
            }
            else
            {
                header('Location: ../index.php');
            }
        }

?>
