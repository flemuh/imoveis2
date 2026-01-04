<?php 

	@session_start();
	
/*  
 * Classe para operações CRUD na tabela ARTIGO   
 */
class crudmensagem{  
 
  /*  
   * Atributo para conexão com o banco de dados   
   */  
  private $pdo = null;  
 
  /*  
   * Atributo estático para instância da própria classe    
   */  
  private static $crudmensagem = null; 
 
  /*  
   * Construtor da classe como private  
   * @param $conexao - Conexão com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }  
  
  /*
  * Método estático para retornar um objeto crudmensagem    
  * Verifica se já existe uma instância desse objeto, caso não, instância um novo    
  * @param $conexao - Conexão com o banco de dados   
  * @return $crudmensagem - Instancia do objeto crudmensagem    
  */   
  public static function getInstance($conexao){   
   if (!isset(self::$crudmensagem)):    
    self::$crudmensagem = new crudmensagem($conexao);   
   endif;   
   return self::$crudmensagem;    
  } 
 
 
   //FUNÇÃO CONSULTA MENSAGEMS
   
  public function mensagens(){   
   try{   
	$email_status = 'prendente';
   
    $sql = "SELECT * FROM MENSAGEM ORDER BY DATA"; 
	$stm = $this->pdo->prepare($sql); 
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
	
    return $dados;     
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }



    public function mensagemvisualizar($idmensagem_visualizar){   
   try{   
	
   
    $sql = "SELECT * FROM MENSAGEM WHERE IDMENSAGEM=? ORDER BY DATA"; 
	$stm = $this->pdo->prepare($sql); 
	$stm->bindValue(1, $idmensagem_visualizar);	
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
	
    return $dados;     
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }
  
  
    //FUNÇÃO ATUALIZA MENSAGEM
 
  public function mensagematualizar($idmensagem_visualizar){   
  // if (!empty($descricao) && !empty($id) ):   
  
	$status = 'visto';
    try{   
      $sql = "UPDATE MENSAGEM SET STATUS=? WHERE IDMENSAGEM=?";   
	 
      $stm = $this->pdo->prepare($sql);   
	  $stm->bindValue(1, $status);
	  $stm->bindValue(2, $idmensagem_visualizar);

     $stm->execute();   
	 

    
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";   
    }   
  // endif;   
  }  
  
  
  

   
          //FUNÇÃO INSERE Mensagem
    public function mensagemincluir($nome, $telefone, $email, $mensagem){   
   try{   
	 $status='';
	 $sql = "INSERT INTO MENSAGEM (NOME, TELEFONE, EMAIL, MENSAGEM, STATUS) VALUES (?, ?, ?, ?, ?)";   
     $stm = $this->pdo->prepare($sql);   
	 $stm->bindValue(1, $nome);
	 $stm->bindValue(2, $telefone);
	 $stm->bindValue(3, $email);
	 $stm->bindValue(4, $mensagem);
	 $stm->bindValue(5, $status);
     $stm->execute(); 
	 echo "<script>alert('mensagem enviada com sucesso')</script>"; 

    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }
   
   
   
  
}


  
  
  
  
   