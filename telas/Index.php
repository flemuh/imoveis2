<?php
	@session_start();
	
	if (isset($_SESSION['logado'])) {
		
	//nome do funcionario
	 //$_SESSION['nome'] = $_POST["usuario"];
	 //echo'bem vindo';
	 //echo $_SESSION['nome'];
	}
	
	
	//require meta	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
	//require banco conex�o
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
	//require classe usuario
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
	//require crud do usuario
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');
	//require home	
	//require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/telas/home.php');



	
	//require rodape
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/PDOsefras/html/footer.php');
	?>
