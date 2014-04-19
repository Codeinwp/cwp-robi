<?php get_header(); ?>
<section id="pagecontent">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  
?>
			<article id="post">
				<!--post details start-->
				<h1 id="postitle"><?php the_title(); ?></h1>
				<div class="clearfix"></div>
				<!--post content start-->
				<div class="postcontent">
					<?php the_content(''); //Display post content ?>					<?php wp_link_pages(); ?>
				</div><!--post content end-->				<?php comments_template( '', true ); ?>
			</article><!--#post end-->
<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'cwp'); ?></p>
<?php endif; ?>

<?php get_sidebar(); ?>
</section><!--Content end-->
<?php get_footer(); ?>