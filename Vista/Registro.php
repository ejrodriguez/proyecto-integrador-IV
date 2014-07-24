<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Red Social</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/jquery.js"></script>
<style>
 .aside1 {
	float: right;
	width: 300px;
	margin: 5px 0 12px 0;
	background-color: #188bc2;
	padding: 10px 0;
        border-radius: 8px;
        color: #fff;
}
#info
{
    /*background-color: #188bc2;*/
    width: 300px;
}
.lab
{
    color: white;
}
#regis
{
    height: 110px;
/*    left: 13%;*/
        
}
#datos
{
   background-color: #188bc2;
   border-radius: 15px;
   left: 3px;
   width: 80%;
/*    left: 13%;*/
        
}
.sidebar11
{
    background-color: white;
    width: 100px;
    float: left;
}
</style>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header>
      <div style="float: right;"><strong><h1 style="color: #fff;">Social System</h1></strong></div>
      <a href="../index.php"><img src="../imagenes/FIE.JPG" alt="Insertar logotipo aquí" width="180" height="90" id="Insert_logo" style="background-color: #0A99E7; display:block;" /></a>
  </header>
    <div class="sidebar11">
        <img src="../imagenes/blanco.png" />
    </div>
  <article class="content">
      <center><h1>Bienvenido a formar parte de Social System</h1></center>
      <label>Informacion</label>
    <div id="datos">
    <table>
        <caption class="lab">
        Tus datos
        </caption>
        <tr>
            <td><label class="lab">Nombre:</label></td>
            <td><input  type="text"  id="nombre" /></td>
            <td><label class="lab">Apellido:</label></td>
            <td><input type="text" id="apellido" /></td>
        </tr>
        <tr>
            <td><label class="lab">E-mail:</label></td>
            <td><input type="text" id="email" /></td>
            <td><label class="lab">Repita E-mail:</label></td>
            <td><input type="text" id="reemail" /></td>
        </tr>
        <tr>
            <td><label class="lab">Contraseña:</label></td>
            <td><input type="password" id="pass" /></td>
            <td><label class="lab">Repita Contraseña:</label></td>
            <td><input type="password" id="repass" /></td>
        </tr>
        <tr>
            <td><label class="lab">Fecha de Nacimiento:</label></td>
<!--            <td><label>Dia:</label></td>-->
            
            <td> <select id="dia">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">20</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select> </td>
            <!--<td><label>Mes:</label></td>-->
            <td> <select id="mes">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select> </td>
            <td> <select id="anio">
            <!--<option value="2005">2005</option>-->
                          
                           <option value="2005">2005</option>
                           <option value="2004">2004</option>
                           <option value="2003">2003</option>
                           <option value="2002">2002</option>
                           <option value="2001">2001</option>
                           <option value="2000">2000</option>
                           <option value="1999">1999</option>
                           <option value="1998">1998</option>
                           <option value="1997">1997</option>
                           <option value="1996">1996</option>
                           <option value="1995">1995</option>
                           <option value="1994">1994</option>
                           <option value="1993">1993</option>
                           <option value="1992">1992</option>
                           <option value="1991">1991</option>
                           <option value="1990">1990</option>
                           <option value="1989">1989</option>
                           <option value="1988">1988</option>
                           <option value="1987">1987</option>
                           <option value="1986">1986</option>
                           <option value="1985">1985</option>
                           <option value="1984">1984</option>
                           <option value="1983">1983</option>
                           <option value="1982">1982</option>
                           <option value="1981">1981</option>
                           <option value="1980">1980</option>
                           <option value="1979">1979</option>
                           <option value="1978">1978</option>
                           <option value="1977">1977</option>
                           <option value="1976">1976</option>
                           <option value="1975">1975</option>
                           <option value="1974">1974</option>
                           <option value="1973">1973</option>
                           <option value="1972">1972</option>
                           <option value="1971">1971</option>
                           <option value="1970">1970</option>
                           <option value="1969">1969</option>
                           <option value="1968">1968</option>
                           <option value="1967">1967</option>
                           <option value="1966">1966</option>
                           <option value="1965">1965</option>
                           <option value="1964">1964</option>
                           <option value="1963">1963</option>
                           <option value="1962">1962</option>
                           <option value="1961">1961</option>
                           <option value="1960">1960</option>
                           <option value="1959">1959</option>
                           <option value="1958">1958</option>
                           <option value="1957">1957</option>
                           <option value="1956">1956</option>
                           <option value="1955">1955</option>
                           <option value="1954">1954</option>
                           <option value="1953">1953</option>
                           <option value="1952">1952</option>
                           <option value="1951">1951</option>
                           <option value="1950">1950</option>
            
        </select> </td>
            <!--<td><label>Año:</label></td>-->
        </tr>
        <tr>
            <td>
                <label class="lab"> Genero: </label>
            </td>
            <td>
<!--                <input  class="lab" type="radio" name="sexo" value="Mujer" /><label class="lab"> Mujer</label>
            <input class="lab" type="radio" name="sexo"  value="Hombre" /><label class="lab"> Hombre</label>-->
                <select id="genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </td>
        </tr>
        <tr><br></tr>
        <tr><br></tr>
        
    </table>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="submit" class="buttons"  id="registrar" name="submit">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/registro.gif" height="20px" width="20px" alt=""/>Registrar</button>
    <div id="info">
        
    </div>
    <div id="regis">
    </div>
    </article>
  <aside class="aside1">
    <h4>Ingresar</h4>
    <form action="../Modelo/Mlogin.php" method="post">
    <center>
        
        <label>E-mail: </label>
        <input type="text" id="lusuario" name="loguser" required/>
     <br>
     <label>Clave: </label>
     <input type="password" id="lclave" name="logclave"  required/>
        
     </center>
        </br>
    <center>
        <button type="submit" class="buttons"  id="lingresar" name="ingreso">
            <!--input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" -->
            <img src="../imagenes/login.gif" height="20px" width="20px" alt=""/>Ingresar
    </button>
<!--        <a href="Vista/Registro.php"><button type="submit" class="buttons"  id="registrar" name="submit" >
            input class="buttons" type="submit"  name="submit" onclick="datos('idpadre','idhijo','inicio','fin')" id="button"  value="Buscar" 
    <img src="imagenes/registro.gif" height="20px" width="20px" alt=""/>Registrarse
            </button></a>-->
    </center>
    </form>
  </aside>
  <footer>
    <!--<p>Este footer contiene la declaración position:relative; para dar a Internet Explorer 6 hasLayout para footer y provocar que se borre correctamente. Si no es necesario proporcionar compatibilidad con IE6, puede quitarlo.</p>-->
    <address>
      <center><strong><label style="color: #fff;">Contáctanos</label></strong></center>
    </address>
  </footer>
<!-- end .container --></div>
    
    
     <script type="text/javascript">
      $('#registrar').click(function()
    {
        var nombre=$('#nombre').val();
        var apellido=$('#apellido').val();
        var email=$('#email').val();
        var reemail=$('#reemail').val();
        var pass=$('#pass').val();
        var repass=$('#repass').val();
        var dia=$('#dia').val();
        var mes=$('#mes').val();
        var anio=$('#anio').val();
        var genero=$('#genero').val();
        
        $('#info').load("../Modelo/MRegistro.php",{nom:nombre,ape:apellido,ema:email,reema:reemail,cla:pass,recla:repass,d:dia,m:mes,a:anio,gen:genero});
        


    });

  </script>
</body>
</html>
