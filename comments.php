<?php
/**
 * Template: Comments.php
 *
 * @package WPFramework
 * @subpackage Template
 */

// Make sure comments.php doesn't get loaded directly
if ( !empty( $_SERVER[ 'SCRIPT_FILENAME' ] ) && 'comments.php' == basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) )
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="password-protected alert">This post is password protected. Enter the password to view comments.</p>
<?php return; } ?>

<?php if ( have_comments() ) : // If comments exist for this entry, continue ?>
<!--BEGIN #comments-->
<div id="comments">

<?php 
	$comments_page = isset($_GET['comments']);
	
	$comments = get_comments(array(
		'number' => ($comments_page) ? null : 5,
		'order'  => 'DESC',
		'status' => 'approve',
	));
	
?>
<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
    <!--BEGIN .comment-list-->
    <ol class="comment-list">
		<?php foreach($comments as $comment):?>
		<li>
			<div class="comment-content">
				<?php comment_text($comment->comment_ID)?>
			</div>
			<div class="comment-author">
				&mdash; <?php comment_author($comment->comment_ID)?>
			</div>
		</li>
		<?php endforeach;?>
    <!--END .comment-list-->
	<?php $count = framework_count('comment', false);?>
	<?php if ($count > $limit and !$comments_page):?>
		<li><a href="?comments">All Messages</a></li>
	<?php endif;?>
    </ol>
<?php } ?>

<!--END #comments-->
</div>
<?php endif; // ( have_comments() ) ?>

<?php if ( comments_open() ) : // show comment form ?>
<!--BEGIN #respond-->
<div id="respond" <?php if(!$count):?>class="nocomments"<?php endif;?>>

    <div class="cancel-comment-reply"><?php cancel_comment_reply_link( 'Cancel Reply' ); ?></div>
    
    <h3 id="leave-a-reply"><?php comment_form_title( 'Post a Message', 'Leave a message to %s' ); ?></h3> 
    
    <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
	<p id="login-req" class="alert">You must be <a href="<?php echo get_option( 'siteurl' ); ?>/wp-login.php?redirect_to=<?php echo urlencode( get_permalink() ); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
	
    <!--BEGIN #comment-form-->
	<form id="comment-form" method="post" action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php">
		
		<!--BEGIN #form-section-comment-->
        <div id="form-section-comment" class="form-section">
        	<textarea name="comment" id="comment" tabindex="4" rows="10" cols="65"></textarea>
        <!--END #form-section-comment-->
        </div>
        
        <!--BEGIN #form-section-author-->
        <div id="form-section-author" class="form-section">
            <input name="author" id="author" type="text" tabindex="1" <?php if ( $req ) echo "aria-required='true'"; ?> />
            <label for="author"<?php if ( $req ) echo ' class="required"'; ?>>Name</label>
        <!--END #form-section-author-->
        </div>
		
		<!--BEGIN #form-section-email-->
		<div id="form-section-email" class="form-section">
		    <input name="email" id="email" type="text" tabindex="2" <?php if ( $req ) echo "aria-required='true'"; ?> />
		    <label for="email"<?php if ( $req ) echo ' class="required"'; ?>>Email</label>
		<!--END #form-section-email-->
		</div>
        
        <!--BEGIN #form-section-actions-->
        <div id="form-section-actions" class="form-section">
			<button name="submit" id="submit" type="submit" tabindex="5">Post your comment</button>
			<?php comment_id_fields(); ?>
        <!--END #form-section-actions-->
        </div>

	<?php do_action( 'comment_form', $post->ID ); // Available action: comment_form ?>
    <!--END #comment-form-->
    </form>
    
	<?php endif; // If registration required and not logged in ?>
<!--END #respond-->
</div>
<?php endif; // ( comments_open() ) ?>