<?php

	add_action('wp_enqueue_scripts', 'mr_scripts_and_styles', 1000);
	
	function mr_scripts_and_styles()  {
	if (!is_admin()) {
		// deregister main joints stylesheet. I'll use sass to add the styles into child stylesheet. One big file. Nice
		wp_dequeue_style('joints-stylesheet');
		
		// register child theme stylesheet
		wp_enqueue_style( 'mr-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
		}
	}