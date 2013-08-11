<?php

add_action( 'wp_enqueue_scripts', 'single_album_scripts' );

function single_album_scripts() {
	wp_enqueue_script('tumblr-share', "http://platform.tumblr.com/v1/share.js", null, null, true);
}


?>

<?php get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part('single-social'); ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<div class="entry-meta">
		</div><!-- .entry-meta -->

		<div class="entry-content">
		
			<?php the_content(); ?>

		</div><!-- .entry-content -->

	</article><!-- #post-## -->

<?php endwhile; /* end of the loop */ ?>


<?php get_footer(); ?>
