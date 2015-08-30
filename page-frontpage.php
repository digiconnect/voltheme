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
					    <?php get_template_part( 'parts/loop', 'archive' ); ?>
								
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
      	<div class="row">
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
     		<div class="small-12 small-centered columns panel">
     				<h3>Add yourself to the Volunteer Pool!</h3><a class="button right">Search</a>
     		</div>
			</div> <!-- end #content -->

<?php get_footer(); ?>
