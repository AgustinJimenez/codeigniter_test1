<link rel="stylesheet" href="<?= base_url('public/css/leaflet.css') ?>"/>
<style>
#mapContainer
{
    height: 360px;
    margin: 0px;
    padding: 0px;
}
</style>


<p>THIS IS TRACES INDEX</p>
<div id="mapContainer"></div>

<script src="<?= base_url('public/js/leaflet.js') ?>"></script>
<script>
    /*
    -25.3240313 , -57.5213912, 12.5
    */
    var map = L.map('mapContainer').setView([51.505, -0.09], 13);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
    {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();
</script>