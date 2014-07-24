<?php


?>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Red Social</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="../css/estilotab.css" type="text/css" media="screen" />-->
<!--<link rel="stylesheet" href="../js/floatbox/floatbox.css" type="text/css" media="screen" />-->
<script type="text/javascript" src="../js/jquery.js"></script>
<style>
    #ti
    {
        background-color: #fff;
        color: #039;
    }
    #c
    {
        /*background-color: #039;*/
        color: #fff;
    }
</style>
</head>
<body>
    <div id="ti">
    <center><h1>Social System</h1>
    <h4>Comparte tus fotos</h4></center>
        <br>
        <br><br>
        
        
    </div>
    <div id="c">
        <br><br>
         <center>   
             <form action="MprocesarFotos.php" enctype="multipart/form-data" method="post">
        <label for="imagen">Imagen:</label>
        <input id="imagen" name="imagen" size="30" type="file" />
        <input name="submit" type="submit" value="Guardar" />
        </form>
         </center>
    </div>
</body>
</html>