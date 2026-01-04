<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
?>



<?php
$idimovel = $_GET["idimovel"];
?>


  <!-- Fotorama -->

<script language="JavaSript">
        function retornar() {
            history.go(-1);
        }

</script>


    <!-- Demo styles -->
    <style>
        html, body {
            position: relative;
            height: 100%;
        }
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#000;
            margin: 0;
            padding: 0;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
<div class="col-10 col-xs-10 col-sm-10 col-md-7 col-lg-7  col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" style=" margin-top: 10%; text-align: center">

    <a onclick="retornar();"> <span onclick="retornar();" class="close close-imovel"></span></a>
    <a href="JavaScript: window.history.back();"><span class="close close-imovel"></span></a>
    <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
        <div id="detalhadoparte1">

            <!--consulta todos imoveis-->


            <?php
            $imoveis = crudimovel::getInstance(Conexao::getInstance());
            $dados = $imoveis->consultaimovelporid($idimovel);
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


            <div class="info">
                <ul>
                    <li><strong>Valor:</strong>R$ <?php echo $imovel_valor ?> <strong>| Tipo:</strong> Casa</li>

                </ul>
            </div>


            <div class="descricao">
                <br/>
                <?php echo $imovel_descricao ?>
            </div>   <!-- fecha descricao-->


        </div>
    </div>
    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div id="detalhadoparte2">

            <div class="descricao">
                <br/>
                <?php echo $imovel_descricao ?>
            </div>   <!-- fecha descricao-->
        </div>
    </div>
    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #6d6f66; height: 20%;">
        <div id="detalhadoparte3">
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>


    <div class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" style="background-color: #6d6f66; ">




        <div id="detalhadoparte4">
            <!-- Mostrar FOTO Principal -->
            <!---->
            <?php

            $idimovelfoto = $_GET["idimovel"];
            $idimovel = $_GET["idimovel"];
            $idimovelcadastro = $_GET["idimovel"];

            $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
            $dados = $fotomostrar->selecionaimgimove($idimovelfoto);


            ?>



            <div class="fotorama"     data-allowfullscreen="native"   data-width="100%"
                 data-ratio="800/600"
                 data-minwidth="400"
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

        </div>


            </ul>
            <!-- termina FOTO ADICIONAL -->

    </div>

    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #6d6f66; height: 40%;">
        <div id="detalhadoparte5">
            <div class="itens">
                <ul>

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

    </head>


    <body>
    <!-- Swiper JS -->
    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Fotorama from CDNJS, 19 KB -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
