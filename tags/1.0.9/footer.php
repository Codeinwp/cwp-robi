<?php global  $optionsdb; ?>
<footer id="footer">

	<?php 
		if(isset($optionsdb['cwp_footerimg']) && ($optionsdb['cwp_footerimg'] != '')):
	?>
			<div class="aboutImg">
				<img src="<?php echo $optionsdb['cwp_footerimg']; ?>" alt="" />
			</div>
	<?php 
		endif;

		if((isset($optionsdb['cwp_footertitle']) && ($optionsdb['cwp_footertitle'] != '')) || (isset($optionsdb['cwp_footertext']) && ($optionsdb['cwp_footertext'] != ''))):
	?>
			<div class="aboutTitleText">
				<p class="title"><?php if(isset($optionsdb['cwp_footertitle']) && ($optionsdb['cwp_footertitle'] != '')) echo $optionsdb['cwp_footertitle']; ?></p>
				<p class="text"><?php if(isset($optionsdb['cwp_footertext']) && ($optionsdb['cwp_footertext'] != '')) echo $optionsdb['cwp_footertext']; ?></p>
			</div>
	<?php 
		endif;
	?>
	
	<?php
		if((isset($optionsdb['cwp_facebook_url']) && ($optionsdb['cwp_facebook_url'] != '')) || (isset($optionsdb['cwp_twitter_link']) && ($optionsdb['cwp_twitter_link'] != '')) || (isset($optionsdb['cwp_linkedin_link']) && ($optionsdb['cwp_linkedin_link'] != '')) || (isset($optionsdb['cwp_behance_link']) && ($optionsdb['cwp_behance_link'] != '')) || (isset($optionsdb['cwp_rss_link']) && ($optionsdb['cwp_rss_link'] != ''))) {
	?>	
			<div class="social">
				<div class="title"><?php _e('Social','cwp'); ?></div>
					
					<?php if(isset($optionsdb['cwp_facebook_url']) && ($optionsdb['cwp_facebook_url'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_facebook_url'])) echo $optionsdb['cwp_facebook_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="" /></a>
					<?php endif; ?>
					
					<?php if(isset($optionsdb['cwp_twitter_link']) && ($optionsdb['cwp_twitter_link'] != '')) : ?>
						<a href="<?php if(isset($optionsdb['cwp_twitter_link'])) echo $optionsdb['cwp_twitter_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="" /></a>
					<?php endif; ?>	
						
					<?php if(isset($optionsdb['cwp_rss_link']) && ($optionsdb['cwp_rss_link'] != '')) : ?>	
						<a href="<?php if(isset($optionsdb['cwp_rss_link'])) echo $optionsdb['cwp_rss_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="" /></a>
					<?php endif; ?>	
						
					<?php if(isset($optionsdb['cwp_linkedin_link']) && ($optionsdb['cwp_linkedin_link'] != '')) : ?>	
						<a href="<?php if(isset($optionsdb['cwp_linkedin_link'])) echo $optionsdb['cwp_linkedin_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="" /></a>
					<?php endif; ?>	
						
					<?php if(isset($optionsdb['cwp_behance_link']) && ($optionsdb['cwp_behance_link'] != '')) : ?>	
						<a href="<?php if(isset($optionsdb['cwp_behance_link'])) echo $optionsdb['cwp_behance_link']; ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/behance.png" alt="" /></a>
					<?php endif; ?>	
			</div><!--.social end-->
		
	<?php
		}
		if((isset($optionsdb['cwp_copyright'])) && ($optionsdb['cwp_copyright'] != '')) {
	?>
			<div class="copyright">
				<?php echo $optionsdb['cwp_copyright']; ?>
			</div>
	<?php
		}
	?>	
	<div class="clearfix"></div>
	<div class="poweredby">
		<a href="http://themeisle.com/themes/cwp-robi/?utm_source=cwp-robi&utm_medium=link&utm_campaign=themefooter" target="_blank">CWP Robi</a><?php _e(' powered by ','cwp'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp'); ?></a>
	</div>
	
</footer>
</section><!--#wrap end-->
<?php wp_footer(); ?> 
</body>
</html>