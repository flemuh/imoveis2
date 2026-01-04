<?php
	@session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudmensagem.php');
	
	if (isset($_SESSION['logado'])) {
		
	//nome do funcionario
	 //$_SESSION['nome'] = $_POST["usuario"];
	 //echo'bem vindo';
	 //echo $_SESSION['nome'];
	}
	
	
	//require meta	
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
	

	//require classe usuario
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/mensagem.php');
			//carregando
		require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/telas/carregando.php');
	
	
	// Se o usuário clicou no botão cadastrar efetua as ações
	if ((isset($_POST["executar"])) ){
		
			$nome = strip_tags(trim ($_POST['nome']));
			$telefone = strip_tags(trim ($_POST['telefone']));
			$email = strip_tags(trim ($_POST['email']));
			$mensagem = strip_tags(trim ($_POST['mensagem']));
		

			$insert = crudmensagem::getInstance(Conexao::getInstance());
			$insert->mensagemincluir($nome, $telefone, $email, $mensagem);


			sleep(2);
			$meta= '<meta http-equiv="refresh" content="0, URL=contato.php"/>';	
			echo $meta;
		
	}
	

					
		
		
				
