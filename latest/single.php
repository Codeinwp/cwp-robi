<?php get_header(); ?><?php global  $optionsdb; ?>
<section id="pagecontent">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!--post details start-->
			<?php 	
				if((isset($optionsdb['cwp_s_featureimg']) && $optionsdb['cwp_s_featureimg'] == 'Show') || !isset($optionsdb['cwp_s_featureimg'])) {
			?>
					<div class="post-image">
						<?php 
						
						if ( has_post_thumbnail($post->ID) ) {
							echo get_the_post_thumbnail($post->ID, 'single-page'); 
						}
						else 
							echo '';
						?>	
					</div><!--/post-image-->
			<?php
				}
			?>
			
			<h1 id="postitle"><?php the_title(); ?></h1>
			<div class="date"><?php echo get_the_date('d.M.Y'); ?></div>
			<div class="category"><?php the_category(', '); ?></div>
			<div class="clearfix"></div>
			
			<!--post content start-->
			<div class="postcontent">
				<?php the_content('');?>
				<?php wp_link_pages(); ?>

				<?php if((isset($optionsdb['cwp_authorinfo']) && $optionsdb['cwp_authorinfo'] == 'Show') || !isset($optionsdb['cwp_authorinfo'])) { ?>
					<div class="aboutauthor">
						<div class="image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></div>
						<div class="name"> <?php the_author_meta('display_name'); ?></div>
						<div class="clearfix"></div>
						<p><?php the_author_meta('description'); ?></p>
					</div><!--/aboutauthor-->
				<?php } ?>	
				
				
				<?php
					$tags = get_the_tags();
					if(((isset($optionsdb['cwp_tags']) && $optionsdb['cwp_tags'] == 'Show') || !isset($optionsdb['cwp_tags'])) && !empty($tags)) { ?>
						<div class="post-tags">
							<?php the_tags(); ?>
						</div><!--/post-tags-->
				<?php } ?>		
				<div class="clearfix"></div>
			</div><!--post content end-->
			
			<?php comments_template( '', true ); ?>
				
		</article><!--#post end-->
<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'cwp'); ?></p>
<?php endif; ?>
		
<?php get_sidebar(); ?>
</section><!--Content end-->
<?php get_footer(); ?>