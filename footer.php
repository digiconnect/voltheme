					<footer class="footer" role="contentinfo">
					        <div class="top-footer">
                    <div class="row">
                    <?php if(is_active_sidebar('footer-sidebar-1')){ dynamic_sidebar('footer-sidebar-1');}?>
                    <?php if(is_active_sidebar('footer-sidebar-2')){ dynamic_sidebar('footer-sidebar-2');}?>
                    <?php if(is_active_sidebar('footer-sidebar-3')){ dynamic_sidebar('footer-sidebar-3');}?>
                    <?php if(is_active_sidebar('footer-sidebar-4')){ dynamic_sidebar('footer-sidebar-4');}?>
                    </div>
                  </div><!-- end #top-footer -->  
		    					<div class="bottom-footer">
		    						<div class="row">
		    							<div class="large-8 large-uncentered columns">
		    							<div class="row"><p class="source-org copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a> by <a href="http://www.digitalconcoction.net">Digital Concoction</a></p></div>
		    						</div>
		    					<div class="large-4 large-uncentered columns">
		    						<div class="icon-bar five-up">
     									<a href="<?php echo get_theme_mod('facebook_setting','http://www.facebook.com');?>" class="item">
					            	<i class="fa fa-facebook"></i>
					            </a>
					            <a href="<?php echo get_theme_mod('twitter_setting','http://www.twitter.com');?>" class="item">
					            	<i class="fa fa-twitter"></i>
					            </a>
					            <a href="<?php echo get_theme_mod('pinterest_setting','http://www.pinterest.com');?>" class="item">
					            	<i class="fa fa-pinterest"></i>
					            </a>
					           <a href="<?php echo get_theme_mod('google_setting','http://www.google.com');?>" class="item">
					            	<i class="fa fa-google-plus"></i>
					            </a>
					           <a href="<?php echo 'mailto:' . get_theme_mod('email_setting','info@volunteerhalifax.ca');?>" class="item">
					            	<i class="fa fa-envelope"></i>
					            </a>
     							</div>
		    					</div></div>
							</div><!-- end #bottom-footer -->
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
