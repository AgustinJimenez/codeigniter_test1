<script type='text/javascript'>

	$(".white-input").keyup(function(event) 
	{
		if( event.originalEvent.key == "Enter" )
			enter_was_clicked_on_input( $(this).closest('tr') );
	});

	INPUT_ORIGIN.on('blur', function()
	{
		if (e.keyCode == '13' || e.keyCode == '9')
		{
			var tmp_array = $(this).val().split(',');
			var position = {lat: tmp_array[0], lng: tmp_array[1]};
			set_new_point( position, type = 'origin', true );
		}
	});

	INPUT_END.on('keypress', function(e)
	{
		if ( e.keyCode == '13' || e.keyCode == '9' )
		{
			var tmp_array = $(this).val().split(',');
			var position = {lat: tmp_array[0], lng: tmp_array[1]};
			set_new_point( position, type = 'end', true );
		}
		
	});

	$("body").on('click', '.delete-waypoint', function()
	{
		delete_waypoint( parseInt( $(this).closest("tr").attr('waypoint') ) );
	});

</script>