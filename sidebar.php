<div id="sidebar1" class="sidebar large-4 medium-4 columns" role="complementary">

<!-- adding get_user_role only makes the sidebar accessible to the administrator or whatever role identified similarly you could add is_page(array('page1')) within the if statement to limit the sidebar to specific pages --> 
	<?php if (get_user_role('Administrator') && is_active_sidebar( 'sidebar1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						
	<div class="alert help">
		<p><?php _e("Please activate some Widgets.", "jointstheme");  ?></p>
	</div>

	<?php endif; ?>

</div>