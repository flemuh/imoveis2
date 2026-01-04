
<?php

class usuario{
	private $IDFuncionario;
	private $Nome;
	private $Nivel;
	private $Usuario;
	private $Senha;
	

function __construct(){}

public function setIDFuncionario($IDFuncionario){
	$this->IDFuncionario = $IDFuncionario;
}

public function setNome ($Nome){
	$this->Nome = $Nome;
}

public function setNivel ($Nivel){
	$this->Nivel = $Nivel;
}

public function setUsuario ($Usuario){
	$this-> Usuario= $Usuario;
}

public function setSenha ($Senha){
	$this->Senha= $Senha;
}

public function getIDFuncionario(){
	return $this->IDFuncionario;
}

public function getNome (){
	return $this->Nome ;
}

public function getNivel (){
	return $this->Nivel ;
}

public function getUsuario (){
	return $this->Usuario ;
}

public function getSenha (){
	return $this->Senha ;
}
	
}
	
	
	?>
	