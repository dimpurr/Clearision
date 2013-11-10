<hgroup class="post_hctn">
	<div class="post_time">
		<div class="post_t_d"><?php the_time('m/j') ?></div>
		<div class="post_t_u"><?php the_time('H:i') ?></div>
	</div>
	<div class="post_h_l">
		<span class="post_ct"><?php the_category(' ') ?></span>
		<h2 class="post_h"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<div class="post_tag">
			<?php $adis = get_option('clrs_adis'); if ($adis == "yes") { $c_adis = ""; } else { $c_adis = 'style="display:none;"'; }; ?>
			<span class="post_c" <?php echo $c_adis; ?> ><a class="wp-postviews"><?php the_author(); echo "&nbsp;" . __('出品','clrs'); ?></a></span>
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