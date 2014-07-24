<script>
			alert('Error');
		</script>
<?php
require '../Conexion/Conexion.php';

	$conn=  conexionBD::getInstance();
$conn->conectarBD();
//Fecha
	date_default_timezone_set('America/Guayaquil');
	$fech=date("Y-m-d");
	$q="INSERT INTO solicitudes( email, emailamigo, fecha, status) VALUES ('".$_POST['user']."','".$_POST['amig']."','".$fech."','1')";
   	$qs=mysql_query($q);
	if (!$qs)
	{ ?>
    	<script>
			alert('Error');
		</script>
     <?php }		
?>
