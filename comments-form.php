<?php if ('open' == $post->comment_status) : ?>

	<div class="grid-x grid-margin-y comment-form">

    <div class="cell">
      <h5 class="ip-pink"><?php comment_form_title(); ?></h5>
    </div>

		<?php cancel_comment_reply_link(); ?>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

			<div class="cell">You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</div>

		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) : ?>

				<div class="cell">
          Logged in as <a class="ip-orange" href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out <i class="icon icon-long-arrow-right"></i></a>
        </div>

        <div class="spacer tiny"></div>

			<?php else : ?>

				<div class="cell">
          <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>

				<div class="cell">
          <label for="email">Email (<?php if ($req) echo "required"; ?>)</label>
					<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>

			<?php endif; ?>

			<div class="cell">
        <label for="email">Your comment</label>
        <textarea name="comment" id="comment" cols="100%" rows="5" tabindex="2"></textarea>
      </div>


			<div class="cell"><button name="submit" type="submit" id="submit" class="button clear orange" tabindex="5" value="Submit Comment">Post Comment <i class="icon icon-long-arrow-right"></i></button></div>
			<?php do_action('comment_form', $post->ID); comment_id_fields(); ?>

		</form>

	<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // If comments are open: delete this and the sky will fall on your head ?>
