var mymap = L.map('mapid').setView([-23.9608, -46.3331], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);
        mymap.flyTo([-23.9608, -46.3331], 14.5, {
            duration: 2  // duração em segundos da animação de zoom
          });
          
// cria um ícone personalizado para o marcador (laranja)
var orangeIcon = L.icon({
    iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    shadowSize: [41, 41],
    shadowAnchor: [12, 41]
});


        //  LUGARES SKATE  //

        L.marker([-23.9616758,-46.3167502] ,{icon: orangeIcon}).addTo(mymap)
        .bindPopup("<b>Praça Palmares - Skate</b>").openPopup();

        L.marker([-23.968807732192566, -46.35150499213918],{icon: orangeIcon}).addTo(mymap)
        .bindPopup("<b>Pista Quebra Mar - Skate</b>").openPopup();


        L.marker([-23.947473172399416, -46.3538606979173],{icon: orangeIcon}).addTo(mymap)
        .bindPopup("<b>Lagoa Skate Plaza - Skate</b>").openPopup();
 
                     //BASQUETE

                     L.marker([-23.981093792695667, -46.30005875429928],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Quadra Rebouças - Basquete</b>").openPopup();

                     L.marker([-23.981093792695667, -46.30005875429928],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Quadra Rebouças - Basquete</b>").openPopup();
             
                     L.marker([-23.968618795130748, -46.35038078657946],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Quadra Quebra-Mar - Basquete</b>").openPopup();
             

                     L.marker([-23.978323795344334, -46.30096832729573],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Quadra Abor - Basquete</b>").openPopup();

                     L.marker([-23.97578241620306, -46.311860289747294],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Quadra Abor - Basquete</b>").openPopup();

                     L.marker([-23.93471937248423, -46.321169032077776],{icon: orangeIcon}).addTo(mymap)
                     .bindPopup("<b>Ginásio SDAS - Basquete</b>").openPopup();
        
            mymap.removeControl(mymap.zoomControl);

            L.Control.geocoder({
                defaultMarkGeocode: true,
                placeholder: "Pesquisar endereço...",
              }).addTo(mymap);
              // desabilitar opção de zoom
mymap.scrollWheelZoom.disable();
mymap.doubleClickZoom.disable();
mymap.boxZoom.disable();
mymap.keyboard.disable();

// desabilitar opção de arrastar
mymap.dragging.enable();
mymap.touchZoom.enable();
mymap.tap.disable();


// cria um marcador com o ícone personalizado e adiciona um pop-up com informações
