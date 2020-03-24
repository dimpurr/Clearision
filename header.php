<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="theme_author" content="dimpurr" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="application-name" content="<?php bloginfo('name'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php
	if (get_option('clrs_opct')) {
		echo ('<link rel="stylesheet" href="' . get_template_directory_uri() . '/style.opacity.css?t=' . @filemtime(get_template_directory() . '/style.opacity.css') . '">');
		if ($clrs_opbg = get_option('clrs_opbg')) {
			echo ('<style> body { background-image: url("' . $clrs_opbg . '"); } </style>');
		}
	}
	if ($clrs_style = get_option('clrs_style')) {
		echo ('<style>' . $clrs_style . '</style>');
	}
	?>

	<link rel="home" href="<?= esc_url(home_url('/')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= get_option('clrs_favi', 'favicon.ico'); ?>" />

	<link rel="alternate" type="application/rdf+xml" title="RSS 1.0" href="<?php bloginfo('rss_url') ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url') ?>" />
	<link rel="alternate" type="application/atom+xml" title="ATOM 1.0" href="<?php bloginfo('atom_url') ?>" />

	<!--[if lt IE 9]>
	<script src="<?= get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php
	if (is_user_logged_in()) {
		// 适配 WordPress 顶部管理栏
		echo ('<style media="screen"> #float { top: 32px; } </style>');
	}
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<hgroup id="ctn_header">
			<div id="title">
				<h1 id="site-title">
					<span>
						<a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					</span>
				</h1>
				<h2 id="site-description"><?php bloginfo('description'); ?></h2>
			</div>
			<div id="title_r">
				<?php
				// Header SNS 输出
				global $clrs_sns;
				foreach ($clrs_sns as $key => $val) {
					if ($url = get_option('clrs_s_' . $key)) {
						echo ('<a href="' . $url . '" title="' . $val . '" target="_blank"><button id="tr_' . $key . '"></button></a>');
					}
				}
				?>
				<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><button id="tr_rss"></button></a>
				<a href="<?= admin_url(); ?>" target="_blank"><button id="tr_admin"></button></a>
				<span id="tr_clear"></span>
				<form id="tr_s_f" method="get" action="<?= esc_url(home_url('/')); ?>">
					<input id="tr_search" type="text" name="s" id="s" placeholder="" size="10" />
				</form>
			</div>
			<div class="clearfix"></div>
		</hgroup>
		<div id="float">
			<a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
				<img id="logo" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" src="<?= get_option('clrs_logo'); ?>">
			</a>
			<nav id="nav" role="navigation">
				<?php wp_nav_menu(array('theme_location' => 'main')); ?>
			</nav>
			<nav id="next" role="sencond_navigation">
				<?php wp_nav_menu(array('theme_location' => 'next')); ?>
			</nav>
		</div>