<div class="sticky show-for-medium-up">
		
	<!-- If you want to use the more traditional "fixed" navigation.
	 simply replace "sticky" with "fixed" -->

	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<!-- Title Area -->
			<li class="name">
				<h1> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="#"><span>Menu</span></a>
			</li>
		</ul>		
		<section class="top-bar-section">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>

<div class="show-for-small-only">
		<nav class="tab-bar">
			<section class="middle tab-bar-section">
				<h1 class="title"><?php bloginfo('name'); ?></h1>
			</section>
			<section class="left-small">
				<a href="#" class="left-off-canvas-toggle menu-icon" ><span></span></a>
			</section>
			<section class="right-small">
				<a href="#" class="right-off-canvas-toggle menu-icon" ><span></span></a>
			</section>			
		</nav>
</div>
						
<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_off_canvas(); ?>       
	</ul>
</aside>

<aside class="right-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Sidebar</label></li>
			<?php get_sidebar('offcanvas'); ?>   
	</ul>
</aside>

			
<a class="exit-off-canvas"></a>