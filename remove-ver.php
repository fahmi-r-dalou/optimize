<?php
add_filter( 'script_loader_src', '_remove_script_version', 999, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 999, 1 );

	function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
	}

	add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
	add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

	function sdt_remove_ver_css_js( $src, $handle ) 
	{
	    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

	    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
	        $src = remove_query_arg( 'ver', $src );

	    return $src;
	}

	// add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	// add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	// // remove wp version param from any enqueued scripts
	// function vc_remove_wp_ver_css_js( $src ) {
	//     if ( strpos( $src, 'ver=' ) )
	//         $src = remove_query_arg( 'ver', $src );
	//     return $src;
	// }

	// // Remove WP Version From Styles	
	// add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
	// // Remove WP Version From Scripts
	// add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

	// // Function to remove version numbers
	// function sdt_remove_ver_css_js( $src ) {
	// 	if ( strpos( $src, 'ver=' ) )
	// 		$src = remove_query_arg( 'ver', $src );
	// 	return $src;
	// }