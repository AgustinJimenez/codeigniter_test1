<script type='text/javascript'>

    function template_prevent_link( link )
    {
        prevent = true;

        if( link.slice(-1) == "#" )
            prevent =  false;

        else if( link.indexOf('auth/logout') >= 0 )
            prevent =  false;

        return prevent;
    }

    function template_back_button_was_clicked()
    {
        left_arrow_was_clicked();
    }

    function template_get( url )
    {
        $.get( url, function( data ) 
        {
            template_change_content_container( data, url );
        });
    }

    

    function template_post( url, params )
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
            template_change_content_container( data.responseText, null );
        });
        
    }

    function template_get_last_url_visited()
    {
        return TEMPLATE_VISITED_URLS.slice(-1)[0];
    }

    function template_drop_last_url()
    {
        TEMPLATE_VISITED_URLS.pop();
    }

    function left_arrow_was_clicked()
    {
        template_drop_last_url();
        var last_url = template_get_last_url_visited();
        //console.log(TEMPLATE_VISITED_URLS, 'last= '+last_url);
        if(last_url)
            template_get( last_url );
    }

    function template_add_visited_url(url)
    {
        if(url != template_get_last_url_visited() )
            TEMPLATE_VISITED_URLS.push( url );
    }

    function template_remove_duplicated_visiteds_url()
    {
        if( TEMPLATE_VISITED_URLS.length > 1 )
        TEMPLATE_VISITED_URLS.forEach(function(item, index)
        {
        
            if( TEMPLATE_VISITED_URLS[index + 1] )
                if( item == TEMPLATE_VISITED_URLS[index + 1])
                    TEMPLATE_VISITED_URLS.splice(index + 1, 1);
        });
    }

    function f5_was_clicked()
    {

        var last_url = template_get_last_url_visited();
        if(last_url)
            template_get( last_url );
    }

    function template_change_content_container( html, url )
    {
        TEMPLATE_CONTENT_CONTAINER.html( html );
        if(url)
            template_add_visited_url(url);
    }

</script>