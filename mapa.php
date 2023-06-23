<?php
include("config.php");

session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_cadastro'])) {
  die("Usuário não está logado");
}

// Verifica se o botão "Salvar" foi clicado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idLugar']) && isset($_POST['title'])) {
    $idLugar = $_POST['idLugar'];
    $title = $_POST['title'];

    $sql = "SELECT * FROM FAV WHERE id_lugar = ? AND id_cadastro = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $idLugar, $_SESSION['id_cadastro']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      echo "favorito_existente";
      exit;
    }

    // Insere o favorito no banco de dados
    $sql = "INSERT INTO FAV (id_lugar, lugar, id_cadastro) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $idLugar, $title, $_SESSION['id_cadastro']);

    if ($stmt->execute()) {
      echo "favorito_adicionado";
    } else {
      echo "Erro ao adicionar favorito: " . $stmt->error;
    }

    $stmt->close();
  }

  // Verifica se é uma ação de comentar
  if (isset($_POST['coment']) && isset($_POST['idLugar']) && isset($_POST['comentario'])) {
    $idLugar = $_POST['idLugar'];
    $comentario = $_POST['comentario'];

    // Verifica se o comentário já existe para o mesmo usuário e lugar
    $sql = "SELECT * FROM comentario WHERE id_cadastro = ? AND id_lugar = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ii', $_SESSION['id_cadastro'], $idLugar);
    $stmt->execute();
    $result = $stmt->get_result();

    $comentarioExistente = false;
    while ($row = $result->fetch_assoc()) {
      if ($row['comentario'] == $comentario) {
        $comentarioExistente = true;
        break;
      }
    }
    // Insere o comentário no banco de dados
    $sql = "INSERT INTO comentario (comentario, id_cadastro, id_lugar) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sii', $comentario, $_SESSION['id_cadastro'], $idLugar);
    
    if ($stmt->execute()) {
      $commentId = $stmt->insert_id;
    
      // Obter o texto do comentário a partir do ID do cadastro, ID do lugar e ID do comentário
      $sql = "SELECT comentario FROM comentario WHERE id_cadastro = ? AND id_lugar = ? AND cd_comentario = ?";
      $stmt = $conexao->prepare($sql);
      $stmt->bind_param('iii', $_SESSION['id_cadastro'], $idLugar, $commentId);
      $stmt->execute();
      $result = $stmt->get_result();
    
      if ($row = $result->fetch_assoc()) {
        $comentario = $row['comentario'];
    
        // Construir a resposta incluindo o commentId e o texto do comentário
        $response = 'comentario_adicionado:' . $commentId . ':' . $comentario;
        $coment = $comentario .' - '.'1 avaliações';
      } else {
        echo "Erro ao obter o texto do comentário";
      }
    } else {
      echo "Erro ao adicionar comentário: " . $stmt->error;
    }
    

    $stmt->close();
  }

$conexao->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-mapa.css">
    <script src= "./js/scriptmap.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNBI2kYX3g6lGasP_8lCqTceyhZwHBXw&libraries=places&callback=initMap" async defer></script>
    <title>Urban Club</title>
 
    
</head>
<body>
    <header>
        <div class="btn-login">
           <button class="logotipo">
           <a href="index.html">
            <img style=" width: 53px; height: 53px;" src="./img/image 10.png" alt="logo" class="logo">
            </a>
           </button>

           <button  class="teste" type="submit">
    <a href="./conta.php">
    <img src="./img/Login.svg" alt="login" class="login">
    </a>
    </button>
        </div>
        
                <div class="vl"></div> 
                
         </header>

<div id="map"></div>

    <div id="aside" class="hidden">
     
        <img id="marker-photo" src="" alt="Foto do Marcador">
        <h1 id="marker-name"></h1>
        <div id="local-info">
          <li>
            <img id="tipo-imagem" src="" alt="Tipo de Local"><div id="typel"></div>
          </li>
          <div class="container">
            <div id="log"><p>0</p></div>
            <div class="feedback">

              <div class="rating">
                <input type="radio" name="rating" id="rating-5">
                <label for="rating-5"></label>
                <input type="radio" name="rating" id="rating-4">
                <label for="rating-4"></label>
                <input type="radio" name="rating" id="rating-3">
                <label for="rating-3"></label>
                <input type="radio" name="rating" id="rating-2">
                <label for="rating-2"></label>
                <input type="radio" name="rating" id="rating-1">
                <label for="rating-1"></label>
              </div>
            </div>
          </div>        
        </div>
        <div id="imgrow">
  <button id="btn-rota" type="button" class="btn-with-hover-text">
    <img src="./img/rota.png" alt="rotas">
    <span class="hover-text">Criar rota</span>
  </button>
  <form method="POST">
  <button id="btn-salvar" type="submit"  class="btn-with-hover-text" name="salvar">
    <img src="./img/salvar.png" alt="salvar">
    <span class="hover-text">Favoritar lugar</span>
  </button>
</form>
<!-- Eu tentei tirar do form e fechar só no btn-coment, ele não funcionou-->
<form method="POST" action="mapa.php">

  <button id="btn-coment" type="submit" class="btn-with-hover-text" name="coment">
    <img src="./img/coment.png" alt="comentário">
    <span class="hover-text">Comentar</span>
  </button>
 <!-- Não mexe, só arruma a aparencia-->
  <button id="btn-compar" type="button" class="btn-with-hover-text">
    <img src="./img/compar.png" alt="compartilhar">
    <span class="hover-text">Compartilhar</span>
  </button>
</div>

     
    <div id="lane1">
      <ul class="image-list"></ul>
      <div id="local-info">
      <li><img src="./img/local.png" alt="Imagem 1"> <div id="tipo-local">
      </div></li>
      <li><img src="./img/aberto.png" alt="Imagem 2"> <div id="aberto-24h">
      </div></li>
      <li><img src="./img/icpubli.png" alt="Imagem 3"> <div id="localizacao">
      </div></li>
      </ul>
    </div>
    </div>
    <div id="lane2">
    <form method="POST" action="mapa.php">
    <input type="hidden" name="idCadastro" value="1"> <!-- Substitua o valor do campo com o ID do cadastro do usuário logado -->
    <input type="hidden" name="idLugar" value="1"> <!-- Substitua o valor do campo com o ID do lugar onde o comentário está sendo adicionado -->
    <label for="comentario">Comentários:</label><br>
    <textarea name="comentario" id="comentario" rows="1" placeholder="Comentar"></textarea><br><br>
  </form>
  <hr>
  <div id="comentarios-container">
<<<<<<< HEAD
  <div class="comentario comentario-branco" data-id="1">
<?php 
if (!empty($coment)) {
  echo '<div style="display: flex; align-items: center; position: fixed; top: 0; left: 0;">';
  echo '<img src="./img/perfil.png" alt="Imagem do perfil" width="50" height="50" style="margin-right: 10px;">';
  echo '<div>';
  echo $_SESSION['apelido'] . '<br>';
  echo $coment;
  echo '</div>';
  echo '</div>';
=======
  <div class="comentario" data-id="1">
  <?php 
  if (!empty($coment)) { 
    echo $_SESSION['apelido'];
  }
  ?>
<br>
<?php
if (!empty($coment)) { 
  echo $coment ;
>>>>>>> 8d79d9434cbfe48e8eab6e8bc22118d9ba968863
}
?>
  </div>
</div>




    </div>
  </div>
    <div class="btn-container">
        <div class="canto">
            <button id="btn-skate" class="skate">Pistas de Skate</button>
            <button id="btn-basquete" class="basquete">Quadras de Basquete</button>
            <button id="btn-tudo" class="tudo">Mostrar todos</button>
        </div>
        <div class="pesq">
            <input id="search-input" type="text" placeholder="Buscar em Santos">
            <button id="search-btn" type="button">Pesquisar</button>
            <button id="center-button" type="button"><img src="./img/localizador.png"></button>
        </div>
    </div>
</body>
</html>