<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

<article class="post_ctn" <?php post_class(); ?>>

	<hgroup class="post_hctn">
		<div class="post_time">
			<div class="post_t_d"><?php the_time('m/j') ?></div>
			<div class="post_t_u"><?php the_time('H:i') ?></div>
		</div>
		<div class="post_h_l">
			<span class="post_ct"><?php the_category(' ') ?></span>
			<h2 class="post_h"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<div class="post_tag">
				<?php the_tags('',' ',''); ?>
				<span class="post_c"><a href="<?php comments_link(); ?>" ><?php comments_number( __('木有吐槽','clrs') , __('落单的吐槽','clrs') , __('%发吐槽','clrs') ); ?></a></span>
				<?php if ( function_exists('the_views') ) { ?>
					<span class="post_c"><a class="wp-postviews"><?php the_views(); ?></a></span>
				<?php }; ?>
				<span class="post_c"><?php echo edit_post_link( __('调教文章','clrs') ); ?></span>
			</div>
		</div>
	</hgroup>

	<div class="post_t"><?php the_content('Read More →'); ?></div>

</article>

	<?php endwhile; ?>

<div id="page_nav"><?php c_pagenavi(); ?></div>

<?php else : ?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e('什么都没有找到','clrs'); ?></h1>
	</header>

	<div class="entry-content">
		<p><?php _e('哎呀，你要找的东西好像被贝爷吃掉了……','clrs'); ?></p>
		<?php get_search_form(); ?>
	</div>
</article>

<?php endif; ?>

</div>
</div>

<?php $ldis = get_option('clrs_ldis'); 
	if ($ldis == "yes") { $c_ldis = "block"; } else { $c_ldis = "none"; }; ?>

<div id="link" style="display:<?php echo $c_ldis; ?>"><div id="link_content">
	<h3 id="link_h"><?php _e('友情链接','clrs'); ?></h3>
		<?php echo get_option('clrs_link'); ?>
</div></div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
