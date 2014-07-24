
<?php
require '../Conexion/Conexion.php';

	$conn=  conexionBD::getInstance();
	$conn->conectarBD();
	//Fecha
	date_default_timezone_set('America/Guayaquil');
	$fech=date("Y-m-d");
	$q="UPDATE solicitudes SET fecha='".$fech."',status='2' WHERE emailamigo='".$_POST['user']."' AND email='".$_POST['amig']."'";
	
   	$qs=mysql_query($q);
	$q_i="INSERT INTO amigos( email, emailamigo) VALUES ('".$_POST['user']."','".$_POST['amig']."')";
	$qs_i=mysql_query($q_i);
	if (!$qs)
	{ ?>
    	<script>
			alert('Error');
		</script>
     <?php }		
?>
