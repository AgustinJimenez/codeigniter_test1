<script type='text/javascript'>
    $(document).ready(function()
    {
        var lng = -57.5609935;
        var lat = -25.3361684;
        var ubication = [lng, lat];
        var zoom = 13;

        var map = new GMaps
        ({
            div: '#map',
            lat: lat,
            lng: lng,
            zoom: zoom
            /*
            click: function(e) 
            {
                maps_was_clicked(e);
            },
            dragend: function(e) 
            {
            }
            */

        });

        GMaps.on('marker_added', map, function( marker ) 
        {
            marker_was_added( marker, map );
        });

        GMaps.on('click', map.map, function(event) 
        {
            maps_was_clicked( event, map );
        });
        
        $(document).on('submit', '.edit_marker', function(e) 
        {
            e.preventDefault();

            var $index = $(this).data('marker-index');

            $lat = $('#marker_' + $index + '_lat').val();
            $lng = $('#marker_' + $index + '_lng').val();

            var template = $('#edit_marker_template').text();

            // Update form values
            var content = template.replace(/{{index}}/g, $index).replace(/{{lat}}/g, $lat).replace(/{{lng}}/g, $lng);

            map.markers[$index].setPosition(new google.maps.LatLng($lat, $lng));
            map.markers[$index].infoWindow.setContent(content);

            $marker = $('#markers-with-coordinates').find('li').eq(0).find('a');
            $marker.data('marker-lat', $lat);
            $marker.data('marker-lng', $lng);
        });

        $(document).on('click', '.pan-to-marker', function(e) 
        {
            e.preventDefault();

            var lat, lng;

            var $index = $(this).data('marker-index');
            var $lat = $(this).data('marker-lat');
            var $lng = $(this).data('marker-lng');

            if ($index != undefined) {
                // using indices
                var position = map.markers[$index].getPosition();
                lat = position.lat();
                lng = position.lng();
            }
            else {
                // using coordinates
                lat = $lat;
                lng = $lng;
            }

            map.setCenter(lat, lng);
        });


    });
</script>