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

      return new google.maps.Marker
              ({
                position: components.position ? components.position : default_position,
                map: map,
                title: components.title ? components.title : default_title,
                draggable: components.draggable ? components.draggable : true,
                animation: components.animation ? components.animation : google.maps.Animation.DROP,
                icon: components.icon ? components.icon : default_icon
              });
    }

    function refresh_waypoints_table()
    {
      var tmp_tbody_html = '';
      for (var i = 0; i < waypoints.length; i++) 
      {
        tmp_tbody_html += '<tr>'+
                            '<td colspan="2">#'+(i+1)+'</td>'+
                            '<td class="text-center" colspan="8">'+
                              '<input type="text" class="form-control white-input waypoint waypoint-'+i+'" waypoint="'+i+'" readonly="readonly" name="trace[waypoints]['+i+'][point]" autocomplete="off" value="'+waypoints[i].position.lat()+','+waypoints[i].position.lng()+'">'+
                            '</td>'+
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
          console.log('waypoint', waypoints);
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
      projection = map.getProjection() ;
      remove_right_click_menu();
      right_click_menu = document.createElement("div");
      right_click_menu.className  = 'right_click_menu ';
      right_click_menu.innerHTML = "<a id='menu1' class='btn btn-primary btn-block btn-xs new-origin' lat='"+caurrentLatLng.lat()+"' lng='"+caurrentLatLng.lng()+"' onclick='set_new_point( this )'>"+
                                      "Set as Origin"+
                                    "<\/a>"+

                                    '<a id="menu2" class="btn btn-primary btn-block btn-xs new-end" lat="'+caurrentLatLng.lat()+'" lng="'+caurrentLatLng.lng()+'" onclick="set_end_point( this )">'+
                                      "Set as End"+
                                    "<\/a>"+

                                    '<a id="menu3" class="btn btn-primary btn-block btn-xs new-end" lat="'+caurrentLatLng.lat()+'" lng="'+caurrentLatLng.lng()+'" onclick="set_waypoint_point( this )">'+
                                      "Set new Waypoint"+
                                    "<\/a>";
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
        directionsService.route
        ({
          origin: origin_marker.getPosition(),
          destination: end_marker.getPosition(),
          travelMode: 'WALKING'
        }, 
        function(response, status) 
        {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') 
          {
            //document.getElementById('warnings-panel').innerHTML = '<b>' + response.routes[0].warnings + '</b>';
            directionsDisplay.setDirections(response);
            showSteps(response, waypoints, stepDisplay, map);
          } 
          else 
            window.alert('Directions request failed due to ' + status);
        });
      }

      function showSteps(directionResult, waypoints, stepDisplay, map) 
      {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) 
        {
          var marker = waypoints[i] = waypoints[i] || new google.maps.Marker;
          marker.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText
          (
            stepDisplay, marker, myRoute.steps[i].instructions, map
          );
        }
      }

      function attachInstructionText(stepDisplay, marker, text, map)
      {
        google.maps.event.addListener(marker, 'click', function() 
        {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
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
