<?php global  $optionsdb; ?>
<footer id="footer">

	<?php
		if(isset($optionsdb['cwp_roby_footerimg']) && ($optionsdb['cwp_roby_footerimg'] != '')):
	?>
			<div class="aboutImg">
				<img src="<?php echo $optionsdb['cwp_roby_footerimg']; ?>" alt="" />
			</div>
	<?php
		endif;

		if((isset($optionsdb['cwp_roby_footertitle']) && ($optionsdb['cwp_roby_footertitle'] != '')) || (isset($optionsdb['cwp_roby_footertext']) && ($optionsdb['cwp_roby_footertext'] != ''))):
	?>
			<div class="aboutTitleText">
				<p class="title"><?php if(isset($optionsdb['cwp_roby_footertitle']) && ($optionsdb['cwp_roby_footertitle'] != '')) echo $optionsdb['cwp_roby_footertitle']; ?></p>
				<p class="text"><?php if(isset($optionsdb['cwp_roby_footertext']) && ($optionsdb['cwp_roby_footertext'] != '')) echo $optionsdb['cwp_roby_footertext']; ?></p>
			</div>
	<?php
		endif;
	?>

	<?php
		if((isset($optionsdb['cwp_roby_facebook_url']) && ($optionsdb['cwp_roby_facebook_url'] != '')) || (isset($optionsdb['cwp_roby_twitter_link']) && ($optionsdb['cwp_roby_twitter_link'] != '')) || (isset($optionsdb['cwp_roby_linkedin_link']) && ($optionsdb['cwp_roby_linkedin_link'] != '')) || (isset($optionsdb['cwp_roby_behance_link']) && ($optionsdb['cwp_roby_behance_link'] != '')) || (isset($optionsdb['cwp_roby_rss_link']) && ($optionsdb['cwp_roby_rss_link'] != ''))) {
	?>
			<div class="social">
				<div class="title"><?php _e('Social','cwp_roby'); ?></div>

					<?php if(isset($optionsdb['cwp_roby_facebook_url']) && ($optionsdb['cwp_roby_facebook_url'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_roby_facebook_url'])) echo $optionsdb['cwp_roby_facebook_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="" /></a>
					<?php endif; ?>

					<?php if(isset($optionsdb['cwp_roby_twitter_link']) && ($optionsdb['cwp_roby_twitter_link'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_roby_twitter_link'])) echo $optionsdb['cwp_roby_twitter_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="" /></a>
					<?php endif; ?>

					<?php if(isset($optionsdb['cwp_roby_rss_link']) && ($optionsdb['cwp_roby_rss_link'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_roby_rss_link'])) echo $optionsdb['cwp_roby_rss_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="" /></a>
					<?php endif; ?>

					<?php if(isset($optionsdb['cwp_roby_linkedin_link']) && ($optionsdb['cwp_roby_linkedin_link'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_roby_linkedin_link'])) echo $optionsdb['cwp_roby_linkedin_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="" /></a>
					<?php endif; ?>

					<?php if(isset($optionsdb['cwp_roby_behance_link']) && ($optionsdb['cwp_roby_behance_link'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_roby_behance_link'])) echo $optionsdb['cwp_roby_behance_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/behance.png" alt="" /></a>
					<?php endif; ?>
			</div><!--.social end-->

	<?php
		}
		if((isset($optionsdb['cwp_roby_copyright'])) && ($optionsdb['cwp_roby_copyright'] != '')) {
	?>
			<div class="copyright">
				<?php echo $optionsdb['cwp_roby_copyright']; ?>
			</div>
	<?php
		}
	?>
	<div class="clearfix"></div>
	<div class="poweredby">
		<a href="http://themeisle.com/themes/cwp_roby-robi/" target="_blank">cwp_roby Robi</a><?php _e(' powered by ','cwp_roby'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp_roby'); ?></a>
	</div>

</footer>
</section><!--#wrap end-->
<?php wp_footer(); ?>
</body>
</html>