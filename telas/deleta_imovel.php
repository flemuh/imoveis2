
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/imoveis.php');

$idimovel = $_POST["id_imovel"];

//
$imoveis = crudimovel::getInstance(Conexao::getInstance());
$dados = $imoveis->deletar($idimovel);


return ;

?>
