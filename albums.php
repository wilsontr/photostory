<?php

/*
Template Name: Album List
*/

?>

<?php get_header(); ?>

<div id="album-list" class="content">

<h1>Albums</h1>

<?php 
$attrs = array(
		'posts_per_page' => -1
	);

$query = new WP_Query($attrs);

$posts = $query->get_posts();

$num_columns = 3;
$columns = array();
$count = count($posts);
$per_column = $count / $num_columns;
$remainder = $count % $num_columns;

$idx = 0;
foreach ( $posts as $post ) {
	if ( !$columns[$idx] )
		$columns[$idx] = array();
	array_push($columns[$idx], $post);
	$idx++;
	if ( $idx == $num_columns ) 
		$idx = 0;
}

?>
	<div class="pure-g-r">
<?php 
foreach ( $columns as $column ) {
	?>
	<div class="pure-u-1-<?php echo($num_columns); ?>">
	<?php 
	foreach ( $column as $post ) {
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
<?php } ?>
	</div>
</div>




<?php get_footer(); ?>