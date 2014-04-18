<?php get_header(); ?><?php global  $optionsdb; ?>
<section id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post();  //Get posts
			$titlupost = get_the_title();
			$posturl = get_permalink();
	?>
			<article class="item">
				<div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
				<?php if((isset($optionsdb['cwp_b_featureimg']) && $optionsdb['cwp_b_featureimg'] == 'Show') || !isset($optionsdb['cwp_b_featureimg'])) { ?>
					<div class="image">
						<?php 
							$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							if(isset($feat_image[0])):
								echo '<a href='.$posturl.' title="'.$titlupost.'"><img src='.$feat_image[0].' alt="'.$titlupost.'"></a>';
							endif;	
						?>
					</div>
				<?php } ?>	
				<div class="date"><?php echo get_the_date('d.M.Y'); ?></div>
				<div class="excerpt"><?php the_excerpt(); ?></div>
				<div class="readmore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php _e('More','cwp'); ?></a></div>
				
			</article><!--index article end-->
	<?php endwhile; 
	/* Use PageNavi*/ else : ?>
	<?php	_e('404 Not Found','cwp') ?>;
	<?php endif; ?>
			<?php
				$p = get_previous_posts_link( __( 'Previous page','cwp' ) ); 
				$n = get_next_posts_link( __( 'Next page','cwp' ) ); 
				
				if($p || $n) :
					echo '<article class="item">';
					if($p) :
						echo '<div class="prev">'.$p.'</div>'; 
					endif;
					if($n) :
						echo '<div class="next">'.$n.'</div>'; 
					endif;
					echo '</article>';
				endif;	
			?>
		</section><!--#content end-->
<?php get_footer(); ?>