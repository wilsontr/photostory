<div class="social-links-single">
	<div class="social-links-share-button">Share</div>
	<ul class="social-links-block">
		<?php 
		$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
		$permalink = get_permalink($post->ID);
		?>
		<li class="share-facebook">
		    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo(urlencode($permalink)); ?>">f</a>
		</li>
		<li class="share-pinterest">
		    <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo(urlencode($permalink)); ?>">p</a>
		</li>
		<li class="share-twitter">
		    <?php if ( !get_theme_mod('twitter_username') ): ?>
		    <?php $tweet_text = urlencode('Photo album: ' . $post->post_title . ' on Scant Condolences'); ?>
		    	<a href="https://twitter.com/intent/tweet?text=<?php echo($tweet_text); ?>&url=<?php echo(urlencode($permalink)); ?>" title="Share <?php echo(urlencode($post->post_title)); ?> on Twitter">
		    <?php else: ?>
		    	<a href="https://twitter.com/intent/tweet?text=<?php echo($tweet_text); ?>&url=<?php echo(urlencode($permalink)); ?>&via=<?php echo(get_theme_mod('twitter_username')); ?>" title="Share <?php echo(urlencode($post->post_title)); ?> on Twitter">
			<?php endif; ?>t</a>
		</li>
		<li class="share-tumblr">
			<?php $caption = '<p><a href="' . $permalink . '">' . $post->post_title . "</a>, a photo album on " . get_bloginfo('name') . '</p>'; ?>
			<!--<a href="http://www.tumblr.com/share/photo?source=<?php echo(urlencode($featured_image_url)); ?>&caption=%3Cp%3E%3Cstrong%3E%3Ca href=&quot;<?php echo(urlencode($permalink)); ?>&quot; title=&quot;<?php echo(urlencode($post->post_title)); ?>&quot;%3E<?php echo(urlencode($post->post_title)); ?>%3C/a%3E%2C%20a%20photo%20series%20on%20Scant%20Condolences%3C%2Fstrong%3E%3C%2Fp%3E%3Cp%2Fp%3E&click_thru=<?php echo(urlencode($permalink)); ?>" title="Share <?php echo(urlencode($post->post_title)); ?> on Tumblr">u</a>-->
			<a href="http://www.tumblr.com/share/photo?source=<?php echo(urlencode($featured_image_url)); ?>&caption=<?php echo(urlencode($caption)); ?>	&click_thru=<?php echo(urlencode($permalink)); ?>" class="share-tumblr" title="Share <?php echo(urlencode($post->post_title)); ?> on Tumblr">u</a>
		</li> 
	<ul>
</div>