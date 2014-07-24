<?php
session_start();

if(isset($_POST['submit'])) {
    if ($_FILES['imagen']['name']=="")
        {
    
//                echo "Error, Todavia NO Ha Selecionado Nada";
                echo "Error, Todavia NO Ha Seleccionado Nada. <a href='javascript:history.back();'>Regresar Y Seleccionar</a>";
        }
        else {
            
            
            $imagen_tipo = $_FILES['imagen']['type'];
            
          if ($imagen_tipo == "image/jpeg" || $imagen_tipo == "image/png" || $imagen_tipo == "image/gif" || $imagen_tipo == "image/bmp"  )
          {
             
             
                       
              define("maxUpload", 2000000);
//       define("maxWidth", 800);
//       define("maxHeight", 800);
//        
        if($_FILES['imagen']['size']<maxUpload)
        {
//require ' ../Conexion/Conexion.php';
    // Datos de conexión a configurar
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bbdd = "redsocial";
 
    // Ruta donde se guardarán las imágenes
//    $directorio = 'uploads/';
    
    $uploads_dir = "../Archivos/".$_SESSION['email']."/Fotos/".$_SESSION['nombal']."/";
// $directorio ='../Archivos/alex22_w@gmail.com/Fotos/Recuerdos/';
    // Conecto a la BBDD
    
    
    
    
    
    
//    esto
//    $dbh = mysql_connect($server, $user, $pass);
//    $db = mysql_select_db($bbdd);
 
    
    ;
    
    // Recibo los datos de la imagen
    $nombre = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
 
    // Muevo la imagen desde su ubicación
    // temporal al directorio definitivo
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    move_uploaded_file($tmp_name,$uploads_dir.$nombre);
 
// Guardamos en la BBDD		
//        $link = mysql_connect ($server, $user, $pass);
//        mysql_select_db($bbdd,$link);

//Nos Aseguramos de que no aya otra imagen con el mismo nombre		
//		$queEmp = "SELECT nombre_archivo FROM tablaimagenes WHERE nombre_archivo='$nombre'";
//		$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
//		$totEmp = mysql_num_rows($resEmp);
//		if($totEmp > 0){
//		echo "El Nombre De La Imagen No Esta Disponible. <a href='javascript:history.back();'>Regresar Y Cambiar El Nombre</a>";
//		exit();
//		}
        $fecsub=date("Y/m/d H:i:s");
        $idambum=$_SESSION['idal'];
        $correo=$_SESSION['email'];
        $de=$_POST['desc'];
        
        
        require '../Conexion/Conexion.php';
        $conn=  conexionBD::getInstance();
    $conn->conectarBD();
        
    $sql="INSERT INTO fotos (email,idmf,foto,fecha,descripcion) VALUES ('$correo',$idambum,'$nombre','$fecsub','$de')";    
//    $sql = "INSERT into tablaimagenes (nombre_archivo) values ('$nombre')";
    $resultado = mysql_query($sql);
 
    // Por si queremos la ID asignada a la imagen
    $id = mysql_insert_id();



        // Ahora comprobaremos que todo ha ido correctamente
//      $my_error = mysql_error($link);

        if(empty($id)) {

            echo "Ha habido un error al insertar los valores. ";

        } else {

            echo "Imagen introducida satisfactoriamente <a href='javascript:history.back();'>Regresar </a>";

        }

        }  else {
            echo "El tamaño de la Imagen exede el limite. <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";
            
        }
             
             
        }
          else {
           echo "El formato de la Imagen no es el correcto se permiten archivos jpg, png, gif y bmp. <a href='javascript:history.back();'>Regresar Y Cambiar Foto</a>";

            
  
            
        }
        
        
        }
        
        
        
        
        

    } 

?>