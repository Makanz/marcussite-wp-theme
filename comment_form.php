
<?php if ('open' == $post->comment_status) : ?>

<?php $req = true; ?>

<h3>Kommentera</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Inloggad som <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<label for="author"><small>Namn <?php if ($req) echo "*"; ?></small></label></p>
<p><input type="text" name="author" id="author" placeholder="Namn" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

<label for="email"><small>Mail (kommer inte att publiceras) <?php if ($req) echo "*"; ?></small></label></p>
<p><input type="text" name="email" id="email" placeholder="Mail" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

<label for="url"><small>Hemsida</small></label></p>
<p><input type="text" name="url" id="url" placeholder="Hemsida" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="45" placeholder="Kommentar" rows="5" tabindex="4"></textarea><br/>
* Obligatoriska f&auml;lt
</p>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Skicka" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>