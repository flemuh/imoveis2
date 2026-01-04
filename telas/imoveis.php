<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/js/scripts.php');


if (isset($_POST)) {

    if (isset($_POST['cod'])) {
    $cod = $_POST['cod'];
    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imovelcod($cod);

    } else if (isset($_POST['categoria'])) {

    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
    }
    if (isset($_POST['cidade'])) {
        $cidade = $_POST['cidade'];
    }
    if (isset($_POST['bairro'])) {
        $bairro = $_POST['bairro'];
    }
    if (isset($_POST['comodo'])) {
        $comodo = $_POST['comodo'];
    }


    if ($categoria) {
        $where[] = " `IMOVELCATEGORIA` = '{$categoria}'";
    }
//    if ($cidade) {
//        $where[] = " `IMOVELCIDADE` = '{$cidade}'";
//    }
//    if ($bairro) {
//        $where[] = " `IMOVELBAIRRO` = '{$bairro}'";
//    }
//    if ($comodo) {
//        $where[] = " `IMOVELCOMODOS` = '{$comodo}'";
//    }

    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imovelbusca($where);


    } else {
        $imoveis = crudimovel::getInstance(Conexao::getInstance());
        $dados = $imoveis->imoveisgeral();
    }

} else {
    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imoveisgeral();
}

if (isset($_GET['id'])) {
    $tipo = $_GET['id'];
    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imovelportipo($tipo);

}
?>

<div class="col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">

    <div class="" ID ="buscaimovel_top"style="height: 15%; width: 86%;  margin-left: 4.5% !important;">
        <form name="filtrar" method="post"class="">

            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" id="exampleFormControlFile01">
                    <option value="" disable="disable">Escolha a Categoria</option>
                    <option value="casa">Casas</option>
                    <option value="apartamento">Apartamentos</option>
                    <option value="chacara">Chacaras</option>
                    <option value="terreno">Terrenos</option>
                </select>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <label for="exampleFormControlFile1">Cidade</label>
                <select class="form-control" name="cidade" id="exampleFormControlFile1">
                    <option value=""  disabled="disable">Escolha a Cidade</option>
                </select>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <label for="exampleFormControlFile2">Valor</label>
                <select class="form-control" name="bairro" id="exampleFormControlFile2">
                <option value="" disabled="disable">Selecionar Valor</option>
                <option value="250.000.00" >100.000.00 R$ - 250.000.000 R$</option>
                <option value="350.000.00" >250.000.00 R$ - 350.000.000 R$</option>
                <option value="350.000.00" >350.000.00 R$ - 450.000.000 R$</option>
                <option value="450.000.00" >450.000.00 R$ Acima R$</option>
                </select>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <label for="consulta">Codigo</label>
                        <input name="consulta" class="form-control" id="txt_consulta" placeholder="Consultar Codigo" type="text">
                        </div>
                        <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3">

                            <input class="btn btn-primary" id="Buscar" type="submit" name="Buscar"
                                   value="Buscar"/>

                        </div>
        </form>
    </div>








<div class="col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-11 col-xs-11 col-sm-11 col-md-11 col-lg-11">
    <div id="imoveis_resultado"
        <!-- modo admin novo imovel-->
        <?php @session_start();
        if (isset($_SESSION['logado'])) {
            if ($_SESSION['logado'] = 1) {
            ?><!--<a href="novo_imovel.php"><input class="btn" type="submit" name="novo_imovel" value="Novo Imovel" /></a> </br> --><?php
            }
        }
        if (isset($dados)){
            foreach ($dados as $item):
                $imovel_id = $item->IDIMOVEL;
                $idimovelfoto = $imovel_id;
                $imovel_titulo = $item->IMOVELTITULO;
                $imovel_valor = $item->IMOVELVALOR;
                $imovel_nome = $item->IMOVELNOME;
                $imovel_categoria = $item->IMOVELCATEGORIA;
                $imovel_valor = $item->IMOVELVALOR;
                $imovel_descricao = $item->IMOVELDESCRICAO;
                $imovel_comodos = $item->IMOVELCOMODOS;
                $imovel_suites = $item->IMOVELSUITES;
                $imovel_cep = $item->IMOVELCEP;
                $imovel_banheiros = $item->IMOVELBANHEIROS;
                $imovel_salas = $item->IMOVELSALAS;
                $imovel_churrasqueira = $item->IMOVELCHURRASQUEIRA;
                $imovel_garagem = $item->IMOVELGARAGEM;
                $imovel_servico = $item->IMOVELSERVICO;
                $imovel_piscina = $item->IMOVELPISCINA;
                $imovel_novidade = $item->NOVIDADES;

                $imovel_cod = $item->IMOVELCODIGO;
                $imovel_descricao = $item->IMOVELDESCRICAO;
                ?>

                    <form name="imovel" id="imovel" method="post" action="#" enctype="multipart/form-data" >
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" id="parte1imvoell" style="margin-bottom: 15px">
                            <div class="id_imovel" style="display: none;"> <?php echo $id_imovel; ?></div>
                            <div class="titulo"> <?php echo $imovel_titulo; ?></div>
                            <div class="categoria">categoria <?php echo $imovel_categoria; ?></div>
                            <div class="desc"> <?php echo $imovel_descricao; ?></div>
                            <div class="valor"> valor : <?php echo $imovel_valor; ?></div>
                            <div class="registro"> Codigo : <?php echo $imovel_cod; ?></div>
                        </div>
                        <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="parte1imvoel2" style="margin-bottom: 15px">
                        <!-- Mostrar FOTO Principal -->
                        <?php
                        $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
                        $dados = $fotomostrar->selecionaimgimove($idimovelfoto);
                        foreach ($dados as $item):
                            $imagemnome = $item->IMOVELNOME;
                            ?>
                            <a data-toggle="modal" data-id="<?php echo $idimovelfoto?>" data-target="#exampleModalCenter4"  ><img class="img-responsive"
                            src="../imagens/<?php echo $imagemnome ?>"
                            alt="" title=""
                            border="0"/>
                            </a>
                            </div>
                            <?php
                        endforeach;
                        ?>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" id="parte1imvoel3" style="margin-bottom: 15px">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="novidade"> Novidades</br></div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="novidade2"><?php echo $imovel_novidade; ?></br></div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- modo admin excluir e alterar-->
                            <?php
                                @session_start();
                                if (isset($_SESSION['logado'])) {
                                    if ($_SESSION['logado'] = 1) {
                                    ?>
                                        <input id="deletar_id" style="color: red" type="submit" value="<?php echo $imovel_id; ?>" />
                                        <a class="deletar "id="<?php echo $imovel_id; ?>" onclick="deletar(this.id)"> <input value="deletar"type="button"class="btn btn-primary"/></a>
                                        <a href="novo_imovel.php?id=<?php echo $imovel_id; ?>"> <input value="alterar"type="button"class="btn btn-primary"/></a>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </form>

            <!-- termina consulta imoveis -->
            <?php endforeach;
        }
    ?>
    </div>
</div>

<!-- Modal IMOVEL DETALHADO-->
<div class="modal fade-in" id="exampleModalCenter4" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" style="width: 100%">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            <div class="modal-body">
<!--                    <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 ">-->
<!--                        <div id="detalhadoparte1">-->
                            <!--consulta todos imoveis-->
                            <?php
                            $imoveis = crudimovel::getInstance(Conexao::getInstance());
                            $dados = $imoveis->consultaimovelporid($_COOKIE['fbdata']);
                            foreach ($dados as $item):
                                $imovel_id = $item->IDIMOVEL;
                                $imovel_valor = $item->IMOVELVALOR;
                                $imovel_titulo = $item->IMOVELTITULO;
                                $imovel_descricao = $item->IMOVELDESCRICAO;
                                $imovel_comodos = $item->IMOVELCOMODOS;
                                $imovel_suites = $item->IMOVELSUITES;
                                $imovel_churrasqueira = $item->IMOVELCHURRASQUEIRA;
                                $imovel_garagem = $item->IMOVELGARAGEM;
                                $imovel_area_servico = $item->IMOVELSERVICO;
                                $imovel_banheiro = $item->IMOVELBANHEIROS;
                                $imovel_sala = $item->IMOVELSALAS;
                                $imovel_piscina = $item->IMOVELPISCINA;
                                $imovel_novidades = $item->NOVIDADES;
                            endforeach;
                            ?>
<!--                            <div class="info">-->
<!--                                <ul>-->
<!--                                    <li><strong>Valor:</strong>R$ --><?php //echo $imovel_valor ?><!-- <strong>| Tipo:</strong> Casa</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!---->
<!--                            <div class="descricao">-->
<!--                                <br/>-->
<!--                                --><?php //echo $imovel_descricao ?>
<!--                            </div>  fecha descricao-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">-->
<!--                        <div id="detalhadoparte2">-->
<!---->
<!--                            <div class="descricao">-->
<!--                                <br/>-->
<!--                                --><?php //echo $imovel_descricao ?>
<!--                            </div>   fecha descricao-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #6d6f66; height: 20%;">-->
<!--                        <div id="detalhadoparte3">-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8">

                            <!-- Mostrar FOTO Principal -->
                            <!---->
                            <?php
                            $idimovelfoto = $_COOKIE['fbdata'];
                            $idimovel = $_COOKIE['fbdata'];
                            $idimovelcadastro = $_COOKIE['fbdata'];
                            $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
                            $dados = $fotomostrar->selecionaimgimove($_COOKIE['fbdata']);
                            ?>
                            <div class="fotorama"     data-allowfullscreen="native"   data-width="100%"
                                 data-ratio="800/600"
                                 data-minwidth="300"
                                 data-maxwidth="1000"
                                 data-minheight="300"
                                 data-maxheight="100%">
                                <?php
                                foreach ($dados as $item):
                                    $imagemnome = $item->IMOVELNOME;
                                    ?>
                                    <img   src="../imagens/<?php echo $imagemnome ?>">
                                <?php
                                endforeach;
                                $dados = $fotomostrar->selecionaimagenscadastradas($idimovelfoto);
                                foreach ($dados as $item):
                                    $imagemnome = $item->FOTONOME;
                                    ?>
                                    <img   src="../imagens/<?php echo $imagemnome ?>">
                                <?php
                                endforeach;
                                ?>
                            </div>

                        </ul>
                        <!-- termina FOTO ADICIONAL -->
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div id="detalhadoparte5">
                            <div class="itens">
                                <ul>


                                    <li><strong>Valor:</strong>R$><?php echo $imovel_valor ?></li>
                                    <li><strong>| Tipo:</strong> Casa ** arrumar</li>

                                    <li>Descricao:<?php echo $imovel_descricao ?></li>
                                    <li>xxxxxxxitens</li>
                                    <li>Comodos: <?php echo $imovel_comodos ?> Dormitórios</li>
                                    <li>Suites: <?php echo $imovel_suites ?> Suite</li>
                                    <li>Churrasqueira: <?php echo $imovel_churrasqueira ?></li>
                                    <li>Garagem: para <?php echo $imovel_garagem ?> carros</li>
                                    <li>Área de serviço:<?php echo $imovel_area_servico ?></li>
                                    <li>Banheiros:<?php echo $imovel_banheiro ?></li>
                                    <li>Salas:<?php echo $imovel_sala ?></li>
                                    <li>Piscina:<?php echo $imovel_piscina ?></li>




                                </ul>
                            </div> <!-- fecha itens -->
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
            var data_id = '';
            if (typeof $(this).data('id') !== 'undefined') {
                data_id = $(this).data('id');
                document.cookie = "fbdata = " + data_id;
            }
            $('#my_element_id').val(data_id);
        })
    });

    function deletar(val){
        $id_imovel =val;

        $.ajax({
            method: "POST",
            url: "deleta_imovel.php",
            data: {id_imovel: $id_imovel},
            beforeSend: function (xhr) {
                $("#loader").show();
            }
        }).done(function (data) {
            $("#loader").fadeOut();
            console.log(data);
            inject(data);
        });
    }

    function inject(data) {
        $.ajax({
            method: "POST",
            url: "imoveis.php",
            data: {dados: data},
            beforeSend: function (xhr) {
                $("#loader").show();
            }
        })
            .done(function (data) {
                $("#loader").fadeOut();
                location.reload();
            });
    }

    $(function () {
        $("select[name=categoria]").change(function () {
            beforeSend:$("select[name=cidade]").html('<option value="0" >Escolha a Cidade</option>, <option value="itatiba" >Itatiba</option>');

            $("select[name=cidade]").change(function () {
                beforeSend:$("select[name=bairro]").html('<option value="0" >Escolha o bairro</option>, <option value="centro" >Centro</option>,<option value="nacoes" >Nações</option>');

                $("select[name=bairro]").change(function () {
                    beforeSend:$("select[name=comodo]").html('<option value="0" >Escolha nº de comodos</option>, <option value="1" >1</option>,<option value="2" >2</option>,<option value="3" >3</option>,<option value="4" >4</option>,<option value="5" >Mais que 4</option>');
                });
            });
        });
    });

</script>

<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
