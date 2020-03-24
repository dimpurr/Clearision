<?php get_header(); ?>

<div id="ctn">
	<div id="content">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class(); ?>>
					<?php get_template_part('content'); ?>
				</article>
			<?php endwhile; ?>
			<div id="page_nav">
				<?php
				$pagination = array(
					'base' => @add_query_arg('paged', '%#%'),
					'format' => '',
					'total' => $wp_query->max_num_pages,
					'current' => max($wp_query->query_vars['paged'], 1),
					'show_all' => false,
					'type' => 'plain',
					'end_size' => '0',
					'mid_size' => '5',
					'prev_text' => __('上一页', 'clrs'),
					'next_text' => __('下一页', 'clrs')
				);
				if ($wp_rewrite->using_permalinks()) {
					$pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
				}
				if (!empty($wp_query->query_vars['s'])) {
					$pagination['add_args'] = array('s' => get_query_var('s'));
				}
				echo (paginate_links($pagination));
				?>
			</div>
		<?php else : ?>
			<div class="post_ctn">
				<div class="post_h_l">
					<h2 class="post_h"><?php _e('什么都没有找到', 'clrs'); ?></h2>
				</div>
				<div class="post_t">
					<?php
					echo ('<p>' . __('哎呀，你要找的东西好像被贝爷吃掉了……', 'clrs') . '</p>');
					get_search_form();
					?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<div id="link" style="display:<?php echo get_option('clrs_ldis') ?  "block" : "none"; ?>">
	<div id="link_content">
		<h3 id="link_h"><?php _e('友情链接', 'clrs'); ?></h3>
		<?php echo get_option('clrs_link'); ?>
	</div>
</div>

<?php
get_sidebar();
get_footer();
