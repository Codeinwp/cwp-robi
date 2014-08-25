<?php if (is_active_sidebar('sidebar-id')) : ?>
	<aside id="sidebar">
		<?php dynamic_sidebar( 'sidebar-id' ); ?>
	</aside>
<?php else: ?>
	<aside id="sidebar">
			<div class="sidebarbox">
				<div class="title"><?php _e("Recent posts","cwp_roby"); ?></div>
				<?php the_widget('WP_Widget_Recent_Posts'); ?>
			</div>
			<div class="sidebarbox">
				<div class="title"><?php _e("Recent comments","cwp_roby"); ?></div>
				<?php the_widget('WP_Widget_Recent_Comments'); ?>
			</div>
			<div class="sidebarbox">
				<div class="title"><?php _e("Archives","cwp_roby"); ?></div>
				<?php the_widget('WP_Widget_Archives'); ?>
			</div>
			<div class="sidebarbox">
				<div class="title"><?php _e("Categories","cwp_roby"); ?></div>
				<?php the_widget('WP_Widget_Categories'); ?>
			</div>
	</aside>
<?php endif; ?>