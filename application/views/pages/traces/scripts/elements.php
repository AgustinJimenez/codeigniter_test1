<script type='text/javascript'>
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var stepDisplay = new google.maps.InfoWindow;
    var map = null;
    var origin = null;
    var waypoints = [];
    var origin_marker = null;
    var end_marker = null;
    var v_lng = -57.5609935;
    var v_lat = -25.3361684;
    var v_zoom = 11;

    var INPUT_ORIGIN = $("#origin");
    var INPUT_END = $("#end");
    var TABLE_WAYPOINTS = $("#waypoints-table");
</script>
