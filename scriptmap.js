var mymap = L.map('mapid').setView([-23.9608, -46.3331], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);

        L.marker([-23.9608, -46.3331]).addTo(mymap)
            .bindPopup("<b>Santos - SP </b>").openPopup();

        


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
mymap.dragging.disable();
mymap.touchZoom.disable();
mymap.tap.disable();
// cria um ícone personalizado para o marcador
var icon = L.icon({
    iconUrl: 'path/to/icon.png',
    iconSize: [32, 32],
    popupAnchor: [0, -16]
});

// cria um marcador com o ícone personalizado e adiciona um pop-up com informações
var marker = L.marker([-23.9608, -46.3331], {icon: icon}).addTo(mymap)
    .bindPopup("<b>Santos - SP </b>").openPopup();

