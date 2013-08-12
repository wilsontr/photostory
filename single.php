<?php

add_action( 'wp_enqueue_scripts', 'single_album_scripts' );

function single_album_scripts() {
	wp_enqueue_script('tumblr-share', "http://platform.tumblr.com/v1/share.js", null, null, true);
	
	/*wp_enqueue_script('klass', get_bloginfo('stylesheet_directory') . "/js/lib/klass.min.js", 'jquery', null, true);
	wp_enqueue_script('photoswipe', get_bloginfo('stylesheet_directory') . "/js/lib/code.photoswipe-3.0.5.min.js", array('klass'), null, true);
	wp_enqueue_script('album', get_bloginfo('stylesheet_directory') . "/js/album.js", array('jquery', 'klass', 'photoswipe'), null, true);
	wp_enqueue_style('photoswipe', get_bloginfo('stylesheet_directory') . '/css/photoswipe.css');
	*/
}


add_filter('body_class', 'album_class_names');
function album_class_names($classes) {
	
	$classes[] = 'content';
	// return the $classes array
	return $classes;
}

?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php get_template_part('single-social'); ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-content">
		
			<?php the_content(); ?>

		</div><!-- .entry-content -->

		<?php get_template_part('single-social'); ?>

	</article><!-- #post-## -->

<?php endwhile; /* end of the loop */ ?>


<?php get_footer(); ?>
