<?php
/*
* HR Options panel
*/

function cwp_roby_setup()
{
    /*
    * Register menus
    */
    register_nav_menus(
        array(
            'head-menu' => __('Pages Menu', 'cwp_roby')
        )
    );
    /*
    * Thumbnails support
    */
    require(get_template_directory() . '/admin/functions.php');
    add_theme_support('post-thumbnails');

    global $optionsdb;
    $optionsdb = cwp_roby();
    $args = array(
        'default-color' => '010D26'
    );
    global $content_width;
    if (!isset($content_width)) $content_width = 635;
    $args = array(
        'width' => 960,
        'height' => 203,
        'default-image' => get_template_directory_uri() . '/images/header-bg.png',
        'uploads' => true,
        'header-text' => false
    );
    add_theme_support('custom-background', $args);

    add_theme_support('custom-header', $args);

    add_theme_support('automatic-feed-links');
    /*
    * Text domain
    */
    load_theme_textdomain('cwp_roby', get_template_directory() . '/languages');


}

add_action('after_setup_theme', 'cwp_roby_setup');

/**
 * Enqueue scripts and styles
 */
function cwp_roby_theme_scripts()
{
    wp_enqueue_style('robi09-theme-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery','masonry'), '1', true);

    wp_enqueue_style('oswald', '//fonts.googleapis.com/css?family=Oswald', false, false, 'all');
    wp_enqueue_style('yanone', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700', false, false, 'all');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cwp_roby_theme_scripts');

/*
* End shortcodes
*/

/*
* Sidebar
*/
function cwp_roby_widgets_init()
{

    register_sidebar(
        array('name' => __('Right Sidebar', 'cwp_roby'),
            'id' => 'sidebar-id',
            'before_widget' => '<div class="sidebarbox">',
            'after_widget' => '</div>',
            'before_title' => '<div class="title">',
            'after_title' => '</div>',
        )
    );

}

add_action('widgets_init', 'cwp_roby_widgets_init');

/*
* Excerpt
*/
function cwp_roby_new_excerpt_length($length)
{
    return 40;
}

add_filter('excerpt_length', 'cwp_roby_new_excerpt_length');

function cwp_roby_remove_cat_item($wp_list_categories)
{

    $patterns = array();
    $replacements = array();

    $patterns[0] = '/class=\"(cat-item cat-item-[0-9]+) current-cat\"/';

    $replacements[0] = 'class="current-cat" ';

    $patterns[1] = '/ class="cat-item cat-item-(.*?)\"/';

    $replacements[1] = '';

    return preg_replace($patterns, $replacements, $wp_list_categories);

}

add_filter('wp_list_categories', 'cwp_roby_remove_cat_item');

function cwp_roby_remove_tag_link($wp_tag_cloud)
{

    return preg_replace('/ class=\'tag-link-(.*?)\'/', '', $wp_tag_cloud);

}

add_filter('wp_tag_cloud', 'cwp_roby_remove_tag_link');

function cwp_roby_remove_page_class($wp_list_pages)
{
    return preg_replace('/\<li class="page_item[^>]*>/', '<li>', $wp_list_pages);

}

add_filter('wp_list_pages', 'cwp_roby_remove_page_class');


function cwp_roby_filter_wp_title($title)
{
    // Get the Site Name
    $site_name = get_bloginfo('name');
    // Prepend it to the default output
    if ($title != '')
        $filtered_title = $title . ' | ' . $site_name;
    else
        $filtered_title = $site_name;
    // Return the modified title
    return $filtered_title;
}

add_filter('wp_title', 'cwp_roby_filter_wp_title');


add_image_size('single-page', 616, 400, true);

function cwp_roby_hr_theme_options_styles()
{

    wp_enqueue_script('rm_script', get_template_directory_uri() . '/functions/hroptions/style/rm_script.js', array('jquery'), '1', true);

    wp_enqueue_style('hr_style', get_template_directory_uri() . '/functions/hroptions/style/hr_style.css', false, false, 'all');

}

add_action('admin_head', 'cwp_roby_hr_theme_options_styles');

add_filter('the_title', 'cwp_roby_new_title');
function cwp_roby_new_title($title)
{
    if (!isset($title) || $title == '')
        $title = 'Default title';
    return $title;
}

function cwp_roby_comment($comment, $args, $depth)
{

    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php _e('Pingback:', 'cwp_roby'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'cwp_roby'), '<span class="edit-link">', '</span>'); ?></p>
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
                        echo get_avatar($comment, 44);
                        printf('<cite><b class="fn">%1$s</b> %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ($comment->user_id === $post->post_author) ? '<span>' . __('Post author', 'cwp_roby') . '</span>' : ''
                        );
                        printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                            esc_url(get_comment_link($comment->comment_ID)),
                            get_comment_time('c'),
                            /* translators: 1: date, 2: time */
                            sprintf(__('%1$s at %2$s', 'cwp_roby'), get_comment_date(), get_comment_time())
                        );
                        ?>
                    </header>
                    <!-- .comment-meta -->

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'cwp_roby'); ?></p>
                    <?php endif; ?>

                    <section class="comment-content comment">
                        <?php comment_text(); ?>
                        <?php edit_comment_link(__('Edit', 'cwp_roby'), '<p class="edit-link">', '</p>'); ?>
                    </section>
                    <!-- .comment-content -->

                    <div class="reply">
                        <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'cwp_roby'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    </div>
                    <!-- .reply -->
                </article>
                <!-- #comment-## -->
            <?php
            break;
    endswitch; // end comment_type check
}



