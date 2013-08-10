<?

/* functions.php */

add_theme_support('post-thumbnails');
add_image_size('gallery-full', 1280, 800, false);
add_filter('image_size_names_choose', 'photostory_custom_sizes');

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
        'id'         => $post->ID,
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr);
    
    $_attachments = get_posts( array(
    	'post_parent' => $attrs['id'], 
    	'post_status' => 'inherit', 
    	'post_type' => 'attachment', 
    	'post_mime_type' => 'image', 
    	'order' => $attrs['order'], 
    	'orderby' => $attrs['orderby']) );

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