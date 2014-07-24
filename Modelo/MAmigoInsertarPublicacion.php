<?php
session_start();
$correo1=$_SESSION['email'];
$correo2=$_SESSION['emailamigo'];
if(isset($_POST['submit'])) {
  
    require '../Conexion/Conexion.php';
    $conn=  conexionBD::getInstance();
    $conn->conectarBD();
    //require ' ../Conexion/Conexion.php';
    // Datos de conexión a configurar
//    $server = "localhost";
//    $user = "root";
//    $pass = "";
//    $bbdd = "redsocial";
    
//    $dbh = mysql_connect($server, $user, $pass);
//    $db = mysql_select_db($bbdd);
//    $link = mysql_connect ($server, $user, $pass);
//        mysql_select_db($bbdd,$link);
    
        if ($_POST['Texto']!= "")
        {
                        
             $comen=utf8_decode($_POST['Texto']);
             $dim=  strlen($comen);
             
             if($dim<=500)
             
             {
             
             
             //echo $comen."<a href='javascript:history.back();'>Regresar </a>";
             $ima=$_FILES['imagen']['name'];
             //echo $ima."<a href='javascript:history.back();'>Regresar </a>";
             $ban='no';
             




            //validar foto
             
             if ($ima !="")
             {
                 $imagen_tipo = $_FILES['imagen']['type'];
                  if ($imagen_tipo == "image/jpeg" || $imagen_tipo == "image/png" || $imagen_tipo == "image/gif" || $imagen_tipo == "image/bmp"  )
                  {
                       define("maxUpload", 2000000);   
                       $tami=$_FILES['imagen']['size'];
                       if ($tami<maxUpload)
                       {
                           $ban='si';
                            //echo $comen."   ".$ima."   ".$imagen_tipo."  ".$tami. "<a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
                       }
                        else {
                          
                             echo "El tamaño de la Imagen exede el limite. <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
                        }
                  }
                  else
                  {
                      echo "El formato de la Imagen no es el correcto se permiten archivos jpg, png, gif y bmp. <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
                  }
                 
                 
                 //echo $imagen_tipo."<a href='javascript:history.back();'>Regresar </a>";
             }
             else {
                 $ban='no';
                 //echo $comen."   ".$ima;
                // echo "no hay imagen. <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
             }
             
             
             //validar id video
             $tub=$_POST['tube'];
             $banvi='no';
             //$cadena = "Sin León no hubiera España";
             $buscar = "www.youtube.com/";
             $resultado = strpos($tub, $buscar);
             if($resultado == FALSE){
               $banvi='si';  
             }

             
             
             if ($ban=='si' && $banvi=='si')
             {
                 //require '../Archivos/bsolorzano@yahoo.es/Pubs/';
                $uploads_dir = "../Archivos/".$_SESSION['email']."/Pubs/";
                $tmp_name = $_FILES["imagen"]["tmp_name"];
                move_uploaded_file($tmp_name,$uploads_dir.$ima);
                 $fotoasub=$uploads_dir.$ima;
                 
                 
                 $fechap=date("Y/m/d H:i:s");
                 $sql="INSERT INTO publicaciones (email,texto,imagen,video,fecha,enperfilde) VALUES ('$correo1','$comen','$fotoasub','$tub','$fechap','$correo2')";    
////    $sql = "INSERT into tablaimagenes (nombre_archivo) values ('$nombre')";
                $resultado = mysql_query($sql) or die('no se pudo ingresar');
                 echo  "Tu publicacion se ha registrado <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
             
             //echo $comen."<br>   ".$ima."<br>    ".$imagen_tipo." <br>  ".$tami." <br> ".$tub. "<br> <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
                
             }
             else {
                 
                 $fechap1=date("Y/m/d H:i:s");
                 $sql1="INSERT INTO publicaciones (email,texto,imagen,video,fecha,enperfilde) VALUES ('$correo1','$comen','no','$tub','$fechap1','$correo2')";    
////    $sql = "INSERT into tablaimagenes (nombre_archivo) values ('$nombre')";
                $resultado = mysql_query($sql1) or die('no se pudo ingresar');
                //echo $my_error = mysql_error($link);
                 echo  "Tu publicacion se ha registrado <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
             
                 
                 
                 //echo $comen."<br>   ".$ima."<br>".$tub. "<br> <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
             }
             
        }
             
           else {
             
             echo "Tu comentario debe tener maximo 500 caracteres <a href='javascript:history.back();'>Regresar </a>";

         } 
             
        }
        
        
        
        
        
        
        
         else {
             
             echo "Es necesario que ingrese texto para realizar la publicacion <a href='javascript:history.back();'>Regresar </a>";

         }
        
        

    } 

?>
