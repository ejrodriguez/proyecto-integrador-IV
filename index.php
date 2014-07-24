<?php

require 'Conexion/Conexion.php';
session_start();
$conn=  conexionBD::getInstance();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Red Social</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" />

<link type="text/css" rel="stylesheet" href="css/easy-responsive-tabs.css" />
<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>




<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<style>
 .aside1 {
	float: right;
	width: 25%;
	margin: 50px 0 12px 0;
	background-color: #0080FF;
	padding: 10px 0;
        border-radius: 8px;
}
#es{
    width: 2px;
}

.demo {
            width: 100%;
            margin: 0px auto;
            
        }
        .demo h1 {
                margin:33px 0 25px;
            }
        .demo h3 {
                margin: 10px 0;
            }
        pre {
            background: #fff;
        }
        @media only screen and (max-width: 780px) {
        .demo {
                margin: 5%;
                width: 90%;
         }
        .how-use {
                float: left;
                width: 300px;
                display: none;
            }
        }
        #tabInfo {
            display: none;
        }
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header>
       <div style="float: right;"><strong><h1 style="color: #fff;">Social System</h1></strong></div>
    <a href="#"><img src="imagenes/FIE.JPG" alt="Insertar logotipo aquí" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
    <!--<strong><h1 style="color: #fff;left: 60%;">Social System</h1></strong>-->
     
  </header>
  <article id="art">
      <div id="es"></div>
      <div class="demo">
              
        
        <!--Horizontal Tab-->
        
        <div id="horizontalTab">
            
            <ul class="resp-tabs-list">
                <li>EIS</li>
                <li>Carrera</li>
                <li>Misión</li>
                <li>Visión</li>
                <li>Objetivos</li>
                <li>Conocenos</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
                    <center><img src="imagenes/eis.JPG" height="200px" width="200px"/></center>
                </div>
                <div>
                    <p align="justify"> La importancia de la Carrera radica en que sus profesionales graduados deberán resolver con el apoyo de las Ciencias Básicas de la Ingeniería, problemas relacionados con Ingeniería de Software, el Análisis y Diseño de Sistemas de Información, Administración de Proyectos Informáticos, Redes de Información e Interconectividad, Consultorías Informáticas e Investigación Científica y Técnica. </p><br>
                    <p align="justify"> La Escuela de Ingeniería de Sistemas de la Facultad de Informática y Electrónica FIE es una unidad académica comprometida con los más altos intereses de la sociedad. En todos los ámbitos institucionales y de la opinión pública se reconoce la importancia y la influencia en la formación de recursos humanos, producción y divulgación de conocimiento científico técnico.</p>
                </div>
                <div>
                    <p align="justify">Formar Ingenieros en Sistemas Informáticos competentes, emprendedores, consientes de su identidad nacional, justicia social, democracia y preservación del ambiente sano, através de la construcción, transmisión, adaptación y aplicación del conocimiento científico y tecnológico para contribuir al desarrollo sustentable del país en concordancia con los objetivos del Plan Nacional para el Buen Vivir.</p>
                </div>
                <div>
                    <p align="justify">Ser líderes en la formación de Ingenieros en Sistemas Informáticos y generación de ciencias y tecnologías para el desarrollo humano integral, con reconocimiento nacional e internacional. </p>
                </div>
                <div>
                    <h4>General</h4>
                    <p align="justify">Formar Ingenieros en Sistemas Informáticos competentes y emprendedores a través de la construcción, transmisión, adaptación y aplicación del conocimiento científico y tecnológico en el área de sistemas informáticos para contribuir al desarrollo sustentable del país en concordancia con los objetivos del Plan Nacional para el Buen Vivir. </p><br>
                    <h4>Especificos</h4>
                    <p align="justify"> • Aplicar conocimientos específicos de Ma temática y Física en la Ingeniería de Sistemas Informáticos.</p>
                    <p align="justify"> • Conceptualizar problemas de sistematización de información y evaluar la factibilidad de las alternativas de soluciones informáticas.</p>
                    <p align="justify"> • Emprender y gestionar proyectos de software.</p>
                    <p align="justify"> • Aplicar habilidades e identificar técnicas y herramientas tecnológicas en el desarrollo de sistemas informáticos.</p>
                    <p align="justify"> • Trabajar efectivamente en equipo para lograr los objetivos y metas de un proyecto.</p>
                    <p align="justify"> • Tomar decisiones legales y éticas con responsabilidad profesional, ambiental y social.</p>
                    <p align="justify"> • Interactuar con su entorno a través de una comunicación efectiva.</p>
                    <p align="justify"> • Actualizar sus conocimientos continuamente para su desarrollo profesional y personal.</p>
                    <p align="justify"> • Analizar los temas contemporáneos y su vinculación con la sociedad y profesión.</p>
                </div>
                <div>
                    <center>
                        <object width="640" height="360"><param name="movie" value="//www.youtube.com/v/6pUQhlrhSX4?hl=es_MX&amp;version=3&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/6pUQhlrhSX4?hl=es_MX&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="640" height="360" allowscriptaccess="always" allowfullscreen="true"></embed></object></center>
                </div>
            </div>
        </div>
        <br />


        <br />
        <div style="height: 30px; clear: both"></div>
        

    </div>
      
      
      
      
</article>
  <aside class="aside1">
    <h4 style="color: #fff;">Ingresar</h4>
    <form action="Modelo/Mlogin.php" method="post">
    <center>
        
        <strong><label style="color: #fff;">E-mail: </label></strong>
        <input type="text" id="lusuario" name="loguser" required/>
     <br>
     <strong><label style="color: #fff;">Clave: </label></strong>
     <input type="password" id="lclave" name="logclave"  required/>
        
     </center>
        </br>
    <center>
        <button type="submit" class="buttons"  id="lingresar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="imagenes/login.gif" height="20px" width="20px" alt=""/>Ingresar
    </button>
        </center>
        </form>
    <center>
        <a href="Vista/Registro.php"><button type="submit" class="buttons"  id="registrar" name="submit" >
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
    <img src="imagenes/registro.gif" height="20px" width="20px" alt=""/>Registrarse
            </button></a>
    </center>
    
    
        
    <div id="informacion"></div>
  </aside>
    
  <footer>
    <!--<p>Este footer contiene la declaración position:relative; para dar a Internet Explorer 6 hasLayout para footer y provocar que se borre correctamente. Si no es necesario proporcionar compatibilidad con IE6, puede quitarlo.</p>-->
    <address>
        <center><strong><label style="color: #fff;">Contáctanos</label></strong></center>
        
    </address>
  </footer>
</div>
    

    
    
    
</body>



<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
</html>

