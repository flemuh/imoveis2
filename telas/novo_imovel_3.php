<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
?>



    <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9">


    <?php


    //passo cadastrro 2
    if (isset($_POST['executar']) && $_POST['executar'] == 'Próximo Passo') {

        $error = array();
        $imovelID = $_POST['imovelID'];
        $imovelrua = strip_tags(trim($_POST['imovelrua']));
        $imovelcidade = strip_tags(trim($_POST['imovelcidade']));
        $imovelbairro = strip_tags(trim($_POST['imovelbairro']));


        if ($imovelrua == null) {
            $error[1] = "imovel rua está nulo";
        }

        if ($imovelcidade == null) {
            $error[2] = "imovel cidade está nulo";
        }

        if ($imovelbairro == null) {
            $error[3] = "imovel bairro está nulo";
        }

        if ($imovelID == null) {
            $error[4] = "id imovel está nulo";
        }


        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        } else {
            $update = crudimovel::getInstance(Conexao::getInstance());
            $update->updatecadastro($imovelID, $imovelrua, $imovelbairro, $imovelcidade);

        }

    }


    //passo cadastrro 3

    if (isset($_POST['executar']) && $_POST['executar'] == 'Enviar Imagem') {


        //limite de imagens
        if ($_SESSION['qtdfotos'] >= '8') {
            echo '<h1> Você já enviou 8 Imagens';
            echo '</h1>';

        } else {

            $foto = $_FILES["img"];

            // Largura m�xima em pixels
            $largura = 1500;
            // Altura m�xima em pixels
            $altura = 1800;
            // Tamanho m�ximo do arquivo em bytes
            $tamanho = 10000;

            $error = array();


            // Verifica se o arquivo � uma imagem
            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {

                $error[1] = "Selecione uma imagem ou use a extenção pjpeg/ jpeg/ png/ gif/ bmp!.";
            }

            if (preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
                $dimensoes = getimagesize($foto["tmp_name"]);

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

                //echo "Foi feito upload da foto no imovel"; echo $_SESSION['ultimoid'];

                //sleep para aparecer carregando
                //sleep(2);

                //variaveis foto
                //$idimovel = strip_tags(trim ($_POST['imovelid']));
                $idimovel = $_SESSION['ultimoid'];
                $fotonome = $nome_imagem;


                //cadastro no banco

                $insert = crudimovel::getInstance(Conexao::getInstance());
                $insert->inserirfoto($idimovel, $fotonome);


            }
        }
    }
    // Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
        foreach ($error as $erro) {
            //echo $erro . "<br />";
            echo "<script>alert('" . $erro . "')</script><br />";

        }
    }

    //FIM UPLOAD DE IMAGEMMM e cadastro 1///


    ?>


    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">

				<span style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#069;">
					1:informações |
					2:Endereços |
					<strong>3:imagens</strong>
				</span>


        <?php


        //finaliza cadastro
        if (isset($_POST['executar']) && $_POST['executar'] == 'Finalizar') {
            sleep(2);
            $meta = '<meta http-equiv="refresh" content="0, URL=novo_imovel_fim.php"/>';
            echo $meta;
        }
        ?>


        <form name="cadastraimovel" method="post" action="" enctype="multipart/form-data">

            <h3>Endereço</h3>

            <h4>Você pode enviar até 8 imagens!<br/>
                <h4>
						<span>*clique em selecionar arquivo!<br/>
						*selecione a imagem!<br/>
						*clique em enviar imagem!</span>
                    <h4>Ao enviar Todas as Imagens Clique em finalizar!<br/></h4>

                    <table>

                        <tr>
                            <td>
                                <label>
                                    <span>Imagens:</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="img" size="60"/>
                        </tr>
                        </td>


                        <tr>
                            <td>
                                <label>
                                    <span>imovel id :</span>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="imovelid" value="<?php echo $_SESSION['ultimoid']; ?>"/>
                        </tr>
                        </td>

                        <?php
                        //qtd fotos
                        $fotoid = crudimovel::getInstance(Conexao::getInstance());
                        //idimovel cadastro
                        $idimovelcadastro = $_SESSION['ultimoid'];
                        //idimovel foto
                        //$idfoto = $_SESSION['ultimoidfoto'];


                        $dados = $fotoid->selectfotosporid($idimovelcadastro);
                        foreach ($dados as $item):
                            echo '</br>';

                            //qtd fotos
                            $qtdfotos = $item->QTD;
                            $_SESSION['qtdfotos'] = $qtdfotos;

                            ?>


                            <tr>
                                <td>
                                    <label>
                                        <span>qtd de fotos :</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="imovelid" value="<?php echo $qtdfotos; ?>"/>
                            </tr>
                            </td>
                            <?php
                        endforeach;

                        ?>

                        <tr>
                            <td>
                                <br/>
                                <input class="btn" type="submit" name="executar" id="executar" value="Enviar Imagem"/>
                                <input class="btn" type="submit" name="executar" id="executar" value="Finalizar"/>

                                <input class="btn" type="submit" href="novo_imovel.php" name="cadastrar"
                                       value="Cancelar"/>
                            </td>
                        </tr>

                    </table>
        </form>


        <!-- exclusao upload -->

        <?php
        if (isset($_POST['executar']) && $_POST['executar'] == 'Excluir') {
            $fotoid = $_POST['fotoid'];
            $imagemnome = $_POST['imagemnome'];

            $fotoexcluir = crudimovel::getInstance(Conexao::getInstance());
            $dados = $fotoexcluir->excluirfotosupload($fotoid);

            //exclusao de foto da pasta
            $pastaldel = '../imagens';
            unlink($pastaldel . '/' . $imagemnome);
            echo '<div class="ok">Excluida</div>';
        }
        ?>

        <!-- Mostrar upload -->

        <?php
        $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
        $dados = $fotomostrar->selecionaimagenscadastradas($idimovelcadastro);
        foreach ($dados as $item):

            $idfoto = $item->IDFOTO;
            $imagemnome = $item->FOTONOME;
            ?>


            <div id="upload_cadastro">


                <span class="imagem"><img src="../imagens/<?php echo $imagemnome ?>" width="100"
                                          alt="Exibição"/> </span>
                <form name="excluirImagem" action="" enctype="multipart/form-data" method="post">

                    <input type="text" name="idimovelcadastro" value="<?php echo $idimovelcadastro; ?>"/>
                    <input type="text" name="fotoid" value="<?php echo $idfoto; ?>"/>
                    <input type="text" name="imagemnome" value="<?php echo $imagemnome; ?>"/>
                    <input type="submit" name="executar" id="executar" value="Excluir"/>

                </form>
            </div><!-- Mostrar upload -->

            <?php
        endforeach;
        ?>


    </div>


</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
