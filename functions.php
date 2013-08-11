<?

/* functions.php */

add_theme_support('post-thumbnails');
add_image_size('gallery-full', 1280, 800, false);
add_image_size('home-gallery', 975, 650, false);
add_filter('image_size_names_choose', 'photostory_custom_sizes');
add_filter('show_admin_bar', '__return_false');  
add_filter('post_comments_feed_link','photostory_remove_comments_rss');


function photostory_remove_comments_rss( $for_comments ) {
    return;
}

function photostory_custom_sizes($sizes) {
	return array_merge($sizes, array(
		'gallery-full' => __('Gallery Full')
	));
}

add_filter('post_gallery', 'photostory_gallery');

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