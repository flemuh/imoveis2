<?php 
/*  
 * Classe para opera��es CRUD na tabela ARTIGO   
 */
class crudusuario{  
 
  /*  
   * Atributo para conex�o com o banco de dados   
   */  
  private $pdo = null;  
 
  /*  
   * Atributo est�tico para inst�ncia da pr�pria classe    
   */  
  private static $crudusuario = null; 
 
  /*  
   * Construtor da classe como private  
   * @param $conexao - Conex�o com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }  
  
  /*
  * M�todo est�tico para retornar um objeto crudusuario    
  * Verifica se j� existe uma inst�ncia desse objeto, caso n�o, inst�ncia um novo    
  * @param $conexao - Conex�o com o banco de dados   
  * @return $crudusuario - Instancia do objeto crudusuario    
  */   
  public static function getInstance($conexao){   
   if (!isset(self::$crudusuario)):    
    self::$crudusuario = new crudusuario($conexao);   
   endif;   
   return self::$crudusuario;    
  } 
 

   //FUN��O Verifica USUARIO EXISTENTE E INSERE 
  public function insert($usuario, $nivel, $senha, $nomefuncionario){   
  // if (!empty($categoria) && !empty($titulo) && !empty($autor)):   
    try{
		$sql = "SELECT * FROM ATENDENTE WHERE Nome=?";  
		$stm = $this->pdo->prepare($sql);   
		$stm->bindValue(1, $nomefuncionario);  
		$stm->execute();    
		$dados = $stm->fetchAll(PDO::FETCH_OBJ);
		if ( count($dados) ) {
			echo "<script>alert('Funcionario j� Cadastrado')</script>"; 
		}	
		else {

	
     $sql = "INSERT INTO ATENDENTE (Nome, Nivel, Usuario, Senha) VALUES (?, ?, ?, ?)";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $nomefuncionario);   
     $stm->bindValue(2, $nivel);   
     $stm->bindValue(3, $usuario);   
	 $stm->bindValue(3, $senha);   
     $stm->execute();   
     echo "<script>alert('Funcionario Cadastrado com Sucesso')</script>";   
    }
	}catch(PDOException $erro){   
     echo "<script>alert('Erro na lidddddddddnha: {$erro->getLine()}')</script>";
    }   
 //  endif;   
  } 
 
 
   //FUN��O ATUALIZA USUARIO
  public function update($id, $usuario, $nivel, $senha, $nomefuncionario){   
  // if (!empty($descricao)):   
    try{   
     $sql = "UPDATE ATENDENTE SET Nome=?, Nivel=?, Usuario=?, Senha=? WHERE id=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $nomefuncionario);   
     $stm->bindValue(2, $nivel);   
     $stm->bindValue(3, $usuario);   
     $stm->bindValue(4, $senha);  
	 $stm->bindValue(5, $id); 
	 
     $stm->execute();   
     echo "<script>alert('Funcionario Atualizado com Sucesso')</script>";   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linhaaaaaaaaaaaaaaa: {$erro->getLine()}')</script>";
    }   
  // endif;   
  }  
 
 
 //FUN��O DELETA USUARIO  
  public function delete($id){   
   //if (!empty($id)):   
    try{   
     $sql = "DELETE FROM ATENDENTE WHERE id=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $id);   
     $stm->execute();   
     echo "<script>alert('Funcionario Excluido com Sucesso')</script>";   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na lidddddddddddddddnha: {$erro->getLine()}')</script>";
    }   
  // endif;   
  } 
 


  
   //FUN��O CONSULTA USUARIO
   public function getAllItem(){   
   try{   
    $sql = "SELECT * FROM USUARIO";   
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na lindccccccccccccha: {$erro->getLine()}')</script>";
   }   
  }   
  
  

  
   //FUN��O LOGIN
      public function getPorLoginESenha($login, $senha){    
		
		$sql = "SELECT * FROM USUARIO WHERE SENHA = '$senha' AND USUARIO = '$login'";      
		$stm = $this->pdo->prepare($sql);    
		
		$stm->execute();   
		$dados = $stm->fetchAll(PDO::FETCH_OBJ);   
		return $dados; 
	} 

 }  