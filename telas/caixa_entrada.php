<?php
	@session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/dao/bd.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/dao/crudmensagem.php');
	
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
				<?php
@session_start();
if(isset($_SESSION['logado'])){
 
 if($_SESSION['logado'] = 1){
	 
	  ?>
  <li><a href='loginsair.php'>Sair</a></li>
  <?php
 }
}
?>
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
					
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
					<tr style="color:FFF; background:#666;">
						<td align="center">DATA:</td>
						<td align="center">STATUS:</td>
						<td align="center">NOME:</td>
						<td align="center">E-MAIL:</td>
						<td align="center">TELEFONE:</td>
						<td align="center"></td>
						<td align="center">VISUALIZAR:</td>
					</tr>
					<?php
					
					//consulta mensagens
					$mensagem = crudmensagem::getInstance(Conexao::getInstance());
					$dados = $mensagem->mensagens();
					foreach ($dados as $item):
					
					$mensagem_id = $item->IDMENSAGEM;
					$mensagem_nome = $item->NOME;
					$mensagem_email = $item->EMAIL;
					$mensagem_telefone = $item->TELEFONE;
					$mensagem_mensagem = $item->MENSAGEM;
					$mensagem_data = $item->DATA;
					$mensagem_status = $item->STATUS;
		
					
					//fun��o cores mensagem
					if($mensagem_status == ''){
						$cor = 'style="background:#E6FFF2"';
										?>
										
					<form name="cadastraimovel" method="post" action="" enctype="multipart/form-data">					
					<tr <?php echo $cor;?>>
						<td align="center"><?php echo date('d/m/Y H:m',strtotime($mensagem_data));?>h</td>
						<td align="center"><?php echo $mensagem_status;?></td>
						<td align="center"><?php echo $mensagem_nome;?></td>
						<td align="center"><?php echo $mensagem_email;?></td>
						<td align="center"><?php echo $mensagem_telefone;?></td>
						<td align="center"><input type="hidden" name="id_mensagem" value="<?php  echo $mensagem_id;?>" /></td>
						
						<td align="center"><a name="executar" id="executar" href="resposta.php?id_mensagem=<?php echo $mensagem_id;?>">Visualizar</a></td>
						
					</tr>
					</form>
					<?php
					}
					
					else{
						$cor = 'style="background:#f4f4f4"';
						
						?>
								<form name="cadastraimovel" method="post" action="" enctype="multipart/form-data">		
					<tr <?php echo $cor;?>>
						<td align="center"><?php echo date('d/m/Y H:m',strtotime($mensagem_data));?>h</td>
						<td align="center"><?php echo $mensagem_status;?></td>
						<td align="center"><?php echo $mensagem_nome;?></td>
						<td align="center"><?php echo $mensagem_email;?></td>
						<td align="center"><?php echo $mensagem_telefone;?></td>
						<td align="center"><input type="hidden" name="id_mensagem" value="<?php  echo $mensagem_id;?>" /></td>
						<td align="center"><a href="resposta.php?id_mensagem=<?php echo $mensagem_id;?>">Visualizar</a></td>
					</tr>
						</form>
					<?php
					}
					
					
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

