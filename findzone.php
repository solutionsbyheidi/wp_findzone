<?php
/**
 * Plugin Name: Find Zone 
 * Plugin URI: https://github.com/solutionsbyheidi/wp_findzone
 * Description: Finds zone via google maps
 * Version: 1.0
 * Author:            Heidi Vanyo
 * Author URI:        https://solutionsbyheidi.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * 
 **/
 include 'findzone_admin.php';


//create the function
function findzone_map() { 
  $options = get_option( 'findzone_settings' );
  
  $googleapi = 'https://maps.googleapis.com/maps/api/js?key=' .
	$options['findzone_API'] .
	'&callback=initMap&libraries=geometry&v=weekly&channel=2';
  
  wp_register_script('findzonegooglemaps', $googleapi, '', '', true);

  wp_register_script('findzonespolyfill', 'https://polyfill.io/v3/polyfill.min.js?features=default', '', '', true);

  wp_register_script( 'findzonemapsscripts',  plugin_dir_url( __FILE__ ) . 'js/scripts.js' );
  wp_register_script( 'findzonemapsareas',  plugin_dir_url( __FILE__ ) . 'js/setupAreas.js' );
  
  wp_register_style( 'findzonestyle',  plugin_dir_url( __FILE__ ) . 'css/style.css' );

  wp_enqueue_script('findzonegooglemaps');
  wp_enqueue_script('findzonespolyfill');
  wp_enqueue_script('findzonemapsscripts');
  wp_enqueue_script('findzonemapsareas');
  wp_enqueue_style('findzonestyle');
	
	$params = array(
		'Zoom' =>  $options['findzone_zoom'],
		'Lat' => $options['findzone_lat'],
		'Long' => $options['findzone_long'],
		'SearchButton' => $options['findzone_searchbutton'],
		'ClearButton' => $options['findzone_clearbutton'],
		'Instructions' => $options['findzone_instructions'],
		'SearchPlaceholder' => $options['findzone_searchplaceholder'],
		'InvalidArea' => $options['findzone_invalidarea'],
		'AddressLabel' => $options['findzone_addresslabel'],
		'ValidAreaPrefix' => $options['findzone_validprefix'] . ' ',
		'ValidAreaPostfix' =>  $options['findzone_validpostfix'],
		'MapError' => $options['findzone_maperror'] . ' ',
		'NumZones' => $options['findzone_numzones'],
		// This is ugly but easiest way to add them in edit options.
		'Zones' => array($options['findzone_zone1'], $options['findzone_zone2'], $options['findzone_zone3'], $options['findzone_zone4'], $options['findzone_zone5'], $options['findzone_zone6'], $options['findzone_zone7'], $options['findzone_zone8'], $options['findzone_zone9'], $options['findzone_zone10']),
	);
	wp_localize_script( 'findzonemapsscripts', 'mapsettings', $params );
	
}

// Now we need to run the function that registers and enques the scrips 
add_action('wp_enqueue_scripts', 'findzone_map');


// Add Shortcode
function map_embed_shortcode( $atts ) {

	return '<div id="map"></div>';

}
add_shortcode( 'findzonemap_embed', 'map_embed_shortcode' );

                
