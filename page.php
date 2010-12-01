<?php
/**
 * Template: Page.php
 *
 * @package WPFramework
 * @subpackage Template
 */

get_header();
$comments_page = isset($_GET['comments']);
?>
	<div class="span-24 last"><!-- col wrap -->
		
		<?php if(!$comments_page):?>
		<div class="span-14">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			
			<!--BEGIN .hentry-->
			<div id="post-<?php the_ID(); ?>" class="<?php semantic_entries(); ?>">
	                  <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
	                  <!--BEGIN .entry-meta .entry-header-->
				<div class="entry-meta entry-header">
					<?php edit_post_link( 'edit', '<span class="edit-post">[', ']</span>' ); ?>
				<!--END .entry-meta .entry-header-->
	                  </div>
	                  <?php endif; ?>

				<!--BEGIN .entry-content .article-->
				<div class="entry-content article">
					<?php the_content(); ?>
				<!--END .entry-content .article-->
				</div>
			<!--END .hentry-->
			</div>
		</div>
		<?php endif;?>
		
		<div class="comments prepend-1 <?php if($comments_page):?>span-23<?php else:?>span-9<?php endif;?> last">
			<?php
				$comments_title = 'Post a message';
			?>
			<h3><?=$comments_title?></h3>
			<?php comments_template( '', true ); ?>
		</div>
		
	</div><!-- /col wrap -->

<?php get_footer(); ?>