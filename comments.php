<?php if ( post_password_required() ) return; ?>

<div id="cmt" class="cmt">

	<?php if ( have_comments() ) : ?>

		<ol class="cmt_list">
			<?php wp_list_comments( array( 'callback' => 'tt_comment', 'style' => 'ol' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="cmt-nav" class="navigation" role="navigation">
			<div class="cmt-nav-prev"><?php previous_comments_link( __('&larr; 更旧的吐槽','clrs') ); ?></div>
			<div class="cmt-nav-next"><?php next_comments_link( __('更新的吐槽 &rarr;','clrs') ); ?></div>
		</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e('要和谐，不要吐槽~','clrs'); ?></p>
		<?php endif; ?>

	<?php endif; ?>

<?php $comments_args = array(
  'id_form'           => 'cmt_form',
  'id_submit'         => 'cmt_submit',
  'title_reply'       => '',
  'title_reply_to'    => __('吐槽 %s','clrs'),
  'cancel_reply_link' => __('放弃治疗','clrs'),
  'label_submit'      => __('发射','clrs'),

  'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" required aria-required="true">' .
    '</textarea></p>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( '你必须 <a href="%s">登录</a> 后吐槽。' , 'clrs' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __('以 <a href="%1$s">%2$s</a> 登录。 <a href="%3$s" title="Log out of this account">退出</a>','clrs'),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div id="cmt_form_meta"><input placeholder="'.__('称呼','clrs').'" id="author" name="author" type="text" required="required" value="' . esc_attr( $commenter['comment_author'] ) .
      '" />',

    'email' =>
      '<input placeholder="'.__('邮箱','clrs').'" id="email" name="email" type="email" required="required" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" />',

    'url' =>
      '<input placeholder="'.__('站点','clrs').'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" /></div>'
    )
  ),
); ?>

	<?php comment_form($comments_args); ?>

</div>