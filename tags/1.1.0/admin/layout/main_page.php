<div id="cwp_roby_container" style="display:none">





	<form id="cwp_roby_form" method="post" action="#" enctype="multipart/form-data">
	<?php settings_fields( cwp_roby_config("menu_slug")); ?>

		<div id="header">
			<div class="logo ">
			</div>
			<a href="http://themeisle.com/contact/" class="button button_top" target="_blank"><?php _e('Contact us','cwp_roby'); ?></a>
			<a href="http://themeisle.com/about-us/" class="button button_top" target="_blank"><?php _e('About us','cwp_roby'); ?></a>
			<a href="http://themeisle.com/forums/forum/cwp_roby-robi" class="button button_top" target="_blank"><?php _e('Forum','cwp_roby'); ?></a>
			<a href="http://themeisle.com/documentation-cwp_roby-robi" class="button button_top" target="_blank"><?php _e('Documentation','cwp_roby'); ?></a>
			<div class="clear"></div>
    	</div>

		<div id="info_bar">

		 <span class="spinner" ></span>

			<button  type="button" class="button-primary cwp_roby_save">
				<?php _e('Save All Changes','cwp_roby'); ?>			</button>

		 <span class="spinner spinner-reset" ></span>
			<button   type="button" class="button submit-button reset-button cwp_roby_reset"><?php _e('Options Reset','cwp_roby'); ?></button>
		</div><!--.info_bar-->

		<div id="main">

			<div id="cwp_roby_nav">
				<ul>
					<?php foreach ($tabs as $tab) { ?>


						<li  ><a  href="#tab-<?php echo $tab['id']; ?>"><?php echo $tab['name']; ?></a></li>

					<?php  } ?></ul>
			</div>

			<div id="content">

					<?php foreach ($tabs as $tab) { ?>
						<div id="tab-<?php echo $tab['id']; ?>" class="tab-section">
							<h2><?php echo $tab['name']; ?></h2>

							<?php foreach($tab['elements'] as $element){ ?>
								<?php echo  $element['html']; ?>
							<?php } ?>

						</div>


					<?php } ?></div>

			<div class="clear"></div>

		</div>

		<div class="save_bar">
		 <span class="spinner " ></span>
			<button  type="button" class="button-primary cwp_roby_save">
				<?php _e('Save All Changes','cwp_roby'); ?>			</button>

		 <span class="spinner  spinner-reset" ></span>
			<button   type="button" class="button submit-button reset-button  cwp_roby_reset"><?php _e('Options Reset','cwp_roby'); ?></button>


		</div>

	</form>

	<div style="clear:both;"></div>
</div>
