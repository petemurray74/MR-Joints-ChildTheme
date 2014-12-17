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

//alow shortcodes in widgets
if (!is_admin())
{add_filter('widget_text', 'do_shortcode');}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 */
function pm_better_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;
	
	if ($override_title=get_post_meta( get_the_ID(), 'title', true ))
	{$title=$override_title;}
	else
	{	
		// Add the blog name
		$blogName = get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= "$blogName $sep $site_description";
		}
		// Add a page number if necessary:
		
		else if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= "$blogName $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
		}
		
		else {$title .= $blogName;}
	}
	return $title;
}
add_filter( 'wp_title', 'pm_better_wp_title', 10, 2 );

/**
 * Adds a custom meta description, based on custom field : meta-description 
 *
 */

function pm_meta_desc() {  
   $meta_description="Direct Payment & Payroll Specialists. We aim to make the process of employing carers and assistants straightforward and hassle free";
    if ($custom_meta_description=get_post_meta( get_the_ID(), 'meta-description', true ))
    { $meta_description=$custom_meta_description; }
    echo "<meta name='description' content='$meta_description' />"; 
}  
add_action('wp_head', 'pm_meta_desc');