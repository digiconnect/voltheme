<?php
/*
Template Name: Sidebar Right
*/
?>
<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
				    <div id="main" class="large-8 medium-8 columns" role="main">
					 <!-- adding Yoast SEO's breadcrumbs -->
					 <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
					  <!-- To see additional archive styles, visit the /parts directory -->
					    <?php get_template_part( 'parts/loop', 'page' ); ?>
								
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
