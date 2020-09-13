<?php
/*
* Plugin Name: Envira Gallery - Allow Shortcodes in Envira Gallery Description
* Plugin URI: https://enviragallery.com
* Version: 1.0.0
* Author: Envira Gallery Team
* Author URI: https://enviragallery.com
* Description: Add shortcodes to your Envira gallery descriptions
*/
 
add_filter( 'envira_gallery_output', 'do_shortcode' );