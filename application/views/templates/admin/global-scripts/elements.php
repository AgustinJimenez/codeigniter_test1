<script type='text/javascript'>

    $("body").on('click', 'a', function(event)
    {
        if( prevent_link( $(this).attr("href") ) )
        {
            event.preventDefault();
            link_was_clicked( $(this) );
        }
           
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

    function link_was_clicked( element )
    {
        load_content( element.attr('href') )
    }

    function load_content( url )
    {
        $.get( url, function( data ) 
        {
            $(".content.container-fluid").html( data );
        });
    }

    
</script>