<?php

/*
Template Name: Text Page
*/

?>

<?php get_header(); ?>

<article class="text">
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="entry-content">
		<?php 
			global $post;
			$content = $post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);			
			echo($content);
		 ?>
	</div>

</article>

<?php get_footer(); ?>