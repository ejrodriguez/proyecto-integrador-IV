<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
//$conn->conectarBD();

$nombre=utf8_decode($_POST['nom']);
$apellido=utf8_decode($_POST['ape']);
        $email=utf8_decode($_POST['ema']);
        $reemail=utf8_decode($_POST['reema']);
        $pass=utf8_decode($_POST['cla']);
        $repass=utf8_decode($_POST['recla']);
        $dia=utf8_decode($_POST['d']);
        $mes=utf8_decode($_POST['m']);
        $anio=utf8_decode($_POST['a']);
        $genero=utf8_decode($_POST['gen']);
        
//        echo $nombre.$apellido.$email.$reemail.$reemail.$pass.$repass.$dia.$mes.$anio.$genero;
                
        if($nombre=="" || $apellido=="" || $email ==""|| $reemail ==""|| $reemail=="" || $pass ==""|| $repass=="" || $dia ==""||$mes=="" || $anio=="" ||$genero=="" )
        {
            echo 'Ingresa los datos Correctamente';
        }
     else {
            if($reemail==$email)
            {
                if($pass==$repass)
                    {
                    $num=strlen($pass);
                        if($num<5)
                        {
                            echo 'Es recomendable que la contrase�a tenga un n�mero mayor a 5 caracteres';
                        }
                        else {
                            
                                //$conn=  conexionBD::getInstance();
                                $conn->conectarBD();
                                $query="SELECT COUNT(email) AS existe FROM usuario WHERE email='$email'";
                                $result = mysql_query($query);
                                //$band= mysql_result($result,0,'existe');
                                $band= mysql_fetch_array($result);
                                $conn->terminarConexion();
                                
                                if($band['existe']==1)
                                    {
                                        echo 'El usuario ya se encuentra registrado';
                                    }
                                 else {
                                        $fecha=$anio.'-'.$mes.'-'.$dia;
                                        
                                        mkdir("../Archivos/".$email);
                                        mkdir("../Archivos/".$email."/Fotos");
                                        mkdir("../Archivos/".$email."/Archivos");
                                        mkdir("../Archivos/".$email."/Perfil");
                                        mkdir("../Archivos/".$email."/Pubs");
                                        mkdir("../Archivos/".$email."/Coments");
                                        
                                       // require '../Archivos/alex22_w@gmail.com/Perfil/';
                                        
                                        
                                        if($genero=='Hombre')
                                        {
                                            $archivo = '../imagenes/defectoh.png';
                                        }
                                        if($genero=='Mujer')
                                        {
                                            $archivo = '../imagenes/defectom.png';
                                        }
                                        
                                        
                                        
                                        
                                        $nuevo_archivo = "../Archivos/".$email."/Perfil/"."def.png";//   def.jpg';
                                        copy($archivo, $nuevo_archivo);
                                        
                                        
                                        
                                        $conn->conectarBD();
                                        $insert="INSERT INTO usuario (email, pass, fechanac, nombre, sexo, stado, fotos,apellido) VALUES ('$email','$pass','$fecha','$nombre','$genero','activo','$nuevo_archivo','$apellido')";
                                        $result = mysql_query($insert);
                                        
                                        echo' Registro exitoso';
                                        session_start();
                                        $_SESSION['email']=$email;
                                        //header('Location: ../Vista/perfil_usuario.php');
                                            
                                       }
                                }
                    }
                  else 
                      {
                         echo 'La contrase�a no coincide';
                      }
                      
                      
             }
            else {
                        echo 'El email no coincide';
                 }
        }
        
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
