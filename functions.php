<?php

include( get_stylesheet_directory().'/func/wp-useragent.php');

function clrs_menu_function(){   
	add_theme_page(
		__('Clearision 设置','clrs'),
		__('Clearision 设置','clrs'),
		'administrator',
		'clrs_menu',
		'clrs_config');
}

function clrs_config(){ ?>

<h1><?php _e('Clearision 主题设置','clrs'); ?></h1>

<form method="post" name="clrs_form" id="clrs_form">

	<br><h3><?php _e('LOGO头像：','clrs'); ?></h3>
	<input type="text" size="80" name="clrs_logo" id="clrs_logo" placeholder="<?php _e('粘贴链接或点击上传','clrs'); ?>" value="<?php echo get_option('clrs_logo'); ?>"/>
	<input type="button" name="upload_button" value="<?php _e('上传','clrs'); ?>" id="upbottom"/><br>
	<p><?php _e('默认值：','clrs'); ?>http://blog.dimpurr.com/wp-content/themes/clearision/img/logo.png</p>

	<img src="<?php echo get_option('clrs_logo'); ?>" style="max-width: 114px; -webkit-border-radius: 500px; -moz-border-radius: 500px; border-radius: 500px;" />

	<?php wp_enqueue_script('thickbox'); wp_enqueue_style('thickbox'); ?>
	<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#upbottom').click(function() {
		targetfield = jQuery(this).prev('#clrs_logo');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery(targetfield).val(imgurl);
		tb_remove();
	}	
});
	</script>

	<h3><?php _e('统计代码：','clrs'); ?></h3>
	<textarea name="clrs_tongji" rows="10" cols="60" placeholder="<?php _e('输入网站统计代码，可适当加入字符','clrs'); ?>" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans"><?php echo get_option('clrs_tongji'); ?></textarea><br>

	<br><h3><?php _e('友情链接：','clrs'); ?></h3>
	<input type="radio" name="clrs_ldis" value="yes" required="required" /><?php _e('显示','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_ldis" value="no" required="required" /><?php _e('不显示','clrs'); ?><br>
	<?php _e('当前状态：','clrs'); ?><?php echo get_option('clrs_ldis'); ?><br>
	<br><textarea name="clrs_link" rows="10" cols="60" placeholder="<?php _e('在这里使用 HTML 代码自定义友链区的内容','clrs'); ?>" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans"><?php echo get_option('clrs_link'); ?></textarea><br>

	<br><h3><?php _e('访客环境：','clrs'); ?></h3>
	<input type="radio" name="clrs_wbos" value="yes" required="required" /><?php _e('显示','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_wbos" value="no" required="required" /><?php _e('不显示','clrs'); ?><br>
	<?php _e('当前状态：','clrs'); ?><?php echo get_option('clrs_wbos'); ?><br>
	
	<br><h3><?php _e('提交更改：','clrs'); ?></h3>
	<input type="submit" name="option_save" value="<?php _e('保存全部设置','clrs'); ?>" />

	<?php wp_nonce_field('update-options'); ?>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="clrs_copy_right" />

</form>

<?php }

add_action('admin_menu', 'clrs_menu_function');

if(isset($_POST['option_save'])){
	$clrs_tongji = stripslashes($_POST['clrs_tongji']);
	update_option( 'clrs_tongji', $clrs_tongji );
	$clrs_logo = stripslashes($_POST['clrs_logo']);
	update_option( 'clrs_logo', $clrs_logo );
	$clrs_ldis = stripslashes($_POST['clrs_ldis']);
	update_option( 'clrs_ldis', $clrs_ldis );
	$clrs_wbos = stripslashes($_POST['clrs_wbos']);
	update_option( 'clrs_wbos', $clrs_wbos );
	$clrs_link = stripslashes($_POST['clrs_link']);
	update_option( 'clrs_link', $clrs_link );
}

function c_pagenavi () {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'type' => 'plain',
		'end_size'=>'0',
		'mid_size'=>'5',
		'prev_text' => __('上一页','clrs'),
		'next_text' => __('下一页','clrs')
	);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array('s'=>get_query_var('s'));

	echo paginate_links($pagination);
}

if ( ! function_exists( 'tt_comment' ) ) :

function tt_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php echo 'Pingback:'; ?> <?php comment_author_link(); ?> <?php edit_comment_link( '编辑', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<div class="cmt_meta_head"><cite class="fn">%1$s',
						get_comment_author_link() );
					printf( '%1$s </cite>',
						( $comment->user_id === $post->post_author ) ? '<span class="cmt_meta_auth"> ' . __('文章作者','clrs') . '</span>' : '' );
					printf( '</div><span class="cmt_meta_time"><a href="%1$s"><time datetime="%2$s">%3$s</time></a></span>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( '%1$s %2$s' , get_comment_date(), get_comment_time() )
					);
					$wbos = get_option('clrs_wbos');
					if ($wbos == "yes" ) {
						echo '<span class="cmt_ua">';
						clrs_wp_useragent();
						echo '</span>';
					};
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e('你的评论正在等待和谐审查','clrs'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __('编辑','clrs'), '<span class="edit-link">', '</span>' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('回复','clrs'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</section>

		</article>
	<?php
		break;
	endswitch;
}
endif;

function tt_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( '页面 %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}

register_nav_menus(array(
	'main' => __( '主菜单','clrs' ),
	'next' => __( '辅助链接','clrs' )
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __( '底部栏1', 'clrs' ),
		'id' => 'one',
		'description' => '底部的工具栏',
		'class' => 'side_col',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	)
);

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __( '底部栏2', 'clrs' ),
		'id' => 'two',
		'description' => '底部的工具栏',
		'class' => 'side_col',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	)
);

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
	load_theme_textdomain('clrs', get_template_directory() . '/lang');
}

?>