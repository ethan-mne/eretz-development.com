<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

if ( post_password_required() ) {
	return;
}

?>

<div id="comments"></div>

<?php if ( comments_open() || have_comments() ) : ?>

	<div class="vlt-comments-wrap">

		<?php if ( have_comments() ) : ?>

			<div class="vlt-comments">

				<h3 class="vlt-comments__title">
					<?php comments_number( esc_html__( 'No Comments', 'mikael' ) , esc_html__( 'One Comment', 'mikael' ) , esc_html__( '% Comments', 'mikael' ) ); ?>
				</h3>

				<ul class="vlt-comments__list">
					<?php
						wp_list_comments( array(
							'avatar_size' => 70,
							'style' => 'ul',
							'max_depth' => '3',
							'short_ping' => true,
							'reply_text' => esc_html__( 'Reply', 'mikael' ),
							'callback' => 'mikael_callback_custom_comment',
						) );
					?>
				</ul>

				<?php echo wp_kses_post( mikael_get_comment_navigation() ); ?>

			</div>
			<!-- /.vlt-comments -->

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

			<div class="vlt-comment-form">

				<?php
					$commenter = wp_get_current_commenter();
					$args = array(
						'title_reply' => esc_html__( 'Leave a Comment', 'mikael' ),
						'title_reply_before' => '<h3 class="vlt-comment-form__title">',
						'title_reply_after' => '</h3>',
						'cancel_reply_before' => '',
						'cancel_reply_after' => '',
						'comment_notes_before' => '',
						'comment_notes_after' => '',
						'title_reply_to' => esc_html__( 'Leave a Reply', 'mikael' ),
						'cancel_reply_link' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
						'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><span class="vlt-btn__text">%4$s</span></button>',
						'class_submit' => 'vlt-btn vlt-btn--primary',
						'label_submit' => esc_html__( 'Post a Comment', 'mikael' ),
						'fields' => array(
							'cookies' => false,
							'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Your Name', 'mikael' ) . '"></div>',
							'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Your Email', 'mikael' ) . '"></div></div>',
							'url' => '<div class="vlt-form-group"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'mikael' ) . '" size="30"></div>'
						),
					);
					$args['comment_field'] = '<div class="vlt-form-group"><textarea id="comment" name="comment" rows="3" placeholder="' . esc_attr__( 'Your Comment', 'mikael' ) . '"></textarea></div>';
					comment_form( $args );
				?>

			</div>
			<!-- /.vlt-comment-form -->

		<?php endif; ?>

	</div>
	<!-- /.vlt-comments-wrap -->

<?php endif; ?>