<?

/* Theme setup */

/* Set up image sizes */
add_theme_support('post-thumbnails');
add_image_size('gallery-full', 1280, 800, false);
add_image_size('home-gallery', 975, 650, false);
add_image_size('album-list', 365, 243, false);


/* Disable WP admin bar */
add_filter('show_admin_bar', '__return_false');  

/* Set up theme options */
add_action('customize_register', 'photostory_customize_register');
function photostory_customize_register($wp_customize) {
    $wp_customize->add_section( 'photostory_social' , array(
        'title'      => __( 'Social and Contact', 'photostory' ),
        'priority'   => 30,
    ) );    

    $wp_customize->add_setting('twitter_username', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_username', array(
        'label'        => __( 'Twitter Username', 'photostory' ),
        'section'    => 'photostory_social',
        'settings'   => 'twitter_username',
    ) ) );    

    $wp_customize->add_setting('contact_email', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_email', array(
        'label'        => __( 'Contact Email', 'photostory' ),
        'section'    => 'photostory_social',
        'settings'   => 'contact_email',
    ) ) );    

    $wp_customize->add_setting('tumblr_address', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tumblr_address', array(
        'label'        => __( 'Tumblr Address', 'photostory' ),
        'section'    => 'photostory_social',
        'settings'   => 'tumblr_address',
    ) ) );

}

/* Disable comments RSS feed */
add_filter('post_comments_feed_link','photostory_remove_comments_rss');
function photostory_remove_comments_rss( $for_comments ) {
    return;
}

/* Set up custom image size names */
add_filter('image_size_names_choose', 'photostory_custom_sizes');
function photostory_custom_sizes($sizes) {
	return array_merge($sizes, array(
		'gallery-full' => __('Gallery Full'),
        'home-gallery' => __('Homepage Gallery'),
        'album-list' => __('Album list thumbnail')

	));
}

/* Customize gallery shortcode */
add_filter('post_gallery', 'photostory_gallery');
function photostory_gallery($output) {

    global $post;

    $attrs = shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'size'       => 'gallery-full',
        'posts_per_page' => -1,
        'post_parent' => $post->ID, 
        'post_type' => 'attachment', 
        'post_mime_type' => 'image', 
        'post_status' => 'inherit'
    ), $attr);
    
    $_attachments = get_posts( $attrs );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
        $attachments[$val->ID] = $_attachments[$key];
    }

    $out = '<div class="gallery">';

    foreach ( $attachments as $id => $image_post ) {
    	$image_tag = wp_get_attachment_image( $image_post->ID, 'gallery-full' );
    	$out .= '<div class="gallery-image">' . $image_tag . '</div>';
    }
    $out .= '</div>';

	return $out;
}