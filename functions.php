<?php

// 加载内置插件
include( get_stylesheet_directory().'/func/wp-useragent.php');

// 加载语言包
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup() {
	load_theme_textdomain('clrs', get_template_directory() . '/lang');
}

// 加载后台设置

function clrs_menu_function(){   
	add_theme_page(
		__('Clearision 调教','clrs'),
		__('Clearision 调教','clrs'),
		'administrator',
		'clrs_menu',
		'clrs_config');
}
add_action('admin_menu', 'clrs_menu_function');

function clrs_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => false,
		'id' => 'theme_setting',
		'title' => __('Clearision 调教','dpt'),
		'href' => admin_url( 'themes.php?page=clrs_menu'),
	));
}
add_action('wp_before_admin_bar_render', 'clrs_admin_bar');

// 加载文章格式支持

add_theme_support( 'post-formats', array( 'quote', 'status' ) );
// add_theme_support( 'post-formats', array( 'image', 'video' ) );

// 加载菜单设置

register_nav_menus(array(
	'main' => __( '主菜单','clrs' ),
	'next' => __( '辅助链接','clrs' )
));

// 加载小工具设置

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

// 获取博客标题

function clrs_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( '页面 %s', 'clrs' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'clrs_title', 10, 2 );

// 检测主题更新

if ( get_option('clrs_upcl') != "yes" ) {
	require_once(TEMPLATEPATH . '/func/theme-update-checker.php'); 
	$wpdaxue_update_checker = new ThemeUpdateChecker(
		'Clearision',
		'http://work.dimpurr.com/theme/clearision/update/info.json'
	);
}

// 这段代码用来统计模版使用情况，只会获取站点的URL，希望能够保留！
function clrs_thtj() {

// 执行函数

function clrs_tjaj() {
	$clrs_burl = get_bloginfo('url');
?>
	<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery.get("http://work.dimpurr.com/theme/theme_tj.php?theme_name=Clearision&blog_url=<?=$clrs_burl?>&t=" + Math.random());
});
	</script>
<?php
};

// 执行条件

$clrs_fitj = get_option('clrs_fitj');
$clrs_dayv = get_option('clrs_dayv');
$clrs_date = date('d'); 

if ($clrs_fitj == true) { 
	if($clrs_date == '01') {
		if ($clrs_dayv != true) {
			clrs_tjaj();
			update_option( 'clrs_dayv', true );
		};
	} elseif ($clrs_date != '01') {
		update_option( 'clrs_dayv', false );
	};
} else {
	clrs_tjaj();
	update_option( 'clrs_fitj', true );
};

};

// 首页 SNS 输出

function clrs_sns () {
	// 修改此顺序可以改变输出顺序，记得修改对应的注释
	$clrs_sns = array("profile","gplus","twitter","fb","weibo","qqw","github");
	$clrs_snsn = array("个人页","Google+","Twitter","Facebook","SinaWeibo","QQ","Github");
	for ($i=0; $i<7; $i++) {
		$clrs_sopt = 'clrs_s_' . $clrs_sns[$i];
		if( get_option($clrs_sopt) != null ) {
			echo '<a href="' . get_option($clrs_sopt) . '" title="' . $clrs_snsn[$i] . '" target="_blank"><button class="tr_' . $clrs_sns[$i] . '"></button></a>
';
		}
	}
}

// 定义页面导航

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

// 评论附加函数

function delete_comment_link( $id ) {
	if (current_user_can('level_5')) {
		echo '<a class="comment-edit-link" href="'.admin_url("comment.php?action=cdc&c=$id").'">删除</a> ';
	}
}

// 定义评论显示

if ( ! function_exists( 'tt_comment' ) ) :
function tt_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php echo 'Pingback '; ?> <?php comment_author_link(); ?> <?php edit_comment_link( '编辑', '<span class="edit-link">', '</span>' ); ?></p>
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
						echo '<a href="javascript:void(0)" class="cmt_ua_a">';
						clrs_wp_useragent();
						echo '</a>';
					};
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e('你的评论正在等待和谐审查','clrs'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __('编辑','clrs'), '<span class="edit-link">', '</span>' ); ?>
				<?php delete_comment_link(get_comment_ID()); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('回复','clrs'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</section>

		</article>
	<?php
		break;
	endswitch;
}
endif;

// 设置页单选按钮

function clrs_va($option) {
	if ( get_option($option) == "yes" ) { echo 'checked="true"'; }
}

function clrs_vb($option) {
	if ( get_option($option) == "no" ) { echo 'checked="true"'; }
}

// 后台设置页面

function clrs_config(){ clrs_thtj(); ?>

<style type="text/css">
input[type="text"] { max-width: 510px; }
textarea { font-size: 14px; font-family: Consolas, monospace, sans-serif, sans; }
</style>

<h1><?php _e('Clearision 主题设置','clrs'); ?></h1>

<form method="post" name="clrs_form" id="clrs_form">

	<h3><a href="http://blog.dimpurr.com/clearison">Clearison 主题专页→</a></h3>

	<div id="up-div"></div>

	<br><h3><?php _e('模版样式：','clrs'); ?></h3>
	<input type="radio" name="clrs_opct" value="yes" required="required" <?php clrs_va("clrs_opct"); ?> /><?php _e('灰色素雅','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_opct" value="no" required="required" <?php clrs_vb("clrs_opct"); ?> /><?php _e('透明清新','clrs'); ?><br>
	<br>
	<input type="text" size="80" name="clrs_opbg" id="clrs_opbg" placeholder="<?php _e('透明样式下的页面背景，留空为默认。粘贴链接或点击上传','clrs'); ?>" value="<?php echo get_option('clrs_opbg'); ?>"/>
	<input type="button" name="upload_button" value="<?php _e('上传','clrs'); ?>" id="upbottom"/><br>

	<br><h3><?php _e('LOGO头像：','clrs'); ?></h3>
	<input type="text" size="80" name="clrs_logo" id="clrs_logo" placeholder="<?php _e('粘贴链接或点击上传','clrs'); ?>" value="<?php echo get_option('clrs_logo'); ?>"/>
	<input type="button" name="upload_button" value="<?php _e('上传','clrs'); ?>" id="upbottom"/><br>

	<br>
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

	<br><h3><?php _e('网站图标：','clrs'); ?></h3>
	<input type="text" size="80" name="clrs_favi" id="clrs_favi" placeholder="<?php _e('输入 ICO/PNG 图标链接，留空调用根目录 favicon.ico','clrs'); ?>" value="<?php echo get_option('clrs_favi'); ?>"/>

	<h3><?php _e('统计代码：','clrs'); ?></h3>
	<textarea name="clrs_tongji" rows="10" cols="60" placeholder="<?php _e('输入网站统计代码','clrs'); ?>" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans"><?php echo get_option('clrs_tongji'); ?></textarea><br>

	<br><h3><?php _e('访客环境：','clrs'); ?></h3>
	<input type="radio" name="clrs_wbos" value="yes" required="required" <?php clrs_va("clrs_wbos"); ?> /><?php _e('显示','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_wbos" value="no" required="required" <?php clrs_vb("clrs_wbos"); ?> /><?php _e('不显示','clrs'); ?><br>

	<br><h3><?php _e('文章作者：','clrs'); ?></h3>
	<input type="radio" name="clrs_adis" value="yes" required="required" <?php clrs_va("clrs_adis"); ?> /><?php _e('显示','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_adis" value="no" required="required" <?php clrs_vb("clrs_adis"); ?> /><?php _e('不显示','clrs'); ?><br>

	<br><h3><?php _e('社交图标','clrs'); ?></h3>
	请带上 http:// <br>
	<?php

	$clrs_sns = array("profile","gplus","twitter","fb","weibo","qqw","github");
	$clrs_snsn = array("个人页","Google+","Twitter","Facebook","SinaWeibo","QQ / Qzone / QQWeibo","Github");

	for ($i=0; $i<7; $i++) {
		$clrs_sopt = 'clrs_s_' . $clrs_sns[$i];
		echo '<input type="text" size="80" name="' . $clrs_sopt . '" id="' . $clrs_sopt . '" placeholder="' . $clrs_snsn[$i] . '" value="' . get_option($clrs_sopt) . '"/>';
	}

	?>

	<br><h3><?php _e('友情链接：','clrs'); ?></h3>
	<input type="radio" name="clrs_ldis" value="yes" required="required" <?php clrs_va("clrs_ldis"); ?> /><?php _e('显示','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_ldis" value="no" required="required" <?php clrs_vb("clrs_ldis"); ?> /><?php _e('不显示','clrs'); ?><br>
	<br><textarea name="clrs_link" rows="10" cols="60" placeholder="<?php _e('在这里使用 HTML 代码自定义友链区的内容','clrs'); ?>" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans"><?php echo get_option('clrs_link'); ?></textarea><br>
	
	<h3><?php _e('自定义样式：','clrs'); ?></h3>
	<textarea name="clrs_style" rows="10" cols="60" placeholder="<?php _e('输入 CSS 代码，以便更新时不会被覆盖','clrs'); ?>" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans"><?php echo get_option('clrs_style'); ?></textarea><br>

	<br><h3><?php _e('检查更新：','clrs'); ?></h3>
	<p><?php _e('可以应对服务器设置导致的无限提示更新问题。需要更新时请手动打开此开关','clrs'); ?></p>
	<input type="radio" name="clrs_upcl" value="no" required="required" <?php clrs_va("clrs_upcl"); ?> /><?php _e('启用','clrs'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="clrs_upcl" value="yes" required="required" <?php clrs_vb("clrs_upcl"); ?> /><?php _e('关闭','clrs'); ?><br>

	<br><h3><?php _e('提交更改：','clrs'); ?></h3>
	<input type="submit" name="option_save" value="<?php _e('保存全部设置','clrs'); ?>" />

	<?php wp_nonce_field('update-options'); ?>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="clrs_copy_right" />

</form>

<?php }

// 提交设置

if(isset($_POST['option_save'])){

	$clrs_opct = stripslashes($_POST['clrs_opct']);
	update_option( 'clrs_opct', $clrs_opct );
	$clrs_opbg = stripslashes($_POST['clrs_opbg']);
	update_option( 'clrs_opbg', $clrs_opbg );
	$clrs_tongji = stripslashes($_POST['clrs_tongji']);
	update_option( 'clrs_tongji', $clrs_tongji );
	$clrs_logo = stripslashes($_POST['clrs_logo']);
	update_option( 'clrs_logo', $clrs_logo );
	$clrs_favi = stripslashes($_POST['clrs_favi']);
	update_option( 'clrs_favi', $clrs_favi );
	$clrs_ldis = stripslashes($_POST['clrs_ldis']);
	update_option( 'clrs_ldis', $clrs_ldis );
	$clrs_wbos = stripslashes($_POST['clrs_wbos']);
	update_option( 'clrs_wbos', $clrs_wbos );
	$clrs_adis = stripslashes($_POST['clrs_adis']);
	update_option( 'clrs_adis', $clrs_adis );
	$clrs_link = stripslashes($_POST['clrs_link']);
	update_option( 'clrs_link', $clrs_link );
	$clrs_style = stripslashes($_POST['clrs_style']);
	update_option( 'clrs_style', $clrs_style );
	$clrs_upcl = stripslashes($_POST['clrs_upcl']);
	update_option( 'clrs_upcl', $clrs_upcl );
	
	$clrs_sns = array("profile","gplus","twitter","fb","weibo","qqw","github");
	for ($i=0; $i<7; $i++) {
		$clrs_sopt = 'clrs_s_' . $clrs_sns[$i];
		update_option( $clrs_sopt, stripslashes($_POST[$clrs_sopt]) );
	}

}

?>