
<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/imoveis/dao/bd.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');



$idimovelfoto = $_GET["idimovel"];
$idimovel = $_GET["idimovel"];
$idimovelcadastro = $_GET["idimovel"];

$fotomostrar = crudimovel::getInstance(Conexao::getInstance());
$dados = $fotomostrar->selecionaimgimove($idimovelfoto);

$fotomostrar = crudimovel::getInstance(Conexao::getInstance());
$dados2 = $fotomostrar->selecionaimagenscadastradas($idimovelfoto);
?>




<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Fotorama -->
	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.5.2/fotorama.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.5.2/fotorama.js"></script>

</head>

<style>
body{

background: linear-gradient(to right, rgb(58, 28, 113), rgb(215, 109, 119), rgb(255, 175, 123));
background-size: 100% 100%;

-webkit-animation: AnimationName 30s ease infinite;
-moz-animation: AnimationName 30s ease infinite;
animation: AnimationName 30s ease infinite;
}
@-webkit-keyframes AnimationName {
    0%{background-position:0% 7%}
    50%{background-position:100% 94%}
    100%{background-position:0% 7%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 7%}
    50%{background-position:100% 94%}
    100%{background-position:0% 7%}
}
@keyframes AnimationName { 
    0%{background-position:0% 7%}
    50%{background-position:100% 94%}
    100%{background-position:0% 7%}
}


</style>
<body >
	<div class="fotosmais">
	<center>
   <a onclick="retornar();"> <span onclick="retornar();" class="close close-imovel"></span></a>
    <a href="JavaScript: window.history.back();"><span class="close close-imovel"></span></a>
	<!-- Fotorama -->
	<div class="fotorama"  
	data-ratio="700/467" 
	data-max-width="100%"
	    data-width="65%"
 
     data-ratio="3/2"
     data-allowfullscreen="true"
      data-nav="thumbs"
	>
	<?php
	//primeira foto
	foreach ($dados as $item):


		$imagemnome = $item->IMOVELNOME;
		$src = 'http://localhost/imagens/'.$imagemnome;
		?>
		<img src="<?php echo $src ?>" alt="" title="Imoveis " class="img-fluid"/>

		<?php
	endforeach;

//fotos adicionais
	foreach ($dados2 as $item):

		$imagemnome = $item->IMOVELNOME;
		$src = 'http://localhost/imagens/'.$imagemnome;
		?>
		<img src="<?php echo $src ?>" alt="" title="Imoveis " class="img-fluid"/>

		<?php
	endforeach;
	?>

</div>


<script language="JavaSript">
        function retornar() {
            history.go(-1);
        }

</script>
<style type="text/css">
	
      .close {
        z-index: 1;
        width: 33px;
        height: 31px;
        background: url(../img/bt_fechar.png) top left no-repeat;
        position: absolute;
        top: 100px;
        right: 250px;
        cursor: pointer;
        z-index: 99;
      }
</style>
