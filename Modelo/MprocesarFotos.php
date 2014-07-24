<?php
session_start();
require '../Conexion/Conexion.php';
$email=$_SESSION['email'];
$album=$_SESSION['nombal'];
$idal=$_SESSION['idal'];
if(isset($_POST['submit'])) {


    // Datos de conexión a configurar
//    $server = "localhost";
//    $user = "root";
//    $pass = "";
//    $bbdd = "pruebafotos";
 
    // Ruta donde se guardarán las imágenes
//    ../Archivos/alex22_w@gmail.com/Fotos/CumpleaÃ±os/ 
    $directorio = '../Archivos/'.$email.'Fotos/'.$album.'/';
 
    // Conecto a la BBDD
    $conn=  conexionBD::getInstance();
    $conn->conectarBD();
//    $dbh = mysql_connect($server, $user, $pass);
//    $db = mysql_select_db($bbdd);
 
    // Recibo los datos de la imagen
    $nombre = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
 
    // Muevo la imagen desde su ubicación
    // temporal al directorio definitivo
    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre);
//    echo $_FILES['imagen']['tmp_name'];
// Guardamos en la BBDD		
//        $link = mysql_connect ($server, $user, $pass);
//        mysql_select_db($bbdd,$link);
        
//Nos Aseguramos de que no aya otra imagen con el mismo nombre	
                 $queEmp = "SELECT foto FROM fotos WHERE email='$email' AND idmf=$idal";
		//$queEmp = "SELECT nombre_archivo FROM tablaimagenes WHERE nombre_archivo='$nombre'";
                 $result = mysql_query($queEmp);
		//$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
		$totEmp = mysql_num_rows($result);
		if($totEmp > 0){
		echo "El Nombre De La Imagen No Esta Disponible. <a href='javascript:history.back();'>Regresar Y Cambiar El Nombre</a>";
		exit();
		}
                 else {
                     $fechaf=date("Y/m/d H:i:s");
                     $sql = "INSERT INTO fotos (email,idmf,foto,fecha,descripcion) values ('$email',$idal,'$nombre','$fechaf','')";
//                     $insert="INSERT INTO usuario (email, pass, fechanac, nombre, sexo, stado, fotos,apellido) VALUES ('$email','$pass','$fecha','$nombre','$genero','activo','../imagenes/defecto.jpg','$apellido')";
                     //$resultado = mysql_query($sql);
                     $result1 = mysql_query($sql);
 
                        // Por si queremos la ID asignada a la imagen
//                        $id = mysql_insert_id();

                 }


    



        // Ahora comprobaremos que todo ha ido correctamente
//        $my_error = mysql_error($link);
//
//        if(!empty($my_error)) {
//
//            echo "Ha habido un error al insertar los valores. $my_error";
//
//        } else {
//
//            echo "Imagen introducida satisfactoriamente";
//
//        }

    } else {

        echo "Error, Todavia NO Ha Selecionado Nada";

    }

?>