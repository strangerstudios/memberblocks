<?php
/**
 * Title: Hidden No Results Content
 * Slug: memberblocks/hidden-no-results-content
 * Inserter: no
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph -->
	<p>
	<?php echo esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Message explaining that there are no results returned from a search', 'memberblocks' ); ?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonUseIcon":true} /-->
</div>
<!-- /wp:group -->
