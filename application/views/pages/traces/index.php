

<style>
#map
{
    height: 500px;
    width: 1000px;
}
</style>

<div id="map"></div>
<script src="<?= base_url('public/js/leaflet.js') ?>"></script> 
<script>
    /*
    -25.3240313 , -57.5213912, 12.5
    */
    var lng = -25.3240313;
    var lat = -57.5213912;
    var ubication = [lng, lat];
    var zoom = 13;
    var map = L.map('map', 
    {
        zoomControl: true,
        center: ubication,
        zoom: zoom,
        maxZoom: 11
    });

   L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'MapBox'
    }).addTo(map);
</script>