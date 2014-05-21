<div id="sidebar1" class="sidebar large-4 medium-12 columns" role="complementary">

   <?php if ($override_sidebar=get_post_meta( get_the_ID(), 'sidebar', true )) :
	
	echo('<div id="override-widget" class="widget widget_override">'.$override_sidebar.'</div>');
	
	else :
	
	if ( is_active_sidebar( 'sidebar1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						
	<div class="alert help">
		<p><?php _e("Please activate some Widgets.", "jointstheme");  ?></p>
	</div>

	<?php 
	endif; 
	
	endif;
	?>

</div>