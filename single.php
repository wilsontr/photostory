<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<div class="entry-meta">
					</div><!-- .entry-meta -->

					<div class="entry-content">
						

						
						<?php the_content(); ?>
						
						<div class="social-links-single">
							<div class="twitter-single">
								<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="mikesensei">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
							</div><!-- .twitter-single -->
							
							<div class="facebook-single">
								<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=false&amp;
								width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:30px;">
								</iframe>
							</div><!-- .facebook-single -->
							
						</div><!-- .social-links-single -->
						
						
					</div><!-- .entry-content -->

				</div><!-- #post-## -->

<?php endwhile; /* end of the loop */ ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
