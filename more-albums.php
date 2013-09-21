<?php
	
global $post;

$attrs = array(
	'posts_per_page' => 4,
	'post__not_in' => array( $post->ID ),
	'orderby' => 'rand',
	);

$album_posts = get_posts($attrs);

?>
<div class="more-albums">
	<h3>More Albums</h3>

	<div class="tiles">
<?php

foreach ( $album_posts as $album ) {
	$post_img = get_the_post_thumbnail($album->ID, 'album-list');
	$permalink = get_permalink($album->ID);
	?>
	<div class="album-tile">
		<div class="thumb">
			<a href="<?php echo($permalink); ?>"><?php echo($post_img); ?></a>
		</div>
		<div class="title-link">
			<a href="<?php echo($permalink); ?>"><?php echo($album->post_title); ?></a>
		</div>
	</div>
<?php } ?>
	</div>
</div>
