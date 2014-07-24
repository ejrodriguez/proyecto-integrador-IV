<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//Informaci�n del Usuario
mysql_query("SET NAMES 'utf8'");
    $query="SELECT fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE email='".$_SESSION['email']."'";
    $result = mysql_query($query);
    $user=  mysql_fetch_array($result);
	//Informaci�n del perfil
	$query_perfil="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$_SESSION['email']."'";
    $resultado = mysql_query($query_perfil);
    $perfil=  mysql_fetch_array($resultado);
	
	$qa="SELECT emailamigo, email FROM amigos WHERE email='".$_SESSION['email']."' OR emailamigo='".$_SESSION['email']."'";
	$qsql = mysql_query($qa);	
?>

<style>
	#divchat{
		overflow:auto;
		height:400px;
		background:#FFF;
	}
	#sobre:hover{
		text-decoration:none;
		background:#0CF;
	}
</style>

	<div id="divchat">
    	<center><b>Social Chat</b></center>
         <HR width=90% align="center">
      	<table>
       		<?php while ($fila = mysql_fetch_array($qsql)) {
				//Informaci�n del Usuario
				if ($_SESSION['email']==$fila[1]){
					$mail=$fila[0];}
				else{
					$mail=$fila[1];
				}
				$query1="SELECT email, fechanac,nombre,sexo,fotos,apellido FROM usuario WHERE email='".$mail."'";
				$result1 = mysql_query($query1);
				$user1=  mysql_fetch_array($result1);
				//Informaci�n del perfil
				$query_perfil1="SELECT direccion,edocivil,ocupacion,estudios,ciudad FROM perfil WHERE email='".$mail."'";
				$resultado1 = mysql_query($query_perfil1);
				$perfil1=  mysql_fetch_array($resultado1);
				?>
				<tr id="sobre">
					<td><img src="<?php echo $user1['fotos'];?>" width="30" height="30" /></td>
					<td><a href="../Vista/chat.php?ami=<?php print $mail;?>" rel="floatbox1" style="text-decoration:none;"><font color="#000000"><?php printf($user1['nombre']." ".$user1['apellido']);?></font></a></td>
				</tr>
      		<?php }?>
    	</table>
 	</div>
 