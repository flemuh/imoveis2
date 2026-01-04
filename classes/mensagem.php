
<?php

class usuario{
	private $Nome;
	private $Telefone;
	private $Email;
	private $Mensagem;


function __construct(){}

public function setNome($Nome){
	$this->Nome = $Nome;
}

public function setTelefone ($Telefone){
	$this->Telefone = $Telefone;
}

public function setEmail ($Email){
	$this->Email = $Email;
}

public function setMensagem ($Mensagem){
	$this-> Mensagem= $Mensagem;
}


public function getNome(){
	return $this->Nome;
}

public function getTelefone (){
	return $this->Telefone ;
}

public function getEmail (){
	return $this->Email ;
}

public function getMensagem (){
	return $this->Mensagem ;
}

	
}
	
	
	?>
	