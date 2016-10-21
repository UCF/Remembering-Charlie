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

if ( post_password_required() ) {
?>
	<p class="password-protected alert">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}


$success_message = isset( $_GET['comment-success'] );
if ( $success_message ):
?>
<!-- BEGIN comment success message -->
<div class="comment-notification alert alert-success">
	<p>Thank you for submitting your message.</p>
</div>
<!-- END comment success message -->
<?php
endif;


if ( have_comments() ) : // If comments exist for this entry, continue ?>
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


<?php
if ( comments_open() ) {
	comment_form( array(
		'title_reply' => __( 'Post a Message' ),

		'comment_field' => '<p class="comment-form-comment"><label for="comment" class="sr-only">' . _x( 'Your Message' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

		'comment_notes_before' => '',

		'class_submit' => 'btn btn-default',

		'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s</button>',

		'format' => 'html5'
	) );
}
?>
