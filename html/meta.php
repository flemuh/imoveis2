<?php
@session_start();

require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/imoveis.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/imoveis/js/scripts.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta name="keywords" content="Imóveis, Casas, Apartamento, Chácaras, Terrenos">
  <meta name="description" content="Imóveis">
  <meta name="author" content="Fernando Humel">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Moradia Lazer</title>
</head>
<body>

  <div class="warper">
    <div class="container">
      <div class="row">

        <!-- Modal -->
        <div class="modal" id="alertacontato" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade-in" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Entre em contato conosco.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="col-6 col-md-6 col-lg-6 col-sm-6 col-xs-6 form-line">
                    <div class="form-group">
                      <label for="exampleInputUsername"></label>
                      <input type="text" class="form-control" id="nome"
                      placeholder="Nome" required>
                    </div>
                  </div>
                  <div class="col-6 col-md-6 col-lg-6 col-sm-6 col-xs-6 form-line">
                    <div class="form-group">
                      <label for="telephone"></label>
                      <input type="tel" class="form-control" id="telephone"
                      placeholder="Telefone" required>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 form-line">
                    <div class="form-group">
                      <label for="exampleInputEmail"></label>
                      <input type="email" class="form-control" id="exampleInputEmail"
                      placeholder="Email" required>
                    </div>

                  </div>
                  <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 form-line">
                    <div class="form-group">
                      <label for="description"></label>
                      <textarea class="form-control" id="description"
                      placeholder="Escreva sua Mensagem." required></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button id="enviar_msg" type="button" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </div>
       </div>
     </div>

    <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2"  >
    <!-- <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" > -->

      <nav  id="" class="navbar  "
      style="padding:0px; margin:0px;">



      <div class="collapse navbar-collapse " id="ca-navbar" >
          <h1 class="heading">
              <a href="/" style="opacity: 1;"><img class="logo img-responsive " src="../img/logo.png"></a>
          </h1>
        <ul class="navbar-nav" id="nav">
          <?php
          @session_start();
          if (isset($_SESSION['logado'])) {

            if ($_SESSION['logado'] = 1) {
              ?>
              <div id="menu" class="">
                  <ul>
                      <li class="active"><a href='home.php'>Home</a></li>
                      <li><a href='imoveis.php'>Imoveis</a></li>
                      <li>
                        <a type="button" data-toggle="modal" data-target="#exampleModalCenter"
                          style="borde:none !important;
                          list-style: none;
                          border:none!important;
                          -webkit-appearance: none;
                          background-color: white!important;">
                          Contato
                        </a>
                      </li>
                      <li><a href='novo_imovel.php'>Novo Imovel</a></li>
                      <li><a href='loginsair.php'>Sair</a></li>

                  </ul>

              <?php
            }
          }

          if (!isset($_SESSION['logado'])) {
            ?>
            <div id="menu" class="hv=100 " >
              <ul>
                <li class="active"><a href='home.php'>Home</a></li>
                <li><a href='imoveis.php'>Imoveis</a></li>
                <li><a type="button" data-toggle="modal"
                  data-target="#exampleModalCenter" style="borde:none !important;	list-style: none; border:none!important; -webkit-appearance: none;
                  background-color: white!important;">
                  Contato
                </a></li>
                <li><a href='login.php'>Logar</a></li>

              </ul>
          </div>
          <?php
        }
        ?>
      </ul>

      </nav>


    </div>
        <div class="menu__wrapper col-md-12 d-md-none">
            <h1 class="heading">
                <a href="/" ><img id="logo-mobile " src="../img/logo.png"></a>
            </h1>
            <div class="menu__mobile-button">
                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu d-md-none">

            <div class="container">
                <div class="mobile-menu__close">
                    <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
                </div>
                <nav class="mobile-menu__wrapper">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#other_posts">other posts</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Mobile menu -->
<span style="position: absolute; z-index: 999; top:47%; left:51%; background: none" id="loader"><img src="../img/Preloader_8.gif">
    <script>
        'use strict';

        //Open mobile menu
        $('.menu__mobile-button, .mobile-menu__close').on('click', function () {
            $('.mobile-menu').toggleClass('active');
        });

        //Close mobile menu after click
        $('.mobile-menu__wrapper ul li a').on('click', function () {
            $('.mobile-menu').removeClass('active');
        });
    </script>
    <style>
         .menu__mobile-button {
            color: #000;
            opacity: .5;
             font-size: 20px;
            transition: all .3s;
            background-color: transparent;
            border: none;
        }
    </style>
</span>
