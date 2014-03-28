<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>

	<?php get_template_part('content'); ?>

	<nav id="post_nav">
		<span id="p_n_l"><?php previous_post_link( '%link', '&larr; ' . '%title' ); ?></span>
		<span id="p_n_r"><?php next_post_link( '%link', '%title ' . '&rarr;' ); ?></span>
	</nav>

	<?php comments_template( '', true ); ?>

</article>

<?php endwhile; // end of the loop. ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
