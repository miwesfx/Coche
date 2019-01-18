<?PHP
/*--------------------------------------------------------------------------*/

//CLASE USUARIO
class Usuario {

	//Atributos
   var 	$username,$nombre,$apellidos;
		
	//Constructor
   function __construct($username)
   {
        $this->username = $username;
        
        $connect = conectarBD();
	    $acentos = $connect->query("SET NAMES 'utf8'");
		$resultado = mysqli_query($connect, "SELECT nombre,apellidos FROM usuarios WHERE username='".$this->username."'");
		$fila=$resultado->fetch_assoc();
		mysqli_close($connect);
        
        $this->nombre = $fila['nombre'];
        $this->apellidos = $fila['apellidos'];
   }

   //Métodos observadores
   function mostrar_username()			{	return $this->username;		}
   function mostrar_nombre()			{	return $this->nombre;		}
   function mostrar_apellidos()			{	return $this->apellidos;	}
										
}

/*--------------------------------------------------------------------------*/

//CLASE COCHE
class Coche {

	//Atributos
   var 	$matricula,$marca,$modelo,$color,$username;
		
	//Constructor
   function __construct($matricula)
   {
        $this->matricula = $matricula;
        
        $connect = conectarBD();
	    $acentos = $connect->query("SET NAMES 'utf8'");
		$resultado = mysqli_query($connect, "SELECT marca,modelo,color,username FROM coches WHERE matricula=".$this->matricula."");
		$fila=$resultado->fetch_assoc();
		mysqli_close($connect);
        
        $this->marca    = $fila['marca'];
        $this->modelo   = $fila['modelo'];
        $this->color    = $fila['color'];
        $this->username = $fila['username'];
   }

   //Métodos observadores
   function mostrar_matricula()		{	return $this->matricula;    }
   function mostrar_marca()			{	return $this->marca;	    }
   function mostrar_modelo()		{	return $this->modelo;	    }
   function mostrar_color()			{	return $this->color;	    }
   function mostrar_username()		{	return $this->username;	    }
										
}

/*--------------------------------------------------------------------------*/

//CLASE VIAJE
class Viaje {

	//Atributos
   var 	$fecha,$viajeros,$conductor,$doblaje,$matricula;
		
	//Constructor
   function __construct($fecha)
   {
        $this->fecha = $fecha;
        
        $connect = conectarBD();
	    $acentos = $connect->query("SET NAMES 'utf8'");
		$resultado = mysqli_query($connect, "SELECT viajeros,conductor,doblaje,matricula FROM viajes WHERE fecha=".$this->fecha."");
		$fila=$resultado->fetch_assoc();
		mysqli_close($connect);
        
        $this->viajeros     = $fila['viajeros'];
        $this->conductor    = $fila['conductor'];
        $this->doblaje      = $fila['doblaje'];
        $this->matricula    = $fila['matricula'];
   }

   //Métodos observadores
   function mostrar_fecha()	    	{	return $this->fecha;        }
   function mostrar_viajeros()		{	return $this->viajeros;	    }
   function mostrar_conductor()		{	return $this->conductor;    }
   function mostrar_doblaje()		{	return $this->doblaje;	    }
   function mostrar_matricula()		{	return $this->matricula;    }

   //Métodos modificadores
   function cambiar_viajeros($viajeros)     {   
        $connect = conectarBD();
        $acentos = $connect->query("SET NAMES 'utf8'");
        if($resultado = mysqli_query($connect, "UPDATE viajes SET viajeros = '$viajeros' WHERE fecha=".$this->fecha.""))
            $this->viajeros = $viajeros;
        mysqli_close($connect);         
    }

   function cambiar_conductor($conductor)   {   
        $connect = conectarBD();
        $acentos = $connect->query("SET NAMES 'utf8'");
        if($resultado = mysqli_query($connect, "UPDATE viajes SET conductor = '$conductor' WHERE fecha=".$this->fecha.""))
            $this->conductor = $conductor;
        mysqli_close($connect);
    }

   function cambiar_doblaje($doblaje)       {   
        $connect = conectarBD();
        $acentos = $connect->query("SET NAMES 'utf8'");
        if($resultado = mysqli_query($connect, "UPDATE viajes SET doblaje = '$doblaje' WHERE fecha=".$this->fecha.""))
            $this->doblaje = $doblaje;
        mysqli_close($connect);
    }

   function cambiar_matricula($matricula)   {   
    $connect = conectarBD();
    $acentos = $connect->query("SET NAMES 'utf8'");
    if($resultado = mysqli_query($connect, "UPDATE viajes SET matricula = '$matricula' WHERE fecha=".$this->fecha.""))
        $this->matricula = $matricula;
    mysqli_close($connect);
    }
										
}

/*--------------------------------------------------------------------------*/
?>