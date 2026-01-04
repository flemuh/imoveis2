<?php

@session_start();

/*
 * Classe para opera��es CRUD na tabela ARTIGO
 */
class crudimovel{

  /*
   * Atributo para conex�o com o banco de dados
   */
  private $pdo = null;

  /*
   * Atributo est�tico para inst�ncia da pr�pria classe
   */
  private static $crudimovel = null;

  /*
   * Construtor da classe como private
   * @param $conexao - Conex�o com o banco de dados
   */
  private function __construct($conexao){
    $this->pdo = $conexao;
  }

  /*
  * M�todo est�tico para retornar um objeto crudimovel
  * Verifica se j� existe uma inst�ncia desse objeto, caso n�o, inst�ncia um novo
  * @param $conexao - Conex�o com o banco de dados
  * @return $crudimovel - Instancia do objeto crudimovel
  */
  public static function getInstance($conexao){
   if (!isset(self::$crudimovel)):
    self::$crudimovel = new crudimovel($conexao);
  endif;
  return self::$crudimovel;
}




  //FUN��O ATUALIZA IMOVEL PASSO 2




public function updatecadastro($id, $imoveltitulo, $imovelnome,  $imovelcategoria, $imovelvalor, $imoveldescricao, $imovelcomodos, $imovelsuites, $imovelbanheiros,
                               $imovelsalas, $imovelchurrasqueira, $imovelgaragem, $imovelservico, $imovelpiscina, $novidades, $cep){

    $det = '';

    if($imovelcategoria=='casa'){
        $det = 'CA';
    }
    if($imovelcategoria=='chacara'){
        $det = 'CH';
    }
    if($imovelcategoria=='apartamento'){
        $det = 'AP';
    }
    if($imovelcategoria=='terreno'){
        $det = 'TR';
    }
    $cod = $det .'-2018.00';

    $status= 'TRUE';

  try{
    $sql = "UPDATE IMOVEL SET IMOVELTITULO=?, IMOVELNOME=?, IMOVELCATEGORIA=?,IMOVELVALOR=?,IMOVELDESCRICAO=?,
IMOVELCOMODOS=?,IMOVELSUITES=?,IMOVELBANHEIROS=?,IMOVELSALAS=?,IMOVELCHURRASQUEIRA=?,IMOVELGARAGEM=?,IMOVELSERVICO=?,IMOVELPISCINA=?,NOVIDADES=?, IMOVELCODIGO=?, STATUS=?, IMOVELCEP=? WHERE IDIMOVEL=?";

    $stm = $this->pdo->prepare($sql);
    $stm->bindValue(1, $imoveltitulo);
    $stm->bindValue(2, $imovelnome);
    $stm->bindValue(3, $imovelcategoria);
    $stm->bindValue(4, $imovelvalor);
    $stm->bindValue(5, $imoveldescricao);
    $stm->bindValue(6, $imovelcomodos);
    $stm->bindValue(7, $imovelsuites);
    $stm->bindValue(8, $imovelbanheiros);
    $stm->bindValue(9, $imovelsalas);
    $stm->bindValue(10, $imovelchurrasqueira);
    $stm->bindValue(11, $imovelgaragem);
    $stm->bindValue(12, $imovelservico);
    $stm->bindValue(13, $imovelpiscina);
    $stm->bindValue(14, $novidades);
    $stm->bindValue(15, $cod);
    $stm->bindValue(16, $status);
    $stm->bindValue(17, $cep);
    $stm->bindValue(18, $id);
    $stm->execute();
    // echo "<script>alert('Imovel Atualizado com Sucesso')</script>";
  }catch(PDOException $erro){
      echo 'Erro na linha: '.$erro->getMessage();
 }
  // endif;
}



  //FUN��O DELETA  IMOVEL
public function deletar($imovel_id){
  // if (!empty($id)):
  try{
   $sql = "DELETE FROM IMOVEL WHERE IDIMOVEL=?";
   $stm = $this->pdo->prepare($sql);
   $stm->bindValue(1, $imovel_id);
   $stm->execute();
     //echo "<script>alert('Doador Deletado com Sucesso')</script>";
 }catch(PDOException $erro){
      echo 'Erro na linha: '.$erro->getMessage();
 }
  // endif;
}

    //FUN��O CONSULTA IMOVEL GERAL

public function imoveisgeral(){
 try{

  $sql = "SELECT * FROM IMOVEL WHERE STATUS = 'TRUE'";
  $stm = $this->pdo->prepare($sql);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;
}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}

    //FUN��O CONSULTA IMOVEL por id

public function imovelbusca($where){
  try{
    $sql = "SELECT * FROM IMOVEL";
    if( sizeof( $where ) ) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
        $sql .= 'AND STATUS = "TRUE"';
    }
    ELSE {
            $sql .= 'STATUS = "TRUE"';
    }

    $stm = $this->pdo->prepare($sql);
    $stm->execute();
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);

    return $dados;
  }catch(PDOException $erro){
      echo 'Erro na linha: '.$erro->getMessage();
  }
}


    //FUN��O CONSULTA IMOVEL por id

public function imovelportipo($tipo){
 try{
  $sql = "SELECT * FROM IMOVEL WHERE IMOVELCATEGORIA=? AND STATUS = 'TRUE'";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $tipo);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;
}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}

   //FUN��O CONSULTA e conta FOTOS POR IDIMOVEL

public function selectfotosporid($idimovelcadastro){
 try{


  $sql = "SELECT count(IDFOTO) AS QTD FROM FOTO WHERE IDIMOVEL=? AND STATUS = 'TRUE'";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $idimovelcadastro);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;
}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}



 //FUN��O  selecionaimgimove
public function selecionaimgimove($idimovelfoto){
 try{


  $sql = "SELECT * FROM IMOVEL WHERE IDIMOVEL=? AND STATUS = 'TRUE'";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $idimovelfoto);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;

}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}

    // CONSULTA FOTOS POR IDIMOVEL

public function selecionaimagenscadastradas($idimovelcadastro){
 try{


  $sql = "SELECT * FROM FOTO WHERE IDIMOVEL=?";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $idimovelcadastro);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;
}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}


    //FUN��O DELETA  FOTO UPLOAD
public function excluirfotosupload($idfoto){
  // if (!empty($id)):
  try{
   $sql = "DELETE FROM FOTO WHERE FOTONOME=?";
   $stm = $this->pdo->prepare($sql);
   $stm->bindValue(1, $idfoto);
   $stm->execute();
   echo "<script>alert('FOTO Deletada com Sucesso')</script>";
 }catch(PDOException $erro){
      echo 'Erro na linha: '.$erro->getMessage();
 }
  // endif;
}



     //FUN��O IMOVEL POR IDIMOVEL

public function consultaimovelporid($idimovel){
 try{
  $sql = "SELECT * FROM IMOVEL WHERE IDIMOVEL=? AND STATUS = 'TRUE'";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $idimovel);
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);

  return $dados;
}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}

    //FUN��O IMOVEL POR IDIMOVEL

public function imovelcod($cod){
  try{
    $sql = "SELECT * FROM IMOVEL WHERE IDIMOVEL=? AND STATUS = 'TRUE'";
    $stm = $this->pdo->prepare($sql);
    $stm->bindValue(1, $cod);
    $stm->execute();
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);

    return $dados;
  }catch(PDOException $erro){
      echo 'Erro na linha: '.$erro->getMessage();
  }
}



    //FUN��O INSERE IMOVEL
public function insereimovel($imoveltitulo, $imovelnome, $imovelcategoria, $imovelvalor, $imoveldescricao, $imovelcomodos, $imovelsuites, $imovelbanheiros, $imovelsalas, $imovelchurrasqueira, $imovelgaragem, $imovelservico, $imovelpiscina, $novidades){
 try{
  if($imovelcategoria=='casa'){
    $det = 'CA';
  }
  $cod = $det .'-2018.00';
  $sql = "INSERT INTO IMOVEL (IMOVELCOD, IMOVELTITULO, IMOVELNOME, IMOVELCATEGORIA, IMOVELVALOR, IMOVELDESCRICAO, IMOVELCOMODOS, IMOVELSUITES, IMOVELBANHEIROS, IMOVELSALAS, IMOVELCHURRASQUEIRA, IMOVELGARAGEM, IMOVELSERVICO, IMOVELPISCINA, NOVIDADES) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, $cod);
  $stm->bindValue(2, $imoveltitulo);
  $stm->bindValue(3, $imovelnome);
  $stm->bindValue(4, $imovelcategoria);
  $stm->bindValue(5, $imovelvalor);
  $stm->bindValue(6, $imoveldescricao);
  $stm->bindValue(7, $imovelcomodos);
  $stm->bindValue(8, $imovelsuites);
  $stm->bindValue(9, $imovelbanheiros);
  $stm->bindValue(10, $imovelsalas);
  $stm->bindValue(11, $imovelchurrasqueira);
  $stm->bindValue(12, $imovelgaragem);
  $stm->bindValue(13, $imovelservico);
  $stm->bindValue(14, $imovelpiscina);
  $stm->bindValue(15, $novidades);
  $stm->execute();

     //echo "<script>alert('Imovel Cadastrado com Sucesso')</script>";
	 //echo 'ultimo id: '. $this->pdo->lastInsertId();

  $_SESSION['ultimoid'] = $this->pdo->lastInsertId();


}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}


    //FUN��O INSERE IMOVEL
public function cadasttro_imovel(){
 try{

  $sql = "INSERT INTO IMOVEL (STATUS) VALUES (?)";
  $stm = $this->pdo->prepare($sql);
  $stm->bindValue(1, 'false');
  $stm->execute();

  //echo "<script>alert('Imovel Cadastrado com Sucesso')</script>";
   //echo 'ultimo id: '. $this->pdo->lastInsertId();

  $_SESSION['ultimoid'] = $this->pdo->lastInsertId();


}catch(PDOException $erro){
     echo 'Erro na linha: '.$erro->getMessage();
}
}




       //FUN��O INSERE FOTO
public function inserirfoto($idimovel, $fotonome){
        try{
            $sql = "INSERT INTO FOTO (FOTONOME, IDIMOVEL) VALUES (?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $fotonome);
            $stm->bindValue(2, $idimovel);
            $stm->execute();


        }catch(PDOException $erro){
            echo 'Erro na linha: '.$erro->getMessage();
        }
    }

    public function lastId(){
        try{
            $sql = "SELECT max(idimovel) FROM imovel";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            if (!$dados) {
                die('Could not query:' . mysql_error());
            }

            $id = $dados;

        }catch(PDOException $erro){
            echo 'Erro na linha: '.$erro->getMessage();
        }
    }

}
