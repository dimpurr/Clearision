<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

<div class="post_ctn">

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
				<span class="post_c"><a href="<?php comments_link(); ?>" ><?php comments_number('木有吐槽','落单的吐槽','%发吐槽'); ?></a></span>
			</div>
		</div>
	</hgroup>

	<div class="post_t"><?php the_content('Read More →'); ?></div>

</div>

	<?php endwhile; ?>

<div id="page_nav"><?php c_pagenavi(); ?></div>

<?php else : ?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title">什么都没有找到</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>哎呀，你要找的东西好像被贝爷吃掉了……</p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->

<?php endif; ?>

</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>