<?php
include("config.php");

session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_cadastro'])) {
  die("Usuário não está logado");
}
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-conta.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <script src="./js/scriptacc.js" defer></script>
    <link rel="stylesheet" href="./resposivdade.css">
    <title>
        Urban Club 
    </title>
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
</header>
<div class="start">
<div class="usercenter">

    <img src="./img/perfil.png">
    <div class="text-container">
    <h1 class="name"><?php echo $_SESSION['apelido']; ?></h1>
      <div class="button-container">
        <button class="btnprivatemap">Editar Perfil</button>
        <button class="btnfollow">Editar Mapa Privado</button>
      </div>
      <h2 class ="mail"><?php echo $_SESSION['email']; ?></h2>
      <div class="info-container">
        <h3>0</h3>
        <h3>AMIGOS</h3>
        <h3>0</h3>
        <h3>LOCAIS SALVOS</h3>
        <h3>1</h3>
        <h3>AVALIAÇÕES</h3>
      </div>
      <p class="desc">
        || FOTOGRAFIA || LIVROS || BASQUETE || MÚSICA
<br >T.I. ETEC ETEC ARISTÓTELES FERREIRA <br class="d2">
17y repletos de muitos momento, livros e música

      </p>
    </div>
  </div>
</div>

<div class="friend-container">
  <p class="am">Amigos</p>
  <div class="friend-info">
    <div class="friend">
      <img src="./img/recco.png" alt="foto-recco">
      <p class="friend-name">Recco</p>
    </div>
    <div class="friend">
      <img src="./img/andrey.png" alt="foto-andrey">
      <p class="friend-name">Andrey</p>
    </div>
    <div class="friend">
      <img src="./img/lipe.png" alt="foto-lipe">
      <p class="friend-name">Lipe</p>
    </div>
    <div class="friend">
      <img src="./img/gabriel.png" alt="foto-gabriel">
      <p class="friend-name">Gabriel</p>
</div>

      <div class="friend">
<img src="./img/jv.png" alt="foto-joao">
<p class="friend-name">Jão</p>
</div>

<div class="friend">
<img src="./img/add.png" alt="">

<p class="friend-name">Adicionar Amigo</p>
</div>


</div>
      </div>
    </div>
  </div>
</div>


</div>
<div class="aval">
<h1 class="ava">AVALIAÇÕES</h1>

<div class="avaliacoes-container">

<div class="tes">
  <?php
  $query = "SELECT C.comentario, L.titulo
            FROM comentario AS C
            INNER JOIN lugares AS L ON C.id_lugar = L.id_lugar
            WHERE C.id_cadastro = {$_SESSION['id_cadastro']}";

  $result = mysqli_query($conexao, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $comentario = $row['comentario'];
      $lugar = $row['titulo'];

      echo "<div class='avaliacao'>";
      echo "<h3>Comentário: " . $comentario . "</h3>";
      echo "<p>Lugar: " . $lugar . "</p>";
      echo "</div>";
    }
  } else {
    echo "<p>Não há avaliações disponíveis.</p>";
  }

  // Libera os resultados
  mysqli_free_result($result);
  ?>
  </div>
</div>
</div>
  </div>
</div>

<div class="lugarvisitado">

        <?php
        // Obtém os lugares favoritos do usuário
        $query = "SELECT lugares.id_lugar, lugares.titulo, lugares.longitude, lugares.latitude FROM FAV 
        INNER JOIN lugares ON FAV.id_lugar = lugares.id_lugar
        WHERE FAV.id_cadastro = {$_SESSION['id_cadastro']}";

        // Execute the query
        $result = mysqli_query($conexao, $query);

        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idLugar = $row['id_lugar'];
                $titulo = $row['titulo'];
                $longitude = $row['longitude'];
                $latitude = $row['latitude'];

                // Check if there is an image for the current place
                if (isset($imagensFavoritos[$idLugar])) {
                    $imagem = $imagensFavoritos[$idLugar];
                } else {
                    // Use the placeholder image if no specific image is available
                    $imagem = './img/placeholder.jpg';
                }
        ?>

                <div class="favorito">
                    <h3><?php echo $titulo; ?></h3>
                   
                   <button> <img src="<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>" data-id-lugar="<?php echo $idLugar; ?>">
                   </button>
                  </div>

        <?php
            }
        } else {
            // If there are no favorite places
            echo "<p>Não há lugares favoritos.</p>";
        }
      
        // Libera os resultados e fecha a conexão
        mysqli_free_result($result);
        mysqli_close($conexao);
        ?>

    </div>
</div>
<footer>
    <div class="base">
    <div class="esqurda">
      <button class="pi">
        <div class="ub">
          <a href="index.html">
            <img src="./img/Urban.png" height="60px" class="pi1">
          </a> 
        </div>
      </button>

      <div class="insta">
        <img src="./img/insta.png" onclick="window.location.href='https://www.instagram.com/UrbanClubSantos/';" style="cursor: pointer;"> 
        <p ><a href="https://www.instagram.com/UrbanClubSantos/">Instagram</a></p> 
      </div>

      <div class="rede">
        <img src="./img/DISCOED.png" onclick="window.location.href='https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08';" style="cursor: pointer;">
        <p ><a href="https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08">Discord</a></p> 
      </div>
    </div>

    <div class="direita">
      <h1>Desenvolvedores</h1>
      <p>Andrey Vanolli</p>
      <p>Felipe Amaral</p>
      <p>Gabriel Cosme</p>
      <p>Gabriel Recco</p>
      <p class="jm">João Macedo</p>
      <h1>Contato da empresa </h1>
      <p>urbanclub07@gmail.com</p>
    </div>

    <div class="meio">
      <div class="artista">
        <div class="art">
          <img src="./img/artista.png">
          <p>Arte:</p>
          <p>Patricio Diniz</p>
        </div>
      </div>
      <div class="insta2">
        <img src="./img/insta.png" onclick="window.location.href='https://www.instagram.com/patricio.ilustra/';" style="cursor: pointer;"> 
        <p><a href="https://www.instagram.com/patricio.ilustra/">patricio.ilustra</a></p> 
      </div>
      <div class="insta2">
        <img src="./img/Behance.png" onclick="window.location.href='https://www.behance.net/PatricioDiniz';" style="cursor: pointer;"> 
        <p><a href="https://www.behance.net/PatricioDiniz">Patricio Diniz</a></p> 
      </div>
    </div>

    <div class="canto2">
      <h1>Legal</h1>
      <p>Politica de privacidade</p>
      <p>Termos de uso</p>  
      <p class="rules">2023 direitos reservados</p>
    </div>
  </div>
</footer>
</body>
</html>
