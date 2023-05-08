function initMap() {
    const center = new google.maps.LatLng(-23.991249, -46.302834);
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: center,
    });
    const svgMarker = {
        path: "M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
        fillColor: "blue",
        fillOpacity: 0.6,
        strokeWeight: 0,
        rotation: 0,
        scale: 2,
        anchor: new google.maps.Point(0, 20),
    };

    new google.maps.Marker({
        position: map.getCenter(),
        icon: svgMarker,
        map: map,
    });
}

window.initMap = initMap;