<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style-mapa.css">
    <script src= "./scriptmap.js" defer></script>
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
        <h1 id="marker-name"></h1>
        <img id="marker-photo" src="" alt="Foto do Marcador">
        <div id="imgrow">
            <button id="btn-rota" type="button"><img src="./img/rota.png" alt="rotas"></button>
            <button id="btn-salvar" type="button"><img src="./img/salvar.png" alt="salvar"></button>
            <button id="btn-coment" type="button"><img src="./img/coment.png" alt="comentário"></button>
            <button id="btn-compar" type="button"><img src="./img/compar.png" alt="compartilhar"></button>
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
  <h1>ola</h1>
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
        </div>
    </div>
     
    <script src="./scriptmap.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNBI2kYX3g6lGasP_8lCqTceyhZwHBXw&libraries=places&callback=initMap" async defer></script>
</body>
</html>