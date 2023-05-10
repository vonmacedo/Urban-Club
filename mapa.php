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

        <img src="./img/Login.svg" alt="login" class="login">
        </div>
        
                <div class="vl"></div> 
         </header>
       

             <div id="map">

    </div>
    
  
    <div class="btn-container">
    <div class="canto">
        <button id="btn-skate" class="skate">  Pistas de Skate</button>
        <button id="btn-basquete" class="basquete"> Quadras de Basquete</button>
      </div>
      <div class = "pesq">
        <input id="search-input" type="text" placeholder="Buscar em Santos">
        <button id="search-btn" type="button">Pesquisar</button>
      </div>
      </div>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNBI2kYX3g6lGasP_8lCqTceyhZwHBXw&callback=initMap"
    async defer></script>

   
</body>
</html>