<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../js/floatboxchat/floatbox.css" type="text/css" media="screen" />
<script>
	$(document).ready(function(){
  		m=$("#amigo").val();
 		$("button").click(function(){
  			$("#myDiv").show();//muestra el div	
    		n=""+$("#mensaje").val();
			m=$("#amigo").val();
			p=$("#user").val();
    		$.ajax({url:"insertar_chat.php",cache:false,type:"POST",data:{men:n,ami:m,usr:p},success:function(result){
      			$("#myDiv").html(result);
	  			$("#chat").load("mensajes.php?ami="+m);
    		}});
 			$("#chat").load("mensajes.php?ami="+m);
   		});
   		$("#chat").load("mensajes.php?ami="+m);
	});
</script>

<style>
	#cap{
   		float: left;
       	padding: 10px;
       	height: auto;
       	width: 100%;
  		overflow: auto;
    }
</style>

<html>
<body>
<?php 
	require '../Conexion/Conexion.php';
	$conn=  conexionBD::getInstance();
	$conn->conectarBD();
	session_start(); 
        mysql_query("SET NAMES 'utf8'");
	$query="SELECT nombre,apellido FROM usuario WHERE email='".$_GET['ami']."'";
    $result = mysql_query($query);
    $user= mysql_fetch_array($result);
	?>  
	<label><b><font color="#FFFFFF">Chat con <?php print ($user['nombre']." ".$user['apellido']); ?></font></b></label>
	<textarea id="mensaje" style="width:280px;" size="40" maxlength="250"> </textarea>
    <button style="width:280px; height:40px;"><b> Enviar Mensaje</b></button>
 	<input hidden id="user" type="text" value="<?php print $_SESSION['email']; ?> " size="40" maxlength="250" />
 	<input hidden id="amigo" type="text" value="<?php print $_GET['ami']; ?>"  size="40" maxlength="250" />
	
	<div style="width:350px;" id="myDiv" ></div>
	<div style="width:350px;" id="chat"></div>
</body>
</html>


