<?php
/**
 * Template: Page.php
 *
 * @package WPFramework
 * @subpackage Template
 */

get_header();
?>
	<div class="span-24 last"><!-- col wrap -->
		
		<h2 class="entry-title"><?php the_title(); ?></h2>
		
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
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
		<?php comments_template( '', true ); ?>

		<?php endwhile; endif; ?>
		
	</div><!-- /col wrap -->

<?php get_footer(); ?>