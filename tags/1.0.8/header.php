<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8" />
<?php global  $optionsdb; ?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class( ); ?>>

<header id="header" style="background: url(<?php  header_image(); ?>) no-repeat #<?php get_background_color() ; ?>; ">
	<!--Logo section-->
	<figure id="logo">
		<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
			<?php 
				if((isset($optionsdb['cwp_logo'])) && ($optionsdb['cwp_logo'] != '')) :
					echo '<img src="'.$optionsdb['cwp_logo'].'" alt="'.get_bloginfo( 'name' ).'">';
				else :
				?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-robi.png" alt="<?php bloginfo('name') ?>">
				<?php
				endif;	
			?>
		</a>
	</figure><!--#logo end-->
		
	<?php get_search_form(); ?>
		
	<div class="clearfix"></div>
	<?php
		$args = array('theme_location'  => 'head-menu',
						'container_class' => 'main-navigation','depth'=>2);		
		wp_nav_menu ($args);	
			
		$cargs = array('title_li' => '','hierarchical' => false);	
	?>	
		<nav id="hmenu">		
			<ul>			
				<li class="category"><?php _e('Select category','cwp'); ?>				
					<div class="menu">					
						<ul>						
							<?php wp_list_categories($cargs); ?>					
						</ul>				
					</div>			
				</li>		
			</ul>	
		</nav>
</header><!--#header end-->
	
<!--Blog content start-->
<section id="wrap">
