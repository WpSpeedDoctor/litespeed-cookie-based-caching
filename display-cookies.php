<?php

/**
 * 
 * This snippet displays if chosen cookies are set and is yes, what are their values.
 * To change name of the cookie search for "display_cookie_test" and change 'zip' or 'cdn' to your cookie of choice
 * 
 **/

if ( !defined( 'ABSPATH' ) ) exit;

add_action('the_content','cookie_test');

function cookie_test($content) {
	
	display_cookie_test('zip');
	
	display_cookie_test('cdn');
	
	return $content; 
	
}


function display_cookie_test( $cookie_name ){

	$cookie_value = $_COOKIE[$cookie_name] ?? '';

	$cookie_staus = get_cookie_status($cookie_name);

	$cookie_hightlight_status_css = isset($_COOKIE[$cookie_name]) ? 'green' : 'red';

	?><p style="font-weight:600;color:<?=$cookie_hightlight_status_css?>">Cookie <?="\"$cookie_name\" $cookie_staus $cookie_value"?></p>
	
	
<?php
}

function get_cookie_status($cookie_name){

	if ( !isset($_COOKIE[$cookie_name]) ) return 'is not set';

	return $_COOKIE[$cookie_name] ==='' ? 'is set but it\'s empty' : 'has value';
}




