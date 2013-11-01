<?php get_header(); ?>

<div id="ctn">
<div id="content">

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
				<span class="post_c"><a href="<?php comments_link(); ?>" ><?php comments_number( __('木有吐槽','clrs') , __('落单的吐槽','clrs') , __('%发吐槽','clrs') ); ?></a></span>
				<span class="post_c"><?php echo edit_post_link( __('调教文章','clrs') ); ?></span>
			</div>
		</div>
	</hgroup>

	<div class="post_t"><?php the_content(); ?></div>

	<nav id="post_nav">
		<span id="p_n_l"><?php previous_post_link( '%link', '&larr; ' . '%title' ); ?></span>
		<span id="p_n_r"><?php next_post_link( '%link', '%title ' . '&rarr;' ); ?></span>
	</nav>

	<?php comments_template( '', true ); ?>

</div>

<?php endwhile; // end of the loop. ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
