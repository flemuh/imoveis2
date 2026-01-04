  <?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');


  $error = array();


//se tiver atualização 


  //cadastro de imovel
  if (isset($_POST['executar']) && $_POST['executar'] == 'Finalizar Cadastro') {

    if (file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])) {

      $foto = $_FILES["foto"];
  // Largura m�xima em pixels
      $largura = 1500;
  // Altura m�xima em pixels
      $altura = 1800;
  // Tamanho m�ximo do arquivo em bytes
      $tamanho = 10000;
      $error = array();

  // Verifica se o arquivo � uma imagem
      if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
        $error[1] = "Selecione uma imagem ou use a extenção pjpeg/ jpeg/ png/ gif/ bmp!.";
      }

      if (preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
        $dimensoes = getimagesize($foto["tmp_name"]);
      }

  // Verifica se a largura da imagem � maior que a largura permitida
  //if($dimensoes[0] > $largura) {
  //  $error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
  //  }

  // Verifica se a altura da imagem � maior que a altura permitida
  //if($dimensoes[1] > $altura) {
  //  $error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
  //}

  // Verifica se o tamanho da imagem � maior que o tamanho permitido
  //if($foto["size"] > $tamanho) {
  //  $error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
  //  }

  // Se n�o houver nenhum erro
      if (count($error) == 0) {
    // Pega extens�o da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    // Gera um nome �nico para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficar� a imagem
        $caminho_imagem = "../imagens/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    //echo "Foi feito upload da imagem e o cadastro do imovel no banco!";
    //$imovelvisitas = '1';
      }
    }else{
        $nome_imagem = $_SESSION['imovel_nome'];
    }

    //mantem foto principal antiga se nao tiver post de foto

      if(isset($_POST['titulo'])) {
          $imoveltitulo = strip_tags(trim($_POST['titulo']));
      }
      if(isset($nome_imagem)){
          $imovelnome =$nome_imagem;
      }
      if(isset($_POST['tipo'])) {
          $imovelcategoria = strip_tags(trim($_POST['tipo']));
      }
      if(isset($_POST['valor'])) {
          $imovelvalor = strip_tags(trim($_POST['valor']));
      }
      if(isset($_POST['descricao'])) {
          $imoveldescricao = strip_tags(trim($_POST['descricao']));
      }
      if(isset($_POST['comodos'])) {
          $imovelcomodos = strip_tags(trim($_POST['comodos']));
      }
      if(isset($_POST['suites'])) {
          $imovelsuites = strip_tags(trim($_POST['suites']));
      }
      if(isset($_POST['banheiros'])) {
          $imovelbanheiros = strip_tags(trim($_POST['banheiros']));
      }
      if(isset($_POST['salas'])) {
          $imovelsalas = strip_tags(trim($_POST['salas']));
      }
      if(isset($_POST['cep'])) {
          $cep = strip_tags(trim($_POST['cep']));
      }

    if(isset($_POST['churrasqueira'])){
      $imovelchurrasqueira = strip_tags(trim($_POST['churrasqueira']));

      if($imovelchurrasqueira=='Sim'){
        $imovelchurrasqueira = 1;
      }else{
        $imovelchurrasqueira = 0;
      }
    }else{
      $imovelchurrasqueira = 0;
    }

    if(isset($_POST['garagem'])){
      $imovelgaragem = strip_tags(trim($_POST['garagem']));

      if($imovelgaragem=='Sim'){
        $imovelgaragem = 1;
      }else{
        $imovelgaragem = 0;
      }

    }else{
      $imovelgaragem = 0;
    }


    if(isset($_POST['servico'])){

      $imovelservico = strip_tags(trim($_POST['servico']));
      if($imovelservico=='Sim'){
        $imovelservico = 1;
      }else{
        $imovelservico = 0;
      }
    }else{
      $imovelservico = 0;
    }


    if(isset($_POST['piscina'])){
     $imovelpiscina = strip_tags(trim($_POST['piscina']));

     if($imovelpiscina=='Sim'){
      $imovelpiscina = 1;
    }else{
      $imovelpiscina = 0;
    }
  }else{
    $imovelpiscina = 0;
  }

  if(isset($_POST['novidades'])) {
      $novidades = strip_tags(trim($_POST['novidades']));
  }


  if ($imoveltitulo == null) {
    $error[2] = "Título está vazio";
  }

  if ($imovelnome == null) {
    $error[3] = "imovelnome está vazio";
  }

  if ($imovelcategoria == null) {
    $error[4] = "imovelcategoria está vazio";
  }

  if ($imovelvalor == null) {
    $error[5] = "imovelvalor está vazio";
  }

  if ($imoveldescricao == null) {
    $error[6] = "imoveldescricao está vazio";
  }

  if ($imovelsuites == null) {
    $error[7] = "imovelsuites está vazio";
  }

  if ($imovelbanheiros == null) {
    $error[8] = "imovelbanheiros está vazio";
  }

  if ($imovelsalas == null) {
    $error[9] = "imovelsalas está vazio";
  }

  if (count($error) != 0) {
    foreach ($error as $erro) {
      echo $erro . "<br />";
    }
  } else {

    $update = crudimovel::getInstance(Conexao::getInstance());

    //valida se é novo ou update com post
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        $lastId = crudimovel::getInstance(Conexao::getInstance());
        $lastId->lastId();
        $id = isset($_SESSION['ultimoid']) ? $_SESSION['ultimoid'] : $lastId;
    }

    $update->updatecadastro($id, $imoveltitulo, $imovelnome,  $imovelcategoria, $imovelvalor, $imoveldescricao, $imovelcomodos, $imovelsuites, $imovelbanheiros, $imovelsalas, $imovelchurrasqueira, $imovelgaragem, $imovelservico, $imovelpiscina, $novidades, $cep);
     echo '<script>alert("Cadastrado com sucesso")</script>';
      echo '<script type="text/javascript">location.href = \'imoveis.php\';</script>';
  }
}


    //finaliza cadastro
if (isset($_POST['executar']) && $_POST['executar'] == 'Finalizar') {
  sleep(2);
  $meta = '<meta http-equiv="refresh" content="0, URL=novo_imovel_fim.php"/>';
  echo $meta;
}

  //mostrar erro
if($error){
  if (count($error) != 0) {
   foreach ($error as $erro) {
     //echo $erro . "<br />";
    echo "<script>alert('" . $erro . "')</script><br />";
  }
}
}


//nova imagem
if(isset($_POST['imovelid'])){

  $foto = $_FILES["img"];
    // Largura m�xima em pixels
  $largura = 1500;
    // Altura m�xima em pixels
  $altura = 1800;
    // Tamanho m�ximo do arquivo em bytes
  $tamanho = 10000;
  $error = array();

    // Verifica se o arquivo � uma imagem
  if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
    $error[1] = "Selecione uma imagem ou use a extenção pjpeg/ jpeg/ png/ gif/ bmp!.";
  }
  if (preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
    $dimensoes = getimagesize($foto["tmp_name"]);
  }

    // Verifica se a largura da imagem � maior que a largura permitida
    //if($dimensoes[0] > $largura) {
    //  $error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
    //  }
    // Verifica se a altura da imagem � maior que a altura permitida
    //if($dimensoes[1] > $altura) {
    //  $error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
    //}
    // Verifica se o tamanho da imagem � maior que o tamanho permitido
    //if($foto["size"] > $tamanho) {
    //  $error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
    //  }

    // Se n�o houver nenhum erro
  if (count($error) == 0) {
      // Pega extens�o da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
      // Gera um nome �nico para a imagem
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
      // Caminho de onde ficar� a imagem
    $caminho_imagem = "../imagens/" . $nome_imagem;
      // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
      //echo "Foi feito upload da foto no imovel"; echo $_SESSION['ultimoid'];
      //sleep para aparecer carregando
      //sleep(2);
      //variaveis foto
      //$idimovel = strip_tags(trim ($_POST['imovelid']));
    if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = $_SESSION['ultimoid'];} 
    $fotonome = $nome_imagem;
      //cadastro no banco
    $insert = crudimovel::getInstance(Conexao::getInstance());
    $insert->inserirfoto($id, $fotonome);
  }


  $dados = crudimovel::getInstance(Conexao::getInstance());
  $result = $dados->selecionaimgimove($id);

  foreach ($result as $item):
    $imovel_id = $item->IDIMOVEL;
    $imovel_titulo = $item->IMOVELTITULO;
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
        //$imovel_cep = $item->CEP;

  endforeach;

      //se é novo imovel
}



if(!isset($_GET['id']) && !isset($_POST['imovelid']) ){

  //echo 'limpando sesao imovel novo';
  $id =  isset($_SESSION['ultimoid']);
  $cadastro = crudimovel::getInstance(Conexao::getInstance());
  $cadastro->cadasttro_imovel();

}



//novo imovel
if(isset($_GET['id'])){

  $dados = crudimovel::getInstance(Conexao::getInstance());
  $result = $dados->selecionaimgimove($_GET['id']);

  foreach ($result as $item):
    $imovel_id = $item->IDIMOVEL;
    $imovel_titulo = $item->IMOVELTITULO;
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

  endforeach;
      //se é novo imovel
}

  //excluir imagem
if (isset($_POST['executar']) && $_POST['executar'] == 'Excluir') {
  $fotoid = $_POST['fotoid'];
  $imagemnome = $_POST['imagemnome'];
  $fotoexcluir = crudimovel::getInstance(Conexao::getInstance());
  $dados = $fotoexcluir->excluirfotosupload($imagemnome);


  //exclusao de foto da pasta
  $pastaldel = '../imagens';
  unlink($pastaldel . '/' . $imagemnome);
  echo '<div class="ok">Excluida</div>';
}

