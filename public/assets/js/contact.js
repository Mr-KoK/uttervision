var bounds = [
    [42.9130026312, 75.6166317076],
    [20.5782370061, 30.5092252948],
];
const MAP_MIN_ZOOM = 6;
const MAP_MAX_ZOOM = 15;
$(document).ready(function () {
    var map = L.map("map", {
        maxBounds: bounds,
        minZoom: MAP_MIN_ZOOM,
        // maxZoom: MAP_MAX_ZOOM,
    }).setView([35.834377, 50.998215], 20);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(
        map
    );

    L.marker([35.834377, 50.998215])
        .addTo(map)
        .bindPopup("سلام سلام")
        .openPopup();
    map.on("click", function (e) {
        alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
    });
});
