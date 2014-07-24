<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 class conexionBD{
   


//     //Atributos Basicos de la clase..localmente
private $servidor="localhost"; //Nombre de la maquina donde se encuentra la BD generalmente es localhost
private $nombreBD="redsocial"; //Nombre de la Base de Datos
private $nombreDeUsuario="root"; //Nombre del usuario autorizado para entrar a la Base de Datos
private $contrasena=""; //Contraseña del Usuario


//Atributos Modificados
private $enlace;//Almacena el enlace con la Base de Datos una vez establecido
private $resultado;//Almacena el resultado obtenido por la consulta a la BD
private $consulta;//Almacena la consulta realizada con el metodo consultaBD();
static private $instance_conn = null;

//Constructor de la Clase

//Inicializa algunos atributos Básicos
private  function __construct() {  }

public function conectarBD(){

			$this->enlace = mysql_connect($this->servidor,$this->nombreDeUsuario,$this->contrasena);
			if($this->enlace)
		{
				if(mysql_select_db($this->nombreBD,$this->enlace))
				{
					//echo "Base de datos seleccionada Correctamente";
				}
				else
					{
						echo "Error al seleccionar la base de datos!";
							exit();
					}
		}
		else
				{
						echo "Error al enlazar al Servidor! ";
                                                echo $this->servidor; echo "";
                                                echo $this->nombreDeUsuario; echo "";
                                                echo $this->contrasena;
						exit();
				}

}

public static function getInstance() {
        if (self::$instance_conn == null) {
            self::$instance_conn = new conexionBD();
        }
        return self::$instance_conn;
    }



public function consultarBD($sentenciaSQL){
 
		$this->consulta=  mysql_query($sentenciaSQL,$this->enlace) or  die(mysql_error());
               

		}


public function obtenerResultado(){
				$this->resultado=mysql_fetch_array($this->consulta)or die(mysql_error());;
				return $this->resultado;
				}



public function liberarConsulta(){

			mysql_free_result($this->consulta)or die(mysql_error());


			}

public function  numerodeFilas()
{
    $fil = mysql_num_rows($this->consulta) or die(mysql_error()) ;
    return $fil;
}

public function terminarConexion()
{
    mysql_close($this->enlace);
}

    
}
        




//require '../../Acceso/clConexion.php';
//$conn=  conexionBD::getInstance();
//$conn->conectarBD();
////$_SESSION['user']='0603189655';
//    $query="SELECT NOMBRES,EMAIL FROM empleado WHERE CI='".$_SESSION['user']."'";
//    $result = mysql_query($query);
//    $user=  mysql_fetch_array($result);
?>