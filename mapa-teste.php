<!DOCTYPE html>

<html>

<head>

  <title>Mapa com Favoritos</title>

  <style>

    #map {

      height: 400px;

      width: 100%;

    }




    #favoritar-button {

      background-color: #4CAF50;

      color: white;

      padding: 10px 20px;

      font-size: 16px;

      border: none;

      cursor: pointer;

      margin-top: 10px;

    }




    #favoritar-button:hover {

      background-color: #45a049;

    }

  </style>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNBI2kYX3g6lGasP_8lCqTceyhZwHBXw&libraries=places&callback=initMap" async defer></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>

    var map;

    var marker;




    // Função para inicializar o mapa

    function initMap() {

      map = new google.maps.Map(document.getElementById('map'), {

        center: {lat: -34.397, lng: 150.644},

        zoom: 8

      });




      // Adicione um evento de clique no mapa para adicionar marcadores

      map.addListener('click', function(event) {

        // Remova o marcador existente, se houver

        if (marker) {

          marker.setMap(null);

        }




        // Crie um marcador no local clicado

        marker = new google.maps.Marker({

          position: event.latLng,

          map: map

        });

      });

    }




    // Função para favoritar um lugar

    function favoritarLugar() {

      if (marker) {

        var latitude = marker.getPosition().lat();

        var longitude = marker.getPosition().lng();




        // Fazer uma requisição AJAX para a API de favoritar

        $.ajax({

          url: 'favoritar.php',

          method: 'POST',

          data: {

            latitude: latitude,

            longitude: longitude

          },

          success: function(response) {

            alert('Lugar favoritado com sucesso!');

          },

          error: function(xhr, status, error) {

            alert('Erro ao favoritar o lugar: ' + error);

          }

        });

      } else {

        alert('Selecione um local no mapa antes de favoritar.');

      }

    }

  </script>

</head>

<body>

  <div id="map"></div>

  <button id="favoritar-button" onclick="favoritarLugar()">Favoritar</button>

</body>

</html>


