<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
				    <div id="main" class="large-8 medium-8 columns" role="main">
					 
					  <!-- To see additional archive styles, visit the /parts directory -->
					  <h1><?php echo get_theme_mod('city_setting','Halifax')?> Volunteer Opportunities</h1>
					  <!-- call formidable pro view, for frontpage volunteer opportunities -->
					  <?php echo FrmProDisplaysController::get_shortcode( array( 'id' => frontpage) ) ?>
					    <?php get_template_part( 'parts/loop', '' ); ?><!-- think of putting some loop in here for adding text -->
								
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
      	<div class="row">
      		<h2>Explore Volunteer <?php echo get_theme_mod('city_setting','Halifax')?></h2>
      		<div class="large-4 medium-4 columns">
      			<h3>Find Volunteers</h3>
      			<p>Nonprofit organizations can signup for free to post volunteer opportunities.</p>
      			<a class="button">Sign Up</a>
     			</div>
     			<div class="large-4 medium-4 columns">
      			<h3>Search Volunteer Opportunities</h3>
      			<p>Find local volunteer opportunities to help great causes and to excel in both your personal and professional lives.</p>
      			<a class="button">Search</a>
     			</div>
     			<div class="large-4 medium-4 columns">
      			<h3>Search Community Events</h3>
      			<p>Looking for fun? meet new people? excitement? Look no further than our list of local events.</p>
     				<a class="button">Search</a>
     			</div>     			
     		</div>
     		<div class="row">
     			<h2>Opportunity Categories</h2>
						<!--<?php $terms = get_terms('opportunities_categories',array('hide_empty'=>false)); $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { echo $term->name; } } ?>!-->
						<?php
					$terms = get_terms( 'opportunities_categories', array('hide_empty'=>false ));

echo '<ul class="hide-for-small-only medium-block-grid-3">';

foreach ( $terms as $term ) {

    // The $term is an object, so we don't need to specify the $taxonomy.
    $term_link = get_term_link( $term );
   
    // If there was an error, continue to the next term.
    if ( is_wp_error( $term_link ) ) {
        continue;
    }

    // We successfully got a link. Print it out.
    echo '<li><h5><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></h5></li>';
}

echo '</ul>';?>
     		</div>
     		<div class="row">
     		<div class="small-12 small-uncentered columns panel callout">
     				<h3>Add yourself to the Volunteer Pool!</h3><a class="button right">Search</a>
     		</div>
     	</div>
			</div> <!-- end #content -->

<?php get_footer(); ?>
