<?php

add_action( 'admin_menu', 'findzone_add_admin_menu' );
add_action( 'admin_init', 'findzone_settings_init' );


function findzone_add_admin_menu(  ) { 

	add_options_page( 'findzone', 'Findzone', 'manage_options', 'findzone', 'findzone_options_page' );

}

function findzone_settings_init(  ) { 

	register_setting( 'pluginPage', 'findzone_settings');


	add_settings_section(
		'findzone_pluginPage_section', 
		__( 'Findzone Settings', 'findzone' ), 
		'findzone_settings_section_callback', 
		'pluginPage'
	);
	
	add_settings_field( 
		'findzone_API', 
		__( 'Google Maps API', 'findzone' ), 
		'findzone_API_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
	add_settings_field( 
		'findzone_zoom', 
		__( 'Zoom in setting on map', 'findzone' ), 
		'findzone_zoom_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);

	add_settings_field( 
		'findzone_lat', 
		__( 'Latitude of Map', 'findzone' ), 
		'findzone_lat_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
	add_settings_field( 
		'findzone_long', 
		__( 'Longitude of Map', 'findzone' ), 
		'findzone_long_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);	

	add_settings_field( 
		'findzone_searchbutton', 
		__( 'Name on Search Button', 'findzone' ), 
		'findzone_searchbutton_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);	
	
	add_settings_field( 
		'findzone_searchplaceholder', 
		__( 'String on Search Placeholder', 'findzone' ), 
		'findzone_searchplaceholder_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
	add_settings_field( 
		'findzone_clearbutton', 
		__( 'Name on Clear Button', 'findzone' ), 
		'findzone_clearbutton_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);		

	add_settings_field( 
		'findzone_instructions', 
		__( 'Instructions for user', 'findzone' ), 
		'findzone_instructions_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
	add_settings_field( 
		'findzone_invalidarea', 
		__( 'Message if not in valid area', 'findzone' ), 
		'findzone_invalidarea_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);

	add_settings_field( 
		'findzone_addresslabel', 
		__( 'Address Label', 'findzone' ), 
		'findzone_addresslabel_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);

	add_settings_field( 
		'findzone_validprefix', 
		__( 'Message before valid area result', 'findzone' ), 
		'findzone_validprefix_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);

	add_settings_field( 
		'findzone_validpostfix', 
		__( 'Message after valid area result', 'findzone' ), 
		'findzone_validpostfix_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);	
	
	add_settings_field( 
		'findzone_maperror', 
		__( 'Error Message if Map does not work', 'findzone' ), 
		'findzone_maperror_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
	add_settings_field( 
		'findzone_numzones', 
		__( 'Number Of Zones (only supports 10 or less)', 'findzone' ), 
		'findzone_numzones_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);	
	

	add_settings_field( 
		'findzone_repzone1', 
		__( 'Representatives for Zone 1', 'findzone' ), 
		'findzone_zone1_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone2', 
		__( 'Representatives for Zone 2', 'findzone' ), 
		'findzone_zone2_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone3', 
		__( 'Representatives for Zone 3', 'findzone' ), 
		'findzone_zone3_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone4', 
		__( 'Representatives for Zone 4', 'findzone' ), 
		'findzone_zone4_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone5', 
		__( 'Representatives for Zone 5', 'findzone' ), 
		'findzone_zone5_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone6', 
		__( 'Representatives for Zone 6', 'findzone' ), 
		'findzone_zone6_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone7', 
		__( 'Representatives for Zone 7', 'findzone' ), 
		'findzone_zone7_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone8', 
		__( 'Representatives for Zone 8', 'findzone' ), 
		'findzone_zone8_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone9', 
		__( 'Representatives for Zone 9', 'findzone' ), 
		'findzone_zone9_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	add_settings_field( 
		'findzone_repzone10', 
		__( 'Representatives for Zone 10', 'findzone' ), 
		'findzone_zone10_render', 
		'pluginPage', 
		'findzone_pluginPage_section' 
	);
	
}

function findzone_API_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	
	<input type='text'  size='60'  name='findzone_settings[findzone_API]' value='<?php echo $options['findzone_API']; ?>'>
	<div>Get Google Api keys : <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">Google API Get Key</a> </div>
	<?php

}

function findzone_zoom_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	
	<input type='text' name='findzone_settings[findzone_zoom]' value='<?php echo $options['findzone_zoom']; ?>'>
	<div>Suggest zoom around 13 but dependent on size of zones. </div>
	<?php

}


function findzone_lat_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text' name='findzone_settings[findzone_lat]' value='<?php echo $options['findzone_lat']; ?>'>
	<div>Use google maps to find Latitute of center of your map. </div>
	<?php

}

function findzone_long_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text' name='findzone_settings[findzone_long]' value='<?php echo $options['findzone_long']; ?>'>
	<div>Use google maps to find Longitude of center of your map. </div>
	<?php

}

function findzone_searchbutton_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text' name='findzone_settings[findzone_searchbutton]' value='<?php echo $options['findzone_searchbutton']; ?>'>
	<div>Suggest 'Search'. </div>
	<?php

}

function findzone_searchplaceholder_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text' name='findzone_settings[findzone_searchplaceholder]' value='<?php echo $options['findzone_searchplaceholder']; ?>'>
	<div>Suggest 'Find an Address'. </div>
	<?php

}

function findzone_clearbutton_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  name='findzone_settings[findzone_clearbutton]' value='<?php echo $options['findzone_clearbutton']; ?>'>
	<div>Suggest 'Clear'. </div>
	<?php

}

function findzone_invalidarea_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  size='80' name='findzone_settings[findzone_invalidarea]' value='<?php echo $options['findzone_invalidarea']; ?>'>
	<div>Message to provide user if they are not in zone. i.e. 'You do not live within any zones.' </div>
	
	<?php

}

function findzone_addresslabel_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  size='80' name='findzone_settings[findzone_addresslabel]' value='<?php echo $options['findzone_addresslabel']; ?>'>
	<div>Message to prefix user provides or clicks on.  i.e. 'The address is'. </div>
	<?php

}

function findzone_validprefix_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  size='80' name='findzone_settings[findzone_validprefix]' value='<?php echo $options['findzone_validprefix']; ?>'>
	<div>Prefix message to provide user if they are in zone. i.e. 'You live in Area:' </div>
	<?php

}

function findzone_validpostfix_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  size='80' name='findzone_settings[findzone_validpostfix]' value='<?php echo $options['findzone_validpostfix']; ?>'>
	<div>Postfix message to provide user if they are in zone. i.e. 'and you have the following representatives' </div>
	<?php

}

function findzone_maperror_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  size='80' name='findzone_settings[findzone_maperror]' value='<?php echo $options['findzone_maperror']; ?>'>
	<div>Error Message if maps fail.  i.e. 'Finding your location was not successful for the following reason:'. </div>
	<?php

}



function findzone_instructions_render(  ) { 
	echo "<div>Message to instruct user how to use map.  i.e. 'Instructions: Enter an address in the textbox to find your Neighborhood Area or click on the map.'. </div>";
	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_instructions]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
	);
	wp_editor( $options['findzone_instructions'], "findzone_instructions", $args );	
	
}

function findzone_numzones_render(  ) { 

	$options = get_option( 'findzone_settings' );
	?>
	<input type='text'  name='findzone_settings[findzone_numzones]' value='<?php echo $options['findzone_numzones']; ?>'>
	<?php

}



function findzone_zone1_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone1]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,
	);
	wp_editor( $options['findzone_zone1'], "findzone_zone1", $args );	

}

function findzone_zone2_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone2]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,		
	);
	wp_editor( $options['findzone_zone2'], "findzone_zone2", $args );	

}

function findzone_zone3_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone3]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,		
	);
	wp_editor( $options['findzone_zone3'], "findzone_zone3", $args );	

}

function findzone_zone4_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone4]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone4'], "findzone_zone4", $args );	

}

function findzone_zone5_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone5]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone5'], "findzone_zone5", $args );	

}

function findzone_zone6_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone6]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone6'], "findzone_zone6", $args );	

}

function findzone_zone7_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone7]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone7'], "findzone_zone7", $args );	

}

function findzone_zone8_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone8]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
	);
	wp_editor( $options['findzone_zone8'], "findzone_zone8", $args );	

}

function findzone_zone9_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone9]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone9'], "findzone_zone9", $args );	

}

function findzone_zone10_render(  ) { 

	$options = get_option( 'findzone_settings' );
	$args = array(
		"textarea_name" => "findzone_settings[findzone_zone10]",
	    'editor_height' => 50,
		'textarea_rows' => 2,
		'media_buttons' => FALSE,
		'teeny'     => TRUE,			
	);
	wp_editor( $options['findzone_zone10'], "findzone_zone10", $args );	

}



function findzone_settings_section_callback(  ) { 

	echo __( 'Map Settings', 'findzone' );

}




function findzone_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Find Zone</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
