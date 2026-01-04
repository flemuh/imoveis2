

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/js/scripts.php');
?>

     
    <div class="col-offset-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-6 col-xs-6 col-sm-6 col-md-5 col-lg-5">
        <center>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title text-center">Área Restrita</div>
                    </div>

                    <div class="panel-body" >

                        <form method="post" action="login.php" class="form">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="usuario_text" type="text" class="form-control" name="usuario" value=""
                                           placeholder="Usuário">
                                </div>


                                <div class="input-group" style="margin-top: 1%">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="senha_text" type="password" class="form-control" name="senha"
                                           placeholder="Senha">
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <!-- Button -->

                                <button id="login_button" class="btn btn-primary pull-right"><i
                                            class="glyphicon glyphicon-log-in"></i> Entrar
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
    </div>


    <div id="particles" style="  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;"></div>


<div class="alert alert-warning alert-dismissible fade show" role="alert" id="myalert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
</div>
</body>



<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/particules.js"></script>

