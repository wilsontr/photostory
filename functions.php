<?

/* Theme setup */

/* Set up image sizes */
add_theme_support('post-thumbnails');
add_image_size('gallery-full', 1280, 800, false);
add_image_size('home-gallery', 975, 650, false);
add_image_size('album-list', 365, 548, false);


/* Disable WP admin bar */
//add_filter('show_admin_bar', '__return_false');  

/* Set up theme options */
add_action('customize_register', 'photostory_customize_register');
function photostory_customize_register($wp_customize) {
    $wp_customize->add_section( 'photostory_social' , array(
        'title'      => __( 'Social and Contact', 'photostory' ),
        'priority'   => 30,
    ) );    

    $wp_customize->add_section( 'photostory_analytics' , array(
        'title'      => __( 'Analytics', 'photostory' ),
        'priority'   => 31,
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

    $wp_customize->add_setting('ga_id', array(
        'default' => '',
        'transport' => 'refresh'
    ));  

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ga_id', array(
        'label'        => __( 'Google Analytics ID', 'photostory' ),
        'section'    => 'photostory_analytics',
        'settings'   => 'ga_id',
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
add_filter('post_gallery', 'photostory_gallery', 10, 2);
function photostory_gallery($output, $attr) {

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
    ), $attr, 'gallery');

    if ( $attr['ids'] ) {
        $attrs['include'] = $attr['ids'];
        unset($attrs['post_parent']);
    }

    $_attachments = get_posts( $attrs );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
        $attachments[$val->ID] = $_attachments[$key];
    }

    $out = '<div class="gallery">';

    foreach ( $attachments as $id => $image_post ) {
        $gallery_image = wp_get_attachment_image_src( $id, 'gallery-full' ); 
        $image_url = $gallery_image[0];
    	//$full_image = wp_get_attachment_image_src( $id, 'full' ); 
        //$full_image_url = $full_image[0];
        $full_image_url = str_replace(".jpg", "@2x.jpg", $image_url);
        $out .= '<div class="gallery-image"><img src="' . $image_url . '" rel="' . $full_image_url . '"/></div>';
    }
    $out .= '</div>';

	return $out;
}