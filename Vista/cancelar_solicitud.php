
<?php
require '../Conexion/Conexion.php';

	$conn=  conexionBD::getInstance();
	$conn->conectarBD();
	//Fecha
	date_default_timezone_set('America/Guayaquil');
	$fech=date("Y-m-d");
	$q="DELETE FROM solicitudes WHERE email='".$_POST['user']."' AND emailamigo='".$_POST['amig']."'";
   	$qs=mysql_query($q);
	if (!$qs)
	{ ?>
    	<script>
			alert('Error');
		</script>
     <?php }		
?>
