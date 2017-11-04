<script type='text/javascript'>
    $(document).ready(function()
    {
        var lng = -57.5609935;
        var lat = -25.3361684;
        var zoom = 13;
        var ubications = 
        [
            {
                lat: lat,
                lon: lng,
                title: 'Bangalore',
                html: 'Bangalore, Karnataka, India',
                zoom: 1,
                icon: 'https://maps.google.com/mapfiles/markerA.png'
            },
            {
                lat: lat+0.05,
                lon: lng+0.05,
                title: 'Mumbai',
                html: 'Mumbai, Maharashtra, India',
                zoom: 7,
                icon: 'https://maps.google.com/mapfiles/markerB.png'
            }
        ];
        

        var maplace = new Maplace
        ({
            locations: ubications,
            type: 'directions',
            draggable: true,
            generate_controls: true,
            controls_div: 'controls',
            controls_type: 'list',
            controls_on_map: false,
            controls_title: 'Controles',
            visualRefresh: true
        });
        maplace.Load();

        console.log( maplace );
    });
</script>
