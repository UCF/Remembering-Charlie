<?php
/**
 * Template Name: One Column
 **/
?>
<?php get_header(); the_post();?>
	<div class="row page-content" id="<?=$post->post_name?>">
		<div class="span12">
			<article>
				<?
				$header_img_id = get_post_meta($post->ID, 'page_default_header_img', TRUE);
				$header_img = wp_get_attachment_url(get_post($header_img_id)->ID);
				if ($header_img_id && !empty($header_img)) {
				?>
					<div class="container story-header-image" style="background-image: url('<?=$header_img?>'); ?>">
						<img src="<?=$header_img?>" alt="<?=$post->post_title?>" title="<?=$post->post_title?>" />
					</div>
				<?php } ?>
				<?php the_content();?>
			</article>
		</div>
	</div>
<?php get_footer();?>
