var map;
//skate
var marker1 = {
  position: { lat: -23.9616758, lng: -46.3167502 },
  title: "Praça Palmares",
  type: "skate",
  photoUrl: "./img/praça-plamares.png"
};

var marker2 = {
  position: { lat: -23.968807732192566, lng: -46.35150499213918 },
  title: "Pista Quebra Mar",
  type: "skate",
  photoUrl: "url_da_foto_skate.jpg"

};

var marker3 = {
  position: { lat: -23.947473172399416, lng: -46.3538606979173 },
  title: "Lagoa Skate Plaza",
  type: "skate",
  photoUrl: "url_da_foto_skate.jpg"
};

//basquete

var marker4 = {
  position: { lat: -23.968618795130748, lng: -46.35038078657946 },
  title: "Quadra Quebra-Mar",
  type: "basquete",
  photoUrl: "url_da_foto_skate.jpg"
};

var marker5 = {
  position: { lat: -23.978323795344334, lng: -46.30096832729573 },
  title: "Quadra Abor",
  type: "basquete",
  photoUrl: "url_da_foto_skate.jpg"
};

var marker6 = {
  position: { lat: -23.93471937248423, lng: -46.321169032077776 },
  title: "Ginásio SDAS",
  type: "basquete",
  photoUrl: "url_da_foto_skate.jpg"
};

var markers = [marker1, marker2, marker3, marker4, marker5, marker6];

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
      visible: true,
      type: markers[i].type,
      photoUrl: markers[i].photoUrl
    });
    markers[i].marker = marker;
  
    marker.addListener('click', function() {
      var aside = document.getElementById('aside');
      aside.classList.remove('hidden');

      var markerName = document.getElementById('marker-name');
      var markerPhoto = document.getElementById('marker-photo');
      markerName.textContent = this.getTitle();
      markerPhoto.src = this.photoUrl;
      
    });
  }
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

  document.getElementById('btn-basquete').addEventListener('click', function() {
    filterMarkers('basquete');
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