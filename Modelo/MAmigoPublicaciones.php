<?php
require '../Conexion/Conexion.php';

$conn=  conexionBD::getInstance();
$conn->conectarBD();
mysql_query("SET NAMES 'utf8'");
session_start();

$emailusuario=$_SESSION['email'];
$_SESSION['idamigo'];

$query1="SELECT nombre,apellido,email,fotos FROM usuario WHERE iduser='".$_SESSION['idamigo']."'";
    $resulta = mysql_query($query1);
    $userf=  mysql_fetch_array($resulta);


$query="SELECT idpub,email,texto,imagen,video,fecha FROM publicaciones WHERE  enperfilde='".$userf['email']."' ORDER BY  fecha DESC";
   ?>




<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=charset=iso-8859-1">
        <link type="text/css" rel="stylesheet" href="../js/floatboxchat/floatbox.css" />
        <script src="../js/floatboxchat/framebox.js" type="text/javascript"></script>
    </head>
    <body>
<!--        <div>TODO write content</div>
        <a href="http://youtube.com/v/afxBrWGuPsw" rel="floatbox" rel="floatbox" rev="width:825 height:550 scrolling:no" >ENLACE</a>
        <a href="https://www.youtube.com/watch?v=afxBrWGuPsw" rel="floatbox">EE</a>-->

<?php
               $result = mysql_query($query);
    //$user=  mysql_fetch_array($result);
               
    $i=1;           
    while($row = mysql_fetch_array($result)){
        $emapub=$row['email'];
    
          $query2="SELECT nombre,apellido,fotos FROM usuario WHERE email='".$emapub."'";
        $resulta2 = mysql_query($query2);
        $userf2=  mysql_fetch_array($resulta2);
    
    //echo $i;
    
        
    ?>

        

        &nbsp;&nbsp;
       
            
        <img src="<?php echo ($userf2['fotos']) ;?>" width="50" height="60"/>
            
        <label  id="idp<?php echo $i ;?>" style="color: white; font-size: 0px"><?php echo $row['idpub']; ?></label>
        <label id="ema<?php echo $i ;?>" style="color: white; font-size: 0px"><?php echo $row['email']; ?></label>
        
        
        <label style=" font-size:12px; color: white; float: right"><?php echo $userf2['nombre']." ".$userf2['apellido'] ;?></label>
        </br>
        &nbsp;&nbsp;<?php echo $row['texto']; ?>
        </br>
        </br>
        
        <?php
        if ($row['imagen']!='no')
        {
            $vima=$row['imagen'];
            //echo $vima;
            ?>
          
        <a href='<?php echo $vima ?>' rel='floatbox'><button type='submit' class='buttons'   id='imagen' name='image'>
            <img src='<?php echo $vima ?>' height='10px' width='10px' />Imagen
            </button></a>
        <?php } ?>
        
        
        
        
        
        
        <?php
        if ($row['video']!='')
        {
            $vid=$row['video'];
            //echo $vima;
            ?>
            
            <a href='http://youtube.com/v/<?php echo $vid ?>' rel='floatbox'  rev="width:825 height:550 scrolling:no"><button type='submit' class='buttons'  id='imagen' name='image'>
                    <img src='../imagenes/youtube1.png' height='10px' width='10px' />Video
            </button></a>
        
            
        <?php  } ?>
        
        
        
        
        
        
        <button type="submit" class="buttons"   name="come" onclick="Comentar('idp<?php echo $i ;?>', 'ema<?php echo $i ;?>')" id="comt" >
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/comentario.png " height="10px" width="10px" alt=""/>&nbsp;&nbsp;Comentar 
        </button>
        
        <button type="submit" class="buttons"   name="come" onclick="Eliminar('idp<?php echo $i ;?>', 'ema<?php echo $i ;?>')" id="elim" >
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/comentario.png " height="10px" width="10px" alt=""/>&nbsp;&nbsp;Eliminar
        </button>
        
        
        <label style='color:#fff; font-size:10px;float:right'> <?php echo $row['fecha'] ?></label>
        </br>
        <HR width=100% align="center">
        </br>
    <?php 
    $i=$i+1;
    } 
// include '../Modelo/MAmigoEliminarPublicaciones.php';
    ?>
       

    </body>
    


      <script type="text/javascript">
       var idd;
       var emma;
      function Comentar(i,e)
      {  
          idd=document.getElementById(i).innerHTML;
          emma=document.getElementById(e).innerHTML;
      };
      $('[id^="comt"]').click(function(){
//          alert(idd+emma);
            //$.post('../Modelo/PasarPubs.php', {i:idd,e:emma})
            location.href='../Vista/FAmigoComentarios.php?id='+idd+'&email='+emma;
            });
  </script>
  
  
  <script type="text/javascript">
       var idd;
       var emma;
      function Eliminar(i,e)
      {  
          idd=document.getElementById(i).innerHTML;
          emma=document.getElementById(e).innerHTML;
      };
      $('[id^="elim"]').click(function(){
//          alert(idd+emma);
            //$.post('../Modelo/PasarPubs.php', {i:idd,e:emma})
            location.href='../Modelo/MAmigoEliminarPublicaciones.php?id='+idd+'&email='+emma;
            });
  </script>
  
  
    
</html>

