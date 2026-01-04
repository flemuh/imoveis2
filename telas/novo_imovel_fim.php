<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
?>


    <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9">

    <?php
    //finaliza cadastro
    if (isset($_POST['executar']) && $_POST['executar'] == 'Finalizar') {
        sleep(2);
        $meta = '<meta http-equiv="refresh" content="0, URL=novo_imovel_fim.php"/>';
        echo $meta;
    }
    ?>


</div>


<div id="fimcadastro">
    <h2> Seu Imovel foi cadastrado com sucesso </h2>

    <li><a value="executar" href='novo_imovel.php'>Cadastrar Novo Imovel</a></li>
    <li><a value="executar" href='imoveis.php'>Listar Imoveis</a></li>

</div>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
