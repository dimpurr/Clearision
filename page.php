<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php while ( have_posts() ) : the_post(); ?>

<div class="post_ctn">

	<hgroup class="post_hctn">
		<div class="post_h_l">
			<span class="post_ct"><?php the_category(' ') ?></span>
			<h2 class="post_h"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
	</hgroup>

	<div class="post_t"><?php the_content(); ?></div>

	<?php comments_template( '', true ); ?>

</div>

<?php endwhile; ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
