<!DOCTYPE html>
<html lang="zh-cn">

<head>

<title><?php
	global $page, $paged;
	if ( $paged >= 2 || $page >= 2 )
		echo sprintf( ('页面 %s'), max( $paged, $page ) . ' | ' );
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta name="author" content="dimpurr" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php if ( is_user_logged_in() ) { echo '<style type="text/css" media="screen"> #float { top: 28px; } </style>' ;
} ?>

<?php wp_head(); ?>

</head>

<body>
<div id="page">

<div id="float" >

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img id="logo" alt="Dimpurr" title="Dimpurr" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" ></a>

<nav id="nav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
</nav>

<nav id="next" role="sencond_navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'next' ) ); ?>
</nav>

</div>

<hgroup id="ctn_header">
	<div id="title">
		<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
	<div id="title_r">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" id="s" placeholder="" size="10" />
	</form>
	</div>
</hgroup>