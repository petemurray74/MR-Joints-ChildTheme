<?php

// use the same path everywhere
$mr_stylesheet_dir = get_stylesheet_directory_uri();

// put css all in one place in child
	add_action('wp_enqueue_scripts', 'mr_scripts_and_styles', 1000);
	function mr_scripts_and_styles()  {
	if (!is_admin()) {
		// deregister main joints stylesheet. I'll use sass to add the styles into child stylesheet. One big file. Nice
		wp_dequeue_style('joints-stylesheet');
		wp_dequeue_style('foundation-icons');
		
		// register child theme stylesheet
		wp_enqueue_style( 'mr-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
		}
	}
	
// add retina image support
require_once(get_stylesheet_directory().'/library/retina2x.php'); 
	
//stop styles being added again
remove_action('wp_enqueue_scripts', 'osc_add_frontend_efs_scripts',-100);
remove_action('wp_enqueue_scripts', 'efs_osc_add_dynamic_css',100);

// creates [email] shortcode
function mr_email_encode_function( $atts, $content = null ) {
     extract( shortcode_atts( array(
          'address' => 'email',
     ), $atts ) );
	if ($content == null) {$content=$address;}
     return '<a href="mailto:' . antispambot(esc_attr($address)) . '">' . $content . '</a>';
}
add_shortcode('email', 'mr_email_encode_function');
	