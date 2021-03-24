<?php
// SNS 数据定义, 此数组顺序对应输出顺序
$clrs_sns = array(
	"profile" => "个人页",
	"gplus" => "Google+",
	"twitter" => "Twitter",
	"fb" => "Facebook",
	"weibo" => "SinaWeibo",
	"qqw" => "QQ",
	"github" => "Github",
	"telegram" => "Telegram",
);

// 给 style.css 添加修改时间, 解决缓存问题
add_filter('stylesheet_uri', function () {
	echo get_template_directory_uri() . '/style.css?t=' . filemtime(get_stylesheet_directory() . '/style.css');
});

// 加载语言包
add_action('after_setup_theme', function () {
	load_theme_textdomain('clrs', get_template_directory() . '/lang');
});

// 添加设置菜单
add_action('wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'parent' => false,
		'id' => 'theme_setting',
		'title' => __('Clearision 调教', 'dpt'),
		'href' => admin_url('themes.php?page=clrs_menu'),
	));
});

// 自定义标题
add_filter('wp_title', function ($title, $sep) {
	if (!is_feed()) {
		$title .= get_bloginfo('name');

		$description = get_bloginfo('description', 'display');
		if ($description && (is_home() || is_front_page())) {
			$title .= " $sep $description";
		}

		global $paged, $page;
		if ($paged >= 2 || $page >= 2) {
			$title .= " $sep " . sprintf(__('页面 %s', 'clrs'), max($paged, $page));
		}
	}
	return $title;
}, 10, 2);

// 加载文章格式支持
add_theme_support('post-formats', array('quote', 'status'));
// add_theme_support( 'post-formats', array( 'image', 'video' ) );

// 加载菜单设置
register_nav_menus(array(
	'main' => __('主菜单', 'clrs'),
	'next' => __('辅助链接', 'clrs')
));

// 加载小工具设置
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => __('底部栏1', 'clrs'),
			'id' => 'one',
			'description' => '底部的工具栏',
			'class' => 'side_col',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('底部栏2', 'clrs'),
			'id' => 'two',
			'description' => '底部的工具栏',
			'class' => 'side_col',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
}

// 检测主题更新
if (get_option('clrs_upcl') != "0") {
	require_once(get_template_directory() . '/func/theme-update-checker.php');
	new ThemeUpdateChecker(
		'Clearision',
		'http://work.dimpurr.com/theme/clearision/update/info.json'
	);
}

if (!function_exists('clrs_comment')) {
	// TODO: 重构 UserAgent 检测
	require(get_template_directory() . '/func/wp-useragent.php');

	function clrs_pingback()
	{
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p>
				Pingback
				<?php
				comment_author_link();
				edit_comment_link('编辑', '<span class="edit-link">', '</span>');
				?>
			</p>
		<?php
	}

	function clrs_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') {
			clrs_pingback($comment);
			return;
		}
		global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="comment-meta comment-author vcard">
					<?= get_avatar($comment, 44) ?>
					<div class="cmt_meta_head">
						<cite class="fn">
							<?= get_comment_author_link() ?>
							<?php
							if ($comment->user_id === $post->post_author) {
								echo ('<span class="cmt_meta_auth"> ' . __('文章作者', 'clrs') . '</span>');
							}
							?>
						</cite>
					</div>
					<span class="cmt_meta_time">
						<a href="<?= esc_url(get_comment_link($comment->comment_ID)) ?>">
							<time datetime="<?= get_comment_time('c') ?>"><?= get_comment_date() . ' ' . get_comment_time() ?></time>
						</a>
					</span>
					<?php
					if (get_option('clrs_wbos')) {
						echo '<a href="javascript:void(0)" class="cmt_ua_a">';

						clrs_wp_useragent();

						echo '</a>';
					}
					?>
				</header>
				<?php
				if ($comment->comment_approved == '0') {
					echo ('<p class="comment-awaiting-moderation">' . __('你的评论正在等待和谐审查', 'clrs') . '</p>');
				}
				?>
				<section class="comment-content comment">
					<?php
					comment_text();
					edit_comment_link(__('编辑', 'clrs'), '<span class="edit-link">', '</span>');
					if (current_user_can('level_5')) {
						echo ('<a class="comment-edit-link" href="' . admin_url("comment.php?action=cdc&c=" . get_comment_ID()) . '">删除</a> ');
					}
					comment_reply_link(array_merge($args, array(
						'after' => '',
						'depth' => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' => __('回复', 'clrs')
					)));
					?>
				</section>
			</article>
		<?php
	}
}

// 后台设置页面
add_action('admin_menu', function () {
	add_theme_page(
		__('Clearision 调教', 'clrs'),
		__('Clearision 调教', 'clrs'),
		'administrator',
		'clrs_menu',
		'clrs_config'
	);
});

function clrs_config()
{
	global $clrs_sns;
	static $options = array(
		'clrs_opct', 'clrs_opbg',
		'clrs_logo', 'clrs_favi',
		'clrs_wbos', 'clrs_adis', 'clrs_ldis', 'clrs_upcl',
		'clrs_tongji', 'clrs_style'
	);

	if (isset($_POST['options_save'])) {
		if (!wp_verify_nonce($_POST['options_save'], 'clearision-save')) {
			_e('Nonce 校验失败, 设置未保存, 请刷新重试', 'clrs');
			return;
		}
		foreach ($options as $opt) {
			update_option($opt, stripslashes($_POST[$opt]));
		}
		foreach (array_keys($clrs_sns) as $key) {
			$clrs_sopt = 'clrs_s_' . $key;
			update_option($clrs_sopt, stripslashes($_POST[$clrs_sopt]));
		}
	}

	$title = function ($title) {
		echo ('<h3>' . __($title, 'clrs') . '</h3>');
	};
	$radio = function ($option, $yes, $no) {
		$status = get_option($option);
		echo ('<input type="radio" name="' . $option . '" value="1" required' . ($status ? ' checked="true"' : '') . '>' . __($yes, 'clrs') . '</input>&nbsp;&nbsp;&nbsp;&nbsp;' .
			'<input type="radio" name="' . $option . '" value="0" required' . ($status ? '' : ' checked="true"') . '>' . __($no, 'clrs') . '</input><br>');
	};
	$textbox = function ($option, $hint, $upload = false) {
		echo ('<input type="text" size="80" name="' . $option . '" placeholder="' . __($hint, 'clrs') . '" value="' . get_option($option) . '" />' .
			($upload ? '<input type="button" upload_for="' . $option . '" value="' . __('上传', 'clrs') . '" />' : '') . '<br>');
	};
	$textfield = function ($option, $hint) {
		echo ('<textarea name="' . $option . '" rows="10" cols="60" placeholder="' . __($hint, 'clrs') . '" style="font-size: 14px; font-family: Consolas, monospace, sans-serif, sans">' . get_option($option) . '</textarea><br>');
	};

	echo ('<h1>' . __('Clearision 主题设置', 'clrs') . '</h1>' .
		'<form method="post" name="clrs_form" id="clrs_form">' .
		'<h3><a href="http://blog.dimpurr.com/clearison">Clearison 主题专页→</a></h3>');

	$title('模版样式：');
	$radio('clrs_opct', '透明清新', '灰色素雅');
	echo ('<br>');
	$textbox('clrs_opbg', '透明样式下的页面背景，留空为默认。粘贴链接或点击上传', true);

	$title('LOGO头像：');
	$textbox('clrs_logo', '粘贴链接或点击上传', true);

	echo ('<br><img src="' . get_option('clrs_logo') . '" style="max-width: 114px; -webkit-border-radius: 500px; -moz-border-radius: 500px; border-radius: 500px;" />');

	$title('网站图标：');
	$textbox('clrs_favi', '输入 ICO/PNG 图标链接，留空调用根目录 favicon.ico', true);

	$title('社交图标');
	echo (__('请输入完整的 URL (包括 https://)', 'clrs') . '<br>');
	foreach ($clrs_sns as $key => $val) {
		$clrs_sopt = 'clrs_s_' . $key;
		echo '<input type="text" size="80" name="' . $clrs_sopt . '" id="' . $clrs_sopt . '" placeholder="' . $val . '" value="' . get_option($clrs_sopt) . '"/>';
	}

	wp_enqueue_style('thickbox');
	wp_enqueue_script('thickbox');

	$title('访客环境：');
	$radio('clrs_wbos', '显示', '不显示');

	$title('文章作者：');
	$radio('clrs_adis', '显示', '不显示');

	$title('友情链接：');
	$radio('clrs_ldis', '显示', '不显示');

	$title('检查更新：');
	$radio('clrs_upcl', '启用', '关闭');
	_e('可以应对服务器设置导致的无限提示更新问题。需要更新时请手动打开此开关', 'clrs');

	$title('统计代码：');
	$textfield('clrs_tongji', '输入网站统计代码');

	$title('自定义样式：');
	$textfield('clrs_style', '输入 CSS 代码，以便更新时不会被覆盖');

	wp_nonce_field('clearision-save', 'options_save');

	$title('提交更改：');
	?>
	<input type="hidden" name="page_options" value="clrs_copy_right" />
	<input type="submit" value="<?= __('保存全部设置', 'clrs') ?>" />
	<style>
		input[type="text"] {
			max-width: 510px;
		}

		textarea {
			font-size: 14px;
			font-family: Consolas, monospace, sans-serif, sans;
		}
	</style>
	<script type="text/javascript">
		$(function() {
			$('[upload_for]').click(function() {
				window.upload_target = $(this).attr('upload_for');
				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			});
			window.send_to_editor = function(html) {
				$('[name=' + window.upload_target + ']').val($(html).attr('src'));
				tb_remove();
			}
		});
		<?php
		// 模板使用统计代码, 仅提交站点 URL, 希望保留 :)
		$statistics_code = '$(function() {
			$.get("http://work.dimpurr.com/theme/theme_tj.php?theme_name=Clearision&blog_url=' . get_bloginfo('url') . '&t=" + new Date().getTime());
		});';
		if (!get_option('clrs_fitj')) {
			// 首次安装
			update_option('clrs_fitj', true);
		} else if (date('d') != '01') {
			// 仅每月 1 号统计
			update_option('clrs_dayv', false);
			$statistics_code = '';
		} else if (!get_option('clrs_dayv')) {
			// 并且仅统计一次
			update_option('clrs_dayv', true);
		}
		echo ($statistics_code);
		?>
	</script>
	</form>
	<?php
}
