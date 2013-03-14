<?
//Creo clase para un cliente
class cliente {
	var $rut;
    var $nombre;
    var $telefono;
 	var $correo;
	var $tcliente;
	var $direccion;
	var $comuna;
	var $codsol;
	
	//Setter 
	public function setRut( $value ) {  
	    $this->rut = $value;  
	}  

	public function setNombre( $value ) {  
	    $this->nombre = $value;  
	}
	
	public function setTelefono( $value ) {  
	    $this->telefono = $value;  
	}
	
	public function setCorreo( $value ) {  
	    $this->correo = $value;  
	}
	
	public function setTcliente( $value ) {  
	    $this->tcliente = $value;  
	}
	
	public function setDireccion($value ) {  
	    $this->direccion = $value;  
	}

	public function setComuna($value ) {  
	    $this->comuna = $value;  
	}
	
	public function setCodsol($value ) {  
	    $this->codsol = $value;  
	}
				
	//Getter
	public function getRut()  
	{  
	    return $this->rut;  
	}
	
	public function getNombre()  
	{  
	    return $this->nombre;  
	}

	public function getTelefono()  
	{  
	    return $this->telefono;  
	}

	public function getCorreo()  
	{  
	    return $this->correo;  
	}

	public function getTcliente()  
	{  
	    return $this->tcliente;  
	}

	public function getDireccion()  
	{  
	    return $this->direccion;  
	}	



	public function getComuna()  
	{  
	    return $this->comuna;  
	}	

	public function getCodsol()  
	{  
	    return $this->codsol;  
	}	
	

	
}

?>