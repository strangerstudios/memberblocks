<?php
/**
 * Title: Post Meta After
 * Slug: memberblocks/post-meta-after
 * Categories: query
 * Keywords: post meta
 * Block Types: core/template-part/post-meta-after
 */
?>
<!-- wp:spacer {"height":"0"} -->
<div style="height:0" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--70)">
	<!-- wp:post-author {"avatarSize":"96","showBio":true,"byline":"Author: "} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.5ch","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","right":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"border":{"top":{"color":"var:preset|color|grey-3","width":"1px"},"bottom":{"color":"var:preset|color|grey-3","width":"1px"}}},"backgroundColor":"grey-1","layout":{"type":"flex","justifyContent":"left"}} -->
	<div class="wp-block-group has-grey-1-background-color has-background" style="border-top-color:var(--wp--preset--color--grey-3);border-top-width:1px;border-bottom-color:var(--wp--preset--color--grey-3);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
		<!-- wp:paragraph -->
		<p>
			<?php echo esc_html_x( 'This entry was posted in', 'Leading phrase before the post category is displayed', 'memberblocks' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-terms {"term":"category"} /-->

		<!-- wp:paragraph -->
		<p>
			<?php echo esc_html_x( 'and tagged', 'Leading phrase before the post tags are displayed', 'memberblocks' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-terms {"term":"post_tag"} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:post-navigation-link {"type":"previous","label":"Previous: ","showTitle":true,"arrow":"arrow"} /-->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:post-navigation-link {"textAlign":"right","label":"Next: ","showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
