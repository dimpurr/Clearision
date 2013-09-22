<?php

/*
* 此部分为 Dimpurr 基于 WP-UserAgent 插件改写
* 保留原插件描述，遵循 GNU 协议，若无意侵权请告知
*/

/*
Plugin Name: WP-UserAgent
Plugin URI: http://kyleabaker.com/goodies/coding/wp-useragent/
Description: A simple User-Agent detection plugin that lets you easily insert icons and/or textual web browser and operating system details with each comment.
Version: 1.0.2
Author: Kyle Baker
Author URI: http://kyleabaker.com/
//Author: Fernando Briano
//Author URI: http://picandocodigo.net
*/

/* Copyright 2008-2012  Kyle Baker  (email: kyleabaker@gmail.com)
	//Copyright 2008  Fernando Briano  (email : transformers.es@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Pre-2.6 compatibility
if(!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if(!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if(!defined('WP_PLUGIN_URL'))
	define('WP_PLUGIN_URL', get_stylesheet_directory_uri());
if(!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR', get_stylesheet_directory());

// Plugin Options
$url_img=get_stylesheet_directory_uri()."/func/img/";

$ua_doctype				= get_option('ua_doctype');
$ua_comment_size		= get_option('ua_comment_size');
$ua_track_size			= get_option('ua_track_size');
$ua_show_text			= get_option('ua_show_text');
$ua_image_style			= get_option('ua_image_style');
$ua_image_css			= get_option('ua_image_css');
$ua_text_surfing		= get_option('ua_text_surfing');
$ua_text_on				= get_option('ua_text_on');
$ua_text_via			= get_option('ua_text_via');
$ua_text_links			= get_option('ua_text_links');
$ua_show_ua_bool		= get_option('ua_show_ua_bool');
$ua_hide_unknown_bool	= get_option('ua_hide_unknown_bool');
$ua_output_location		= get_option('ua_output_location');

// Include our main UA detection functions
include(get_stylesheet_directory().'/func/wp-useragent-detect.php');

// Image generation function
function clrs_img($code, $type, $title)
{
	global $ua_comment_size, $ua_track_size, $ua_image_style, $ua_image_css, $ua_trackback, $url_img, $ua_doctype;
	
	$ua_comment_size=16;
	$ua_track_size=16;

	// Set the style/class for icon appearance...
	$img_style="class='cmt_ua_img'";

	// Set the img to display browser/os/device
	// src=http://blogurl/plugins/plugin-name/size/net-os-device/code.png
	if($ua_trackback==1)
	{
		$img="<img src='".$url_img.$ua_track_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";
	}
	else
	{
		$img="<img src='".$url_img.$ua_comment_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";
	}

	// End the img tag following their specified html preference.
		$img.=">";

	return $img;
}

// Main function
function clrs_wp_useragent()
{
	global $comment, $useragent, $ua_output_location, $ua_trackback;

	// Default tracks to zero.
	$ua_trackback=0;

	// This grabs the ua and comment details per user.
	get_currentuserinfo();

	// Where should we display the useragent output?
	clrs_display_useragent();
}

// Function to form the final String
function clrs_display_useragent()
{
	global $comment, $useragent, $ua_output_location, $ua_trackback;
	$ua_trackback=0;
	get_currentuserinfo();
	$useragent=$comment->comment_agent;

	global $comment, $ua_show_text, $ua_text_surfing, $ua_text_on, $ua_text_via, $ua_show_ua_bool, $ua_hide_unknown_bool, $ua_doctype;

	if($comment->comment_type=='trackback' || $comment->comment_type=='pingback') {
		$trackback=clrs_detect_trackback();
		$ua="$ua_text_via $trackback";
	} else {
		$webbrowser=clrs_detect_webbrowser();
		$platform=clrs_detect_platform();
		$ua=$webbrowser.$platform;
	}

	$ua='<span class="cmt_ua">'.$ua.'</span>';

	if(empty($_POST['comment_post_ID']))
	{
		echo $ua;
	}
}

// Custom function for displaying the output in non-standard locations.
function clrs_useragent_output_custom(){
	global $ua_output_location, $useragent, $comment;
		get_currentuserinfo();
		$useragent=$comment->comment_agent;
		clrs_display_useragent();
}

// Util functions for filters and stuff.
function clrs_ua_comment()
{
	global $comment;

	remove_filter('comment_text', 'wp_useragent');
	apply_filters('get_comment_text', $comment->comment_content);

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if(empty($_POST['comment_post_ID']))
	{
		echo apply_filters('comment_text', $comment->comment_content);
	}
}

?>
