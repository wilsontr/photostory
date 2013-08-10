<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href='http://fonts.googleapis.com/css?family=Linden+Hill:400,400italic' rel='stylesheet' type='text/css'>
<?php

add_action( 'wp_enqueue_scripts', 'photostory_scripts' );

function photostory_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('photostory-common', get_stylesheet_directory_uri() . '/js/common.js', 'jquery', null, true);
}

?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		echo " | $site_description ";
	}


	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/base-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/grids-min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/atom+xml" title="<? echo(bloginfo( 'name' )); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>"/>
<link rel="alternate" type="application/rss+xml" title="<? echo(bloginfo( 'name' )); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>"/>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>
	<div id="top-row">
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> id="site-title">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</<?php echo $heading_tag; ?>>
		<div id="nav_button">&#9776;</div>
		<ul id="site-social">
			<li class="twitter"><a href="http://twitter.com/scondolences">t</a></li>
			<li class="tumblr"><a href="http://scantcondolences.tumblr.com">u</a></li>
			<li class="email"><a href="mailto:scantcondolences@gmail.com">&#9993;</a></li>
		</ul>
	</div>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/albums">Albums</a></li>
			<li><a href="/about">About</a></li>
		</ul>
	</nav>
</header>

<article>