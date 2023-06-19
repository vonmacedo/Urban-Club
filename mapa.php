<?php
include("config.php");
if ($conexao->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_cadastro'])) {
  die("Usuário não está logado");
}

// Obtenha os dados dos lugares
$sql = "SELECT * FROM lugares";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se existem resultados
if ($result->num_rows > 0) {
  // Processa os resultados
  while ($row = $result->fetch_assoc()) {
    // Obtém os dados do lugar
    $idLugar = $row['id_lugar'];
    $titulo = $row['titulo'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];     
  }
} else {
  echo "Nenhum resultado encontrado.";
}
// Verifica se o botão "Salvar" foi clicado
if (isset($_POST['salvar'])) {

  // Insere o favorito no banco de dados
  $sql = "INSERT INTO FAV (id_lugar, lugar, id_cadastro) VALUES (?, ?, ?)";
  $stmt = $conexao->prepare($sql);
  $stmt->bind_param("iss", $idLugar, $titulo, $_SESSION['id_cadastro']);

  if ($stmt->execute()) {
    echo "Favorito adicionado com sucesso.";
  } else {
    echo "Erro ao adicionar favorito: " . $stmt->error;
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

           <button type="submit">
           <a href="./conta.html">
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
            <div id="log"><p>5</p></div>
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
  <button id="btn-coment" type="button" class="btn-with-hover-text">
    <img src="./img/coment.png" alt="comentário">
    <span class="hover-text">Comentar</span>
  </button>
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
    <form class="coment_form" action="" method="post" name="comentario">
  <div class="input-box-coment">
    <label for="comentario"></label>
    <div class="input-coment">
      <input type="text" name="comentario" id="comentario" required placeholder="Comentar">
    </div>
  </div>
  <button id="btn-comentar" type="submit">Comentar</button>
</form>
<div class="review">
  <p>EXEMPLO</p>
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