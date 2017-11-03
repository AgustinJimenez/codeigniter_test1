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
    '</form>'+
);
</script>