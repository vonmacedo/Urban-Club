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
                defaultMarkGeocode: false,
                placeholder: "Pesquisar endereço...",


            }).addTo(mymap);