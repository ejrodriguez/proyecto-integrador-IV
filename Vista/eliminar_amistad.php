
<?php
require '../Conexion/Conexion.php';

	$conn=  conexionBD::getInstance();
	$conn->conectarBD();
	$q="DELETE FROM solicitudes WHERE (emailamigo='".$_POST['user']."' AND email='".$_POST['amig']."') OR (email='".$_POST['user']."' AND emailamigo='".$_POST['amig']."')";
   	$qs=mysql_query($q);
	$q_e="DELETE FROM amigos WHERE (emailamigo='".$_POST['user']."' AND email='".$_POST['amig']."') OR (email='".$_POST['user']."' AND emailamigo='".$_POST['amig']."')";
   	$qs_e=mysql_query($q_e);
	if (!$qs)
	{ ?>
    	<script>
			alert('Error');
		</script>
     <?php }		
?>
