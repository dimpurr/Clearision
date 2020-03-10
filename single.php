<?php get_header(); ?>

<div id="ctn">
<div id="content">

<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>

	<?php get_template_part('content'); ?>

	<!--添加分页功能支持-->
	<!--求钉子大大添加自定义按钮标题的功能，小白我不会-->
	<?php wp_link_pages(
	array('before' => '<div id="nav_DividedPages">分页',
	'after' => '',
	'next_or_number' => 'next',
	'link_before' =>'<span id="nav_previous_page">',
	'link_after'=>'</span>',
	'previouspagelink' => '←上一页',
	'nextpagelink' => "")); ?> 
	<?php wp_link_pages(array(
	'before' => '',
	'after' => '',
	'next_or_number' => 'number',
	'link_before' =>'<span class="nav_page_num">第',
	'link_after'=>'页</span>')); ?>
	<?php wp_link_pages(array(
	'before' => '',
	'after' => '</div>',
	'next_or_number' => 'next',
	'previouspagelink' => '',
	'link_before' =>'<span id="nav_next_page">',
	'link_after'=>'</span>',
	'nextpagelink' => "下一页→")); ?>

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
