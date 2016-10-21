<?php
require_once('functions/base.php');   			# Base theme functions
require_once('functions/feeds.php');			# Where functions related to feed data live
require_once('custom-taxonomies.php');  		# Where per theme taxonomies are defined
require_once('custom-post-types.php');  		# Where per theme post types are defined
require_once('functions/admin.php');  			# Admin/login functions
require_once('functions/config.php');			# Where per theme settings are registered
require_once('shortcodes.php');         		# Per theme shortcodes

//Add theme-specific functions here.


/**
 * Bare-bones logic for appending 'comment-success' GET param to the
 * comment form's redirect url, instead of linking to the
 * individual comment's anchor (which won't exist on the page if comment
 * moderation is enforced.)
 **/
function comment_confirmation_message( $location, $comment ) {
	$location_parts = explode( '#', $location );
	$location_noanchor = $location_parts[0];
	$location = strpos( $location_noanchor, '?' ) !== false ? $location_noanchor . '&comment-success' : $location_noanchor . '?comment-success';

	return $location;
}

add_filter( 'comment_post_redirect', 'comment_confirmation_message' );

?>
