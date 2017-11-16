<script type='text/javascript'>
    function enter_was_clicked_on_input( tr )
    {
      console.log("here");
    }

    function initMap( v_lat, v_lng, v_zoom) 
    {
      map = new google.maps.Map(document.getElementById('map'), 
      {
          center: { lat: v_lat, lng: v_lng },
          zoom: v_zoom,
          mapTypeControl: true,
          panControl: false,
          zoomControl: true,
          streetViewControl: true
      });

      map.addListener('rightclick',  function(event) 
      { 
        show_right_click_menu( event.latLng );
      });
      map.addListener('click',  function(event) 
      { 
        remove_right_click_menu();
      });
      directionsDisplay.setMap(map);

    };

    function set_origin_input( position )
    {
      INPUT_ORIGIN.val( position.lat + ', ' + position.lng );
    }
    function set_end_input( position )
    {
      INPUT_END.val( position.lat + ', ' + position.lng );
    }

    function set_position_on_input( position, type = 'origin' )
    {
      if( type == 'origin')
        set_origin_input( position );
      else
        set_end_input( position );

    }

    function set_end_point(element, type = 'end')
    {
      set_new_point( element, type );
    }

    function set_waypoint_point(element, type = 'waypoint')
    {
      set_new_point( element, type );
    }

    function set_marker( components, type = 'origin' )
    {
      var default_title = (type=='origin') ? 'Origin Marker' : 'End Marker';
      var default_icon = (type=='origin') ? '<?= base_url('public/img/marker-24-blue.png')?>' : (type=='end') ? '<?= base_url('public/img/marker-24-red.png')?>' : '<?= base_url('public/img/waypoint-24-black.png')?>' ;
      var default_position = (type=='origin') ? {lat: v_lat+0.01, lng: v_lng-0.05 } : {lat: v_lat-0.01, lng: v_lng+0.05 } ;

      var marker =  new google.maps.Marker
      ({
        position: components.position ? components.position : default_position,
        map: map,
        title: components.title ? components.title : default_title,
        draggable: components.draggable ? components.draggable : true,
        animation: components.animation ? components.animation : google.maps.Animation.DROP,
        icon: components.icon ? components.icon : default_icon,
        type: type
      });

      marker.addListener('click', marker_has_changed(marker) );
      return marker;

    }

    function marker_has_changed( marker )
    {
      console.log();
    }

    function delete_waypoint( index )
    {
      waypoints[index].setMap(null);
      waypoints.splice(index, 1);
      refresh_waypoints_table();
    }

    function refresh_waypoints_table()
    {
      var tmp_tbody_html = '';
      for (var i = 0; i < waypoints.length; i++) 
      {
        tmp_tbody_html += '<tr waypoint="'+i+'">'+
                            '<td colspan="2">#'+(i+1)+'</td>'+
                            '<td class="text-center" colspan="6">'+
                              '<input type="text" class="form-control white-input waypoint waypoint-'+i+'" waypoint="'+i+'" readonly="readonly" name="trace[waypoints]['+i+'][point]" autocomplete="off" value="'+waypoints[i].position.lat()+', '+waypoints[i].position.lng()+'">'+
                            '</td>'+
                            '<td colspan="2"> <i class="btn btn-flat btn-danger fa fa-trash-o delete-waypoint" aria-hidden="true"></i> </td>'
                          +'</tr>';
      }
      TABLE_WAYPOINTS.children('tbody').html( tmp_tbody_html );
    }

    function set_new_point( point_position_ui_element, type = 'origin', is_object = false )
    {
      var position = {};
      if( !is_object )
        position = {lat: parseFloat( $(point_position_ui_element).attr('lat') ), lng: parseFloat( $(point_position_ui_element).attr('lng') ) };
      else
        position = {lat: parseFloat( point_position_ui_element.lat ), lng: parseFloat( point_position_ui_element.lng ) };

      if( point_position_ui_element )
        if( type == 'origin')
        {
          if( !origin_marker )
            origin_marker = set_marker( { position: position }, type );
          else
            origin_marker.setPosition( position );    
          set_position_on_input( position, type );
        }   
        else if( type == 'end')
        {
          if( !end_marker )
            end_marker = set_marker( { position: position }, type );
          else
            end_marker.setPosition( position );

          set_position_on_input( position, type );
          
        }
        else
        {
          waypoints.push( set_marker( { position: position }, type ) );
          refresh_waypoints_table();
        }
        
      remove_right_click_menu();
    }

    function remove_right_click_menu()
    {
      $('.right_click_menu').remove();
    }

    function show_right_click_menu( caurrentLatLng  ) 
    {
      var projection;
      var right_click_menu;
      var tmp_template = '';
      projection = map.getProjection() ;
      remove_right_click_menu();
      right_click_menu = document.createElement("div");
      right_click_menu.className  = 'right_click_menu ';

      if( !origin_marker ) 
        tmp_template += 
          "<a id='menu1' class='btn btn-primary btn-block btn-xs new-origin' lat='"+caurrentLatLng.lat()+"' lng='"+caurrentLatLng.lng()+"' onclick='set_new_point( this )'>"+
            "Origin"+
          "<\/a>";

      if( !end_marker )
        tmp_template += 
          '<a id="menu2" class="btn btn-primary btn-block btn-xs new-end" lat="'+caurrentLatLng.lat()+'" lng="'+caurrentLatLng.lng()+'" onclick="set_end_point( this )">'+
            "Destination"+
          "<\/a>";

      tmp_template += 
        '<a id="menu3" class="btn btn-primary btn-block btn-xs new-end" lat="'+caurrentLatLng.lat()+'" lng="'+caurrentLatLng.lng()+'" onclick="set_waypoint_point( this )">'+
          "Set Waypoint"+
        "<\/a>";

      right_click_menu.innerHTML = tmp_template;
      $(map.getDiv()).append(right_click_menu);
      set_menu_xy(caurrentLatLng);
      right_click_menu.style.visibility = "visible";
      right_click_menu.style.position = "relative";
      right_click_menu.style.width = "100px";
    }

    function get_canvas_xy(caurrentLatLng)
    {
      var scale = Math.pow(2, map.getZoom());
     var nw = new google.maps.LatLng
     (
         map.getBounds().getNorthEast().lat(),
         map.getBounds().getSouthWest().lng()
     );
     var worldCoordinateNW = map.getProjection().fromLatLngToPoint(nw);
     var worldCoordinate = map.getProjection().fromLatLngToPoint(caurrentLatLng);
     var caurrentLatLngOffset = new google.maps.Point
     (
         Math.floor((worldCoordinate.x - worldCoordinateNW.x) * scale),
         Math.floor((worldCoordinate.y - worldCoordinateNW.y) * scale)
     );
     return caurrentLatLngOffset;
  }

    function set_menu_xy(caurrentLatLng)
    {
      var clickedPosition = get_canvas_xy(caurrentLatLng);
      var x = clickedPosition.x ;
      var y = clickedPosition.y ;
      $('.right_click_menu').css('left',x  );
      $('.right_click_menu').css('top',y );
    };


    
    $("#submit").click(function(e)
    {
      calculateAndDisplayRoute(directionsDisplay, directionsService, waypoints, stepDisplay, map);
      e.preventDefault();
    });
    
    function calculateAndDisplayRoute(directionsDisplay, directionsService, waypoints, stepDisplay, map) 
    {
        // First, remove any existing markers from the map.
  /*
        for (var i = 0; i < waypoints.length; i++) 
          waypoints[i].setMap(null);
    */
        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        var waypoints_array = [];
        
        if( waypoints.length )
          for( i = 0; i < waypoints.length ; i++ )
            waypoints_array.push
            ({
              location: waypoints[i].getPosition(),
              stopover: true
            });
          
          
        
        directionsService.route
        ({
          origin: origin_marker.getPosition(),
          destination: end_marker.getPosition(),
          waypoints: waypoints_array,
          travelMode: 'WALKING'
        }, 
        function(response, status) 
        {
          console.log('response = ', response);
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') 
            //document.getElementById('warnings-panel').innerHTML = '<b>' + response.routes[0].warnings + '</b>';
            directionsDisplay.setDirections(response);
            //showSteps(response, waypoints, stepDisplay, map);
          else 
            window.alert('Directions request failed due to ' + status);
        });

      }

/*
directionsService.route
({
    origin: p_origin,
    destination: p_end,
    waypoints: p_waypts,
    optimizeWaypoints: true,
    travelMode: 'DRIVING'
  }, 
  function(response, status) 
  {
    if (status === 'OK') 
    {
      console.log(response);
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      var summaryPanel = document.getElementById('panel');
      summaryPanel.innerHTML = '';
      // For each route, display summary information.
      for (var i = 0; i < route.legs.length; i++) 
      {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
            '</b><br>';
        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
      }
    } 
    else 
      window.alert('Directions request failed due to ' + status);
*/
</script>
