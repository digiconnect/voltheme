					<footer class="footer" role="contentinfo">
					        <div class="top-footer">
                    <div class="row">
                    <?php if(is_active_sidebar('footer-sidebar-1')){ dynamic_sidebar('footer-sidebar-1');}?>
                    <?php if(is_active_sidebar('footer-sidebar-2')){ dynamic_sidebar('footer-sidebar-2');}?>
                    <?php if(is_active_sidebar('footer-sidebar-3')){ dynamic_sidebar('footer-sidebar-3');}?>
                    <?php if(is_active_sidebar('footer-sidebar-4')){ dynamic_sidebar('footer-sidebar-4');}?>
                    </div>
                    <div class="row"><?php echo get_theme_mod('text_setting','Hello'); ?></div>
                  </div><!-- end #top-footer -->
		    					<div class="row">
		    						<div class="large-6 columns">
		    							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a> by <a href="http://www.digitalconcoction.net">Digital Concoction</a>
		    						</div>
		    					<div class="large-6 columns">
		    						<?php wp_nav_menu( array('menu' => 'Footer Links' )); ?>
		    					</div>
							</div><!-- end #bottom-footer -->
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
