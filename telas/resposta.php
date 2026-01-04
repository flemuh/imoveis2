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
	//require banco conex�o
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
	//require classe usuario
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
	//require crud do usuario
	require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');
	?>
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
				<?php
				//require logo
				require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/logo.html');
				?>
				</div>
			</div>

			<div class="col-md-7">
				<div class="fone">
				<a>Telefone: 4487-0349</a>
				</div>
			</div>
		</div>
		<div class="row">
		
		<div class="img1">
			
				<div class="col-md-3">
				<?php
				//require Menu
				require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/menu.php');
				?>
				</div>
				
				  <div class="col-sm-6">
					
					<table width="100%" border="0" cellspacing="5" cellpadding="0">
					<tr style="color:FFF; background:#666;">
						<td align="center">DATA:</td>
						<td align="center">NOME:</td>
						<td align="center">E-MAIL:</td>
						<td align="center">TELEFONE:</td>
					</tr>
			
			
					<?php
					
					
					
					//GET ID MENSAGEM NO LINK
					$idmensagem_visualizar = $_GET['id_mensagem'];
					
					
					
					//consulta mensagens
					$mensagemvisualizar = crudmensagem::getInstance(Conexao::getInstance());
					$dados = $mensagemvisualizar->mensagemvisualizar($idmensagem_visualizar);
					foreach ($dados as $item):
					
					$mensagem_nome = $item->NOME;
					$mensagem_email = $item->EMAIL;
					$mensagem_telefone = $item->TELEFONE;
					$mensagem_mensagem = $item->MENSAGEM;
					$mensagem_data = $item->DATA;
					$mensagem_status = $item->STATUS;
		
					
					$mensagematualizar = crudmensagem::getInstance(Conexao::getInstance());
					$dados = $mensagematualizar->mensagematualizar($idmensagem_visualizar);
					
					?>
					<tr>
						<td align="center"><?php echo date('d/m/Y H:m',strtotime($mensagem_data));?>h</td>
						<td align="center"><?php echo $mensagem_nome;?></td>
						<td align="center"><?php echo $mensagem_email;?></td>
						<td align="center"><?php echo $mensagem_telefone;?></td>
					<tr/>
					<tr style="color:FFF; background:#666;">
						<td align="center">MENSAGEM:</td>
					</tr>
					<tr>
						<td align="center"><?php echo $mensagem_mensagem;?></td>					
						<td align="center"><a href="caixa_entrada.php">Voltar</a></td>
					</tr>
					
					<?php
					endforeach; 
					?>
					</table>
					
					
                  </div>
					
			</div>
			
		</div>
		
	</div>
	
		<?php
	//require rodape
	//require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/PDOsefras/html/footer.php');
	?>
