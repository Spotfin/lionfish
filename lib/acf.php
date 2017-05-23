<?php

// Define Options Page for ACF
if( function_exists( 'acf_add_options_page' ) ) 
{	
	acf_add_options_page();	
}

// Define ACF JSON Folder
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/assets/acf-json';
    
    
    // return
    return $paths;
    
}