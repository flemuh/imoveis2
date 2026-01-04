<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
?>


    <!-- Incluir Imovel-->
<?php


//UPLOAD DE IMAGEMMM///


// Se o usu�rio clicou no bot�o cadastrar efetua as a��es
if ((isset($_POST["submit"])) && (!empty($_FILES['foto']))) {


    $foto = $_FILES["foto"];

    // Largura m�xima em pixels
    $largura = 1500;
    // Altura m�xima em pixels
    $altura = 1800;
    // Tamanho m�ximo do arquivo em bytes
    $tamanho = 10000;

    $error = array();

    // Verifica se o arquivo � uma imagem
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
        $error[1] = "Isso n�o � uma imagem ou nenhuma imagem foi escolhida!";
    }

    if ($_FILES["foto"] == null) {
        $dimensoes = getimagesize($foto["tmp_name"]);
    } else {
        echo "<script>alert('Nenhuma Imagem Selecionada!!')</script>";
    }
    // Verifica se a largura da imagem � maior que a largura permitida
    //if($dimensoes[0] > $largura) {
    //	$error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
    //	}

    // Verifica se a altura da imagem � maior que a altura permitida
    //if($dimensoes[1] > $altura) {
    //	$error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
    //}

    // Verifica se o tamanho da imagem � maior que o tamanho permitido
    //if($foto["size"] > $tamanho) {
    // 	$error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
    //	}

    // Se n�o houver nenhum erro
    if (count($error) == 0) {

        // Pega extens�o da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        // Gera um nome �nico para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        // Caminho de onde ficar� a imagem
        $caminho_imagem = "../imagens/" . $nome_imagem;

        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto["tmp_name"], $caminho_imagem);

        //echo "Foi feito upload da imagem e o cadastro do imovel no banco!";

        $imoveltitulo = strip_tags(trim($_POST['titulo']));
        $imovelnome = $nome_imagem;
        $imovelcategoria = strip_tags(trim($_POST['tipo']));
        $imovelvalor = strip_tags(trim($_POST['valor']));
        $imoveldescricao = strip_tags(trim($_POST['descricao']));
        $imovelcomodos = strip_tags(trim($_POST['comodos']));
        $imovelsuites = strip_tags(trim($_POST['suites']));
        $imovelbanheiros = strip_tags(trim($_POST['banheiros']));
        $imovelsalas = strip_tags(trim($_POST['salas']));
        $imovelchurrasqueira = strip_tags(trim($_POST['churrasqueira']));
        $imovelgaragem = strip_tags(trim($_POST['garagem']));
        $imovelservico = strip_tags(trim($_POST['servico']));
        $imovelpiscina = strip_tags(trim($_POST['piscina']));
        $novidades = strip_tags(trim($_POST['novidades']));

        //$imovelvisitas = '1';


    }
}
// Se houver mensagens de erro, exibe-as
if (count($error) != 0) {
    foreach ($error as $erro) {
        //echo $erro . "<br />";
        //echo "<script>alert('{$erro}')</script>";
        $meta = '<meta http-equiv="refresh" content="0, URL=novo_imovel.php"/>';
        echo $meta;

    }
} else {
    //cadastro no banco

    $insert = crudimovel::getInstance(Conexao::getInstance());
    $insert->insereimovel($imoveltitulo, $imovelnome, $imovelcategoria, $imovelvalor, $imoveldescricao, $imovelcomodos, $imovelsuites, $imovelbanheiros, $imovelsalas, $imovelchurrasqueira, $imovelgaragem, $imovelservico, $imovelpiscina, $novidades);

}

//FIM UPLOAD DE IMAGEMMM e cadastro 1///


//id imovel cadastrado!
$imovelID = $_SESSION['ultimoid'];


?>

<div class="col-md-7">
				<span style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#069;"> 
					1:informa��es | 
					<strong>2:Endere�os </strong>
					| 3:imagens
				</span>
    <form name="cadastraimovel-2" id="cadastraimovel-2" method="post" action="novo_imovel_3.php"
          enctype="multipart/form-data">
        <table>

            <h2>Endere�o</h2>

            <tr>
                <td>
								<span>
									<label>Nome Rua:</label>
								</span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="imovelrua">
                        <option value="" disable="disable">Escolha a RUA</option>
                        <option value="at">Alfredo Tuff�li</option>
                        <option value="ct">Centro</option>
                    </select>
            </tr>
            </td>


            <tr>
                <td>
								<span>
									<label>Bairro:</label>
								</span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="imovelbairro">
                        <option value="" disable="disable">Escolha o Bairro</option>
                        <option value="st">Santo Ant�nio</option>
                        <option value="sf">S�o Francisco</option>
                    </select>
            </tr>
            </td>

            <tr>
                <td>
								<span>
									<label>Cidade:</label>
								</span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="imovelcidade">
                        <option value="" disable="disable">Escolha a Cidade</option>
                        <option value="it">Itatiba</option>
                        <option value="sp">SP</option>
                    </select>
            </tr>
            </td>


            <tr>
                <td>
                    <input type="hidden" name="imovelID" value="<?php echo $imovelID; ?>"/>
            </tr>
            </td>


            <tr>
                <td>
                    <input class="btn" type="submit" name="executar" id="executar" value="Pr�ximo Passo"/>

                    <input class="btn" type="submit" href="novo_imovel.php" name="cancelar" value="Cancelar"/>
                </td>

        </table>
    </form>

</div>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis//html/footer.php');
?>
