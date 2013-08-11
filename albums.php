<?php

/*
Template Name: Album List
*/

?>

<?php get_header(); ?>

<div id="album-list">

<?php 
$attrs = array(
		'posts_per_page' => -1
	);

$query = new WP_Query($attrs);

$posts = $query->get_posts();

foreach ( $posts as $post ) {
	$post_img = get_the_post_thumbnail($post->ID, 'album-list');
	$permalink = get_permalink($post->ID);
	?>
	<div class="single-album">
		<div class="post-image">
			<a href="<?php echo($permalink); ?>"><?php echo($post_img); ?></a>
		</div>
		<div class="post-link">
			<a href="<?php echo($permalink); ?>"><h3><?php echo($post->post_title); ?></h3></a>
		</div>
	</div>
	<?php

} ?>

</div>




<?php get_footer(); ?>