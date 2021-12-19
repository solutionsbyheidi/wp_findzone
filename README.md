=== FindZoneViaGoogleMaps ===
Author URI: https://solutionsbyheidi.com
Plugin URI: https://github.com/solutionsbyheidi/wp_findzone
Donate link: 
Contributors: 
Tags: 
Requires at least: 
Tested up to: 
Requires PHP: 
Stable tag: 1.0.0

Will allow end user to find a zone/representative

== Description ==

Lite weight customized google map that allows you to configure zones/areas.

On google maps, if user enters an address or clicks on the map, it will tell the user their specific area and representative.

Only the representatives are configurable per zone and you have to edit setupAreas.js to add the latitude/longitude polygons to configure each area.


== Frequently Asked Questions ==

API not working? Make sure you do the following:
* On your gogole maps: allow Geocoding API & Maps Javascript API
* Make sure you connect a billing account to Google API account
* Make sure API credentials are narrowed to specific site 

See more at Requires you to set Google Api keys : https://developers.google.com/maps/documentation/javascript/get-api-key to set up your keys

== Installation ==

1. Go to `Plugins` in the Admin menu
2. Click on the button `Add new`
3. Click on the `upload` link to upload `findzone.zip`
4. Click on `Activate plugin`
5. Visit wp-admin/options-general.php?page=findzone to configure plugin.

6. Add shortcode where you would like map to be placed i.e. [findzonemap_embed]


== Changelog ==