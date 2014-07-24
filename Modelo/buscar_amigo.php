<style>
.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
{
padding:2px;
padding-left:6px; 
font-size:18px;
height:63px;
color:#3b5999; 
}

.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
{
background: #7f93bc;
color: #FFF;
}
</style>

<?php
 
      $buscar = $_POST['consulta'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($consulta) {
            require '../Conexion/Conexion.php';
$conn=  conexionBD::getInstance();
$conn->conectarBD();
       session_start();
       
            $sql = mysql_query("SELECT iduser,nombre,apellido,fotos FROM usuario WHERE email != '".$_SESSION['email']."' AND CONCAT_WS(' ', nombre, apellido) LIKE '%".$consulta."%' ");
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$consulta."</b>'.";
            }else{
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['nombre'];
                        $apellido = $row['apellido'];
						$buscar = $row['iduser'];
						$foto=$row['fotos'];
                         ?>
                         
                        <a href="../Vista/perfil_amigo.php?amigo=<?php echo $buscar ?>" style="text-decoration:none;"> 
						<div id="display_box" align="left" >
                        <div style="float:left; margin-right:6px;"><img src="<?php echo $foto?>" width="30" height="30" /></div>
						<div style="margin-right:6px;"><b><?php echo $nombre." ".$apellido."<br /><br />";?> </b></div></div></a> <?php  
                  }
            }
      }
       
?>
