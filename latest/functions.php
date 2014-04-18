<?php global  $optionsdb; ?>
<?php
/*
* HR Options panel 
*/  

function cwp_setup() {
	/*
	* Register menus
	*/
	register_nav_menus(
		array(
			'head-menu' => __( 'Pages Menu', 'cwp')
		)
	);
	/*
	* Thumbnails support
	*/
	require( get_template_directory() . '/admin/functions.php' );
	add_theme_support( 'post-thumbnails' ); 

	global $optionsdb;
	$optionsdb = cwp();
	$args = array(
		'default-color' => '010D26'
	);
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '>=' ) ) :
		add_theme_support( 'custom-background',$args ); 
	else :
		add_custom_background( $args );
	endif;
	$args = array(
		'width'         => 960,
		'height'        => 203,
		'default-image' => get_template_directory_uri() . '/images/header-bg.png',
		'uploads'       => true,
		'header-text'=>false
	);
 
	if ( version_compare( $wp_version, '3.4', '>=' ) ) :
		add_theme_support( 'custom-header',$args );
	 endif;
	
	
	
}		
add_action( 'after_setup_theme', 'cwp_setup' ); 

  
/*
* Text domain
*/  
load_theme_textdomain( 'cwp', get_template_directory() . '/languages' );

/*
* Content width
*/
if ( ! isset( $content_width ) ) $content_width = 635;

/**
 * Enqueue scripts and styles
 */
function cwp_theme_scripts() {	
	wp_enqueue_style( 'robi09-theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jmasonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array(), '20120206', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1', true );

	wp_register_style( 'oswald', 'http://fonts.googleapis.com/css?family=Oswald', false, false, 'all' );
    wp_enqueue_style( 'oswald' );
	wp_register_style( 'yanone', 'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700', false, false, 'all' );
    wp_enqueue_style( 'yanone' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}add_action( 'wp_enqueue_scripts', 'cwp_theme_scripts' );

/*
* Shortcodes
*/

//Vimeo user
function cwp_vimeoname($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social vimeo" href="http://www.vimeo.com/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('vimeouser', 'cwp_vimeoname');

//Vimeo video
function cwp_vimeovideo($atts, $content = null) {
	extract(shortcode_atts(array(
			'id' => '',
		), $atts)
	);
	$src = 'http://player.vimeo.com/video/'.$id;
	if ( $id != '' ) {
		return '<a class="social vimeo" href="'.$src.'">Vimeo</a>'; 
	}
}add_shortcode('vimeovideo', 'cwp_vimeovideo');

//Youtube channel
function cwp_youtubechannel($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social youtube" href="http://www.youtube.com/user/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('youtubeuser', 'cwp_youtubechannel');

//Youtube video
function cwp_youtubevideo($atts, $content = null) {
	extract(shortcode_atts(array(
			"id" => '',
	), $atts));
		
		$url = "http://gdata.youtube.com/feeds/api/videos/". $id;
		$doc = new DOMDocument;
		$doc->load($url);
		$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
		
	return '<a class="social youtube" href="http://www.youtube.com/watch?v='.$id.'">'.$title.'</a>';
}add_shortcode('youtubevideo', 'cwp_youtubevideo');

//Facebook link
function cwp_facebooklink($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social facebook" href="http://www.facebook.com/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('fb', 'cwp_facebooklink');

//Flickr account
function cwp_flickraccount($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social flickr" href="http://www.flickr.com/photos/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('flickra', 'cwp_flickraccount');

//Flickr account
function cwp_linkedinprofile($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social linked_in" href="http://www.linkedin.com/in/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('linkedin', 'cwp_linkedinprofile');

//Twitter account
function cwp_twitter($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social twitter" href="http://www.twitter.com/'.$name.'" target="_blank">'.$text.'</a>';
}add_shortcode('twitter', 'cwp_twitter');

//Twitter account
function cwp_wordpress($atts, $content = null) {
	extract(shortcode_atts(array(
			"name" => '',
			"text" => ''
	), $atts));
		
	return '<a class="social wordpress" href="http://www.'.$name.'.wordpress.com" target="_blank">'.$text.'</a>';
}add_shortcode('wordpress', 'cwp_wordpress');

//Headline
function cwp_headline($atts, $content = null) {
	extract(shortcode_atts(array(
			"text" => ''
	), $atts));
		return '<div class="ultitle">'.$text.'</div>';
}add_shortcode('headline', 'cwp_headline');

//List
function cwp_linklist($atts, $content) {
	extract(shortcode_atts(array(
			"image" => '',
			"link" => '',
			"postname" => ''
	), $atts));
		
	return '
	<div class="linklist">
		<div class="img"><img src="'.$image.'" alt="'.$postname.'"></div>
		<div class="name">
		<div class="link"><a href="http://'.$link.'" title="'.$postname.'">'._e('Try now!','cwp').'</a></div>
		'.$content.'
		</div>
	</div><!--link list end-->
	';
}add_shortcode('list', 'cwp_linklist');

/*
* End shortcodes
*/				

/*
* Sidebar
*/
function cwp_widgets_init() {

		register_sidebar(
			array('name' => __( 'Right Sidebar', 'cwp'),
				'id' => 'sidebar-id',
				'before_widget' => '<div class="sidebarbox">',
				'after_widget' => '</div>',
				'before_title'  => '<div class="title">',
				'after_title'   => '</div>',
			)
		);	

}
add_action( 'widgets_init', 'cwp_widgets_init' );

/*
* Excerpt
*/
function cwp_new_excerpt_length($length) {
	return 40;
}add_filter('excerpt_length', 'cwp_new_excerpt_length');

function cwp_remove_cat_item($wp_list_categories) {

		$patterns = array(); $replacements = array();

		$patterns[0] = '/class=\"(cat-item cat-item-[0-9]+) current-cat\"/';

		$replacements[0] = 'class="current-cat" ';

		$patterns[1] = '/ class="cat-item cat-item-(.*?)\"/';

		$replacements[1] = '';

		return preg_replace($patterns, $replacements, $wp_list_categories);

}

add_filter('wp_list_categories','cwp_remove_cat_item');

function cwp_remove_tag_link($wp_tag_cloud) {

	return preg_replace('/ class=\'tag-link-(.*?)\'/', '', $wp_tag_cloud);

}

add_filter('wp_tag_cloud', 'cwp_remove_tag_link');

function cwp_remove_page_class($wp_list_pages) {
		return preg_replace('/\<li class="page_item[^>]*>/', '<li>', $wp_list_pages);

}

add_filter('wp_list_pages', 'cwp_remove_page_class');

// always show admin bar
add_filter( 'show_admin_bar', '__return_true' );
function cwp_my_function_admin_bar($content) {
	return ( current_user_can("administrator") ) ? $content : false;
}add_filter( 'show_admin_bar' , 'cwp_my_function_admin_bar');

add_theme_support( 'automatic-feed-links' );

function cwp_filter_wp_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
	if($title != '')
		$filtered_title = $title . ' | ' . $site_name;
	else
		$filtered_title = $site_name;
    // Return the modified title
    return $filtered_title;
}add_filter( 'wp_title', 'cwp_filter_wp_title' );


add_image_size( 'single-page', 616,400, true );

function cwp_hr_theme_options_styles() {

	wp_enqueue_script( 'rm_script', get_template_directory_uri() . '/functions/hroptions/style/rm_script.js', array('jquery'), '1', true );
	wp_register_style( 'hr_style', get_template_directory_uri() . '/functions/hroptions/style/hr_style.css', false, false, 'all' );
    wp_enqueue_style( 'hr_style' );

}
add_action('admin_head', 'cwp_hr_theme_options_styles');

function cwp_add_googleanalytics() {
    if((isset($optionsdb['cwp_analytics'])) && ($optionsdb['cwp_analytics'] != '')) :
		echo $optionsdb['cwp_analytics']; 
	endif;	
}	
add_action('wp_footer', 'cwp_add_googleanalytics');

add_filter('the_title', 'cwp_new_title');
function cwp_new_title($title) {
	if(!isset($title) || $title == '')
		$title = 'Default title';
    return $title;
}

function cwp_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'cwp' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'cwp' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'cwp' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'cwp' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cwp' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'cwp' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cwp' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

?>