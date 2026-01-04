<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 21/06/2018
 * Time: 21:50
 */

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
//require classe usuario
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
//require crud do usuario
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');


try {

    $objCrud = crudusuario::getInstance(Conexao::getInstance());
    $usuario = $objCrud->getPorLoginESenha($_POST["usuario"], $_POST["senha"]);

} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}


if ($usuario) {

  $_SESSION['logado'] = 1;
    echo json_encode(true);
    return;

} else {
    return;
}


