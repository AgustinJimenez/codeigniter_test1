<script type='text/javascript'>
	var EDIT_MARKER_TEMPLATE = 
$(
    '<h4>Edit Marker</h4>'+
    '<form class="edit_marker" action="#" method="post" data-marker-index="{{index}}">'+
        '<p>'+
            '<label for="marker_{{index}}_lat">Latitude:</label>'+
            '<input type="text" id="marker_{{index}}_lat" value="{{lat}}" />'+
        '</p>'+
        '<p>'+
            '<label for="marker_{{index}}_lng">Longitude:</label>'+
            '<input type="text" id="marker_{{index}}_lng" value="{{lng}}" />'+
        '</p>'+
        '<input type="submit" value="Update position" />'+
    '</form>'
);
    function maps_was_clicked( event, map )
    {
        var index = map.markers.length;
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        var template = EDIT_MARKER_TEMPLATE.text();

        var content = template.replace(/{{index}}/g, index).replace(/{{lat}}/g, lat).replace(/{{lng}}/g, lng);

        map.addMarker
        ({
            lat: lat,
            lng: lng,
            title: 'Marker #' + index,
            infoWindow: 
            {
                content : content
            }
        });
    };

    function marker_was_added( marker, map )
    {
        $('#markers-with-index')
        .append
        (
            '<li class="item">'+
                '<a href="#" class="pan-to-marker list-group-item" data-marker-index="' + map.markers.indexOf(marker) + '">' + marker.title + '</a>'
            +'</li>'
        );
    
        $('#markers-with-coordinates')
        .append
        (
            '<li class="item">'
                +'<a href="#" class="pan-to-marker list-group-item" data-marker-lat="' + marker.getPosition().lat() + '" data-marker-lng="' + marker.getPosition().lng() + '">' + marker.title + '</a>'
            +'</li>'
        );
    
    }

    function edit_marker_was_submited()
    {
        
    }
</script>
