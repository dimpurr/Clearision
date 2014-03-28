<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>

<?php get_template_part('content'); ?>

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
