<?php get_header(); ?>

<div id="river" class="content">

<?php

$attrs = array(
		'posts_per_page' => 10
	);

$query = new WP_Query($attrs);

$posts = $query->get_posts();

foreach ( $posts as $post ) {
	$post_img = get_the_post_thumbnail($post->ID, 'home-gallery');
	$permalink = get_permalink($post->ID);
	?>
	<div class="album-post">
		<div class="post-image">
			<a href="<?php echo($permalink); ?>"><?php echo($post_img); ?></a>
		</div>
		<a href="<?php echo($permalink); ?>"><h3><?php echo($post->post_title); ?></h3></a>
	</div>
	<?php

}

?>

</div>

<div class="more-albums-link"><a href="/albums/">More Albums</a></div>


<?php get_footer(); ?>