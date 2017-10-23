<script type='text/javascript'>

    var CONTENT_CONTAINER = $(".content.container-fluid");

    $("body").on('click', 'a', function(event)
    {
        var link = $(this).attr("href");
        if( prevent_link( link ) )
        {
            event.preventDefault();
            get( link );
        }
           
    });

    $("body").on('submit', 'form', function(event)
    {
        event.preventDefault();
        if( $(this).attr('method') == 'post' )
            post( $(this).attr('action'), $(this).serialize() );
    });

    function prevent_link( link )
    {
        prevent = true;

        if( link.slice(-1) == "#" )
            prevent =  false;

        else if( link.indexOf('auth/logout') >= 0 )
            prevent =  false;

        return prevent;
    }

    function get( url )
    {
        $.get( url, function( data ) 
        {
            CONTENT_CONTAINER.html( data );
        });
    }

    function post( url, params )
    {
        //console.log(url, params);

        $.ajax
        ({
            type: "POST",
            url: url,
            data: params,
            dataType: "json"
        })
        .always(function(data) 
        {
            //console.log( "finished", data );
            CONTENT_CONTAINER.html( data.responseText );
        });

/*      
        $.post(url, {params},
        function(data, status)
        {
            CONTENT_CONTAINER.html( data );
        });
*/ 
        
    }
    
</script>