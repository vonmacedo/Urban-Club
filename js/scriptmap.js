var map;
var currentMarkerPosition;
var currentRoute = null;
var directionsService;
var directionsRenderer;
var idLugarmap;
var titilemap;
var centerButton = document.getElementById("center-button");
const tipoImagem = document.getElementById('tipo-imagem');
const typel = document.getElementById('typel')
var markers = [
  {
    idLugar:1,
    position: { lat: -23.9616758, lng: -46.3167502 },
    title: "Praça Palmares",
    type: "skate",
    photoUrl: "./img/praça-plamares.png",
    tempo: "Todos os dias 24 horas.",
    icpv: "Publico."
  },
  {
    idLugar:2,
    position: { lat: -23.968807732192566, lng: -46.35150499213918 },
    title: "Pista Quebra Mar",
    type: "skate",
    photoUrl: "./img/skate-quebra-mar.jpg",
    tempo: "Todos os dias 8H as 22H.",
    icpv: "Publico."
  },
  {
    idLugar:3,
    position: { lat: -23.947473172399416, lng: -46.3538606979173 },
    title: "Lagoa Skate Plaza",
    type: "skate",
    photoUrl: "./img/lagoa.png",
    tempo: "Todos os dias 8H AS 22H.",
    icpv: "Publico."
  },
  {
    idLugar:4,

    position: { lat: -23.968618795130748, lng: -46.35038078657946 },
    title: "Quadra Quebra-Mar",
    type: "basquete",
    photoUrl: "./img/bas-quebra-mar.jpeg",
    tempo: "Todos os dias 8H as 22H.",
    icpv: "Publico."
  },
  {
    idLugar:5,

    position: { lat: -23.978323795344334, lng: -46.30096832729573 },
    title: "Quadra Abor",
    type: "basquete",
    photoUrl: "./img/abor-quadra-bas.jpg",
    tempo: "Segunda a sexta (8H AS 19H).",
    icpv: "Publico."
  },
  {
    idLugar:6,

    position: { lat: -23.93471937248423, lng: -46.321169032077776 },
    title: "Ginásio SDAS",
    type: "basquete",
    photoUrl: "./img/bas-ginasio-sdas.jpg",
    tempo: "Segunda a sexta (14H AS 22H).",
    icpv: "Privado."
    
  }
];

function initMap() {
  const bounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(-23.98604, -46.396624), // South west of Santos
    new google.maps.LatLng(-23.928531, -46.266352) // North east of Santos
  );

  const options = {
    bounds: bounds,
    strictBounds: true,
    types: ['establishment'], // limita a pesquisa a estabelecimentos comerciais
    componentRestrictions: { country: 'br' } // limita a pesquisa ao Brasil
  };

  const input = document.getElementById('search-input');
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -23.9608, lng: -46.3331 },
    zoom: 12,
    restriction: {
      latLngBounds: {
        north: -23.8866,
        south: -24.0305,
        east: -46.2521,
        west: -46.4295
      },
      strictBounds: true
    },
    disableDefaultUI: true
  });

  function searchPlace() {
    const input = document.getElementById('search-input');
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: input.value }, (results, status) => {
      if (status === 'OK') {
        const location = results[0].geometry.location;
        map.setCenter(location);
        map.setZoom(15);
      } else {
        alert('Não foi possível encontrar o local.');
      }
    });
  }

  document.getElementById('search-btn').addEventListener('click', searchPlace);
  for (var i = 0; i < markers.length; i++) {
    var marker = new google.maps.Marker({
      position: markers[i].position,
      title: markers[i].title,
      map: map,
      visible: false, // Começa oculto
      type: markers[i].type,
      photoUrl: markers[i].photoUrl,
      tempo: markers[i].tempo, 
      icpv: markers[i].icpv,
      idLugar: markers[i].idLugar,
      icon: {
        url: './img/1con.png', // URL da imagem do ícone personalizado
        scaledSize: new google.maps.Size(25, 30), // Tamanho do ícone
        origin: new google.maps.Point(0, 0), // Ponto de origem do ícone
        anchor: new google.maps.Point(25, 50) // Ponto de ancoragem do ícone
      }
    });
    markers[i].marker = marker;
    marker.addListener('click', function() {
      var aside = document.getElementById('aside');
      aside.classList.remove('hidden');

      document.getElementById('localizacao').textContent = this.position;
      document.getElementById('aberto-24h').textContent = this.tempo;
      document.getElementById('tipo-local').textContent = this.icpv;

      var markerName = document.getElementById('marker-name');
      var markerPhoto = document.getElementById('marker-photo');
      markerName.textContent = this.getTitle();
      markerPhoto.src = this.photoUrl;

   
    currentMarkerPosition = this.getPosition();
    if (this.type === 'basquete') {
      tipoImagem.src = './img/basquete.png';
      typel.textContent = 'Basquete';
    } else if (this.type === 'skate') {
      tipoImagem.src = './img/skate.png';
      typel.textContent = 'Skate';
    }
  });
  map.addListener('click', function(event) {
    var aside = document.getElementById('aside');
    var asideContent = document.getElementById('aside-content');

    // Verifica se o clique ocorreu fora do aside
    if (!aside.contains(event.target) && asideContent !== event.target) {
      aside.classList.add('hidden'); // Adiciona a classe 'hidden' para esconder o aside
    }
  });

  document.getElementById('btn-skate').addEventListener('click', function() {
    filterMarkers('skate');
  });
  document.getElementById('btn-tudo').addEventListener('click', function() {
    showAllMarkers();
  });
  function showAllMarkers() {
    for (var i = 0; i < markers.length; i++) {
      markers[i].marker.setVisible(true);
    }
  }
  centerButton.addEventListener("click", function() {
    // Verifica se o navegador suporta a API de geolocalização
    if (navigator.geolocation) {
        // Obtém a localização atual do usuário
        navigator.geolocation.getCurrentPosition(function(position) {
            // Obtém as coordenadas de latitude e longitude da localização atual
            var userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                behavior: 'smooth'
            };

            // Centraliza o mapa na localização atual do usuário
            map.setCenter(userLocation);
        });
    }
});
  document.getElementById('btn-basquete').addEventListener('click', function() {
    filterMarkers('basquete');
  });

  navigator.geolocation.getCurrentPosition(function(position) {
    userPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    const userMarker = new google.maps.Marker({
      position: userPosition,
      map: map,
      title: 'Sua localização',
      icon: {
        url: './img/inicio.png', // URL da imagem do ícone personalizado
        scaledSize: new google.maps.Size(15, 15), // Tamanho do ícone
        origin: new google.maps.Point(0, 0), // Ponto de origem do ícone
        anchor: new google.maps.Point(25, 50) // Ponto de ancoragem do ícone
      }
    });
  }, function() {
    window.alert('Não foi possível obter a localização do usuário.');
  });
  map.setOptions({ styles: [{ featureType: 'poi', elementType: 'labels', stylers: [{ visibility: 'off' }] }] });
  document.addEventListener('DOMContentLoaded', function() {
    
});
}

function filterMarkers(type) {
  for (var i = 0; i < markers.length; i++) {
    if (markers[i].type == type) {
      markers[i].marker.setVisible(true);
    } else {
      markers[i].marker.setVisible(false);
    }
  }
}

function createRoute(destination) {
  if (currentRoute) {
    currentRoute.setMap(null); // Remove a rota atual do mapa
    currentRoute = null; // Define a rota atual como null
  }

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

  var routeOptions = {
    origin: userPosition,
    destination: destination,
    travelMode: 'DRIVING' // Modo de transporte (DRIVING, WALKING, etc.)
  };

  directionsService.route(routeOptions, function(response, status) {
    if (status === 'OK') {
      directionsRenderer.setDirections(response);
      currentRoute = directionsRenderer;
    } else {
      window.alert('Falha ao calcular a rota: ' + status);
    }
  });
}

var btnRota = document.getElementById('btn-rota');

// Adiciona o evento de clique ao botão
btnRota.addEventListener('click', function() {
  if (currentMarkerPosition) {
    createRoute(currentMarkerPosition);
  }
});

// Obtém a localização do usuário
navigator.geolocation.getCurrentPosition(function(position) {
  userPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
}, function() {
  window.alert('Não foi possível obter a localização do usuário.');
});
}



  function addfav(marker) {
    var dados = {
      idLugar: marker.idLugar,
      title: marker.title
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "mapa.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // A solicitação foi concluída com sucesso
        console.log(xhr.responseText);
      }
    };
    xhr.send(JSON.stringify(dados));
  }


document.addEventListener("DOMContentLoaded", function() {
  var form = document.querySelector(".coment_form");
  var input = document.querySelector("#comentario");
  var review = document.querySelector(".review");

  form.addEventListener("submit", function(event) {
    event.preventDefault();
    var comentario = input.value;
    if (comentario.trim() !== "") {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "comentario.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          review.innerHTML = "<p>" + comentario + "</p>";
          input.value = "";
        }
      };
      xhr.send("comentario=" + encodeURIComponent(comentario));
    }
  });
});
$('marker').click(function() {
  // Obtém os dados do lugar clicado
  var idLugar = $(this).data('idLugar');
  var titulo = $(this).data('title');

  // Envia os dados para o PHP por meio de uma requisição AJAX
  $.ajax({
    url: 'mapa.php', // O arquivo PHP onde você processará as informações
    method: 'POST',
    data: {
      idLugar: idLugar,
      titulo: titulo
    },
    success: function(response) {
      // Processa a resposta do PHP, se necessário
      alert(response);
    },
    error: function(xhr, status, error) {
      // Trata erros na requisição AJAX, se necessário
      console.error(error);
    }
  });
});
marker.addListener('click', function() {
  var idLugar = this.idLugar;
  var titulo = this.title;

  // Send the data to PHP via AJAX
  $.ajax({
    url: 'mapa.php',
    method: 'POST',
    data: {
      idLugar: idLugar,
      titulo: titulo
    },
    success: function(response) {
      console.log(response);
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
});