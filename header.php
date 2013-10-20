<!DOCTYPE html>
<html lang="zh-cn">

<head>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="author" content="dimpurr" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php if ( is_user_logged_in() ) { // 适配 WordPress 顶部管理栏
	echo '<style type="text/css" media="screen"> #float { top: 32px; } </style>' ;
} ?>

<?php wp_head(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/script.js" type="text/javascript"></script>

</head>

<body <?php body_class(); ?>>
<div id="page">

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

<div id="float" >

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img id="logo" alt="Dimpurr" title="Dimpurr" src="<?php echo get_option('clrs_logo'); ?>" ></a>

<nav id="nav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
</nav>

<nav id="next" role="sencond_navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'next' ) ); ?>
</nav>

</div>