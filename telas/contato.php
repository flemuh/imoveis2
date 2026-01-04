<?php
	@session_start();
	
	if (isset($_SESSION['logado'])) {
		
	//nome do funcionario
	 //$_SESSION['nome'] = $_POST["usuario"];
	 //echo'bem vindo';
	 //echo $_SESSION['nome'];
	}
	
	//carregando
			require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/telas/carregando.php');
	
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
                       <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="enviarmsg.php" role="form">
                             <h1>Formul�rio de Contato</h1>
						   <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nome" class="form-control" required="required" placeholder="Name">
                                    </div>
                                </div>
								  <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="telefone" class="form-control" required="required" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="email"class="form-control" required="required" placeholder="Email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="mensagem" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="executar" id="executar" class="btn btn-danger btn-lg">Enviar Mensagem</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
					
			</div>
			
		</div>
		
	</div>
	
		<?php
	//require rodape
	//require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/PDOsefras/html/footer.php');
	?>
