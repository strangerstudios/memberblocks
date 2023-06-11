<?php
/**
 * Title: Post Meta Before
 * Slug: memberblocks/post-meta-before
 * Categories: query
 * Keywords: post meta
 * Block Types: core/template-part/post-meta-before
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base"} -->
<div class="wp-block-group has-base-color has-primary-background-color has-text-color has-background has-link-color">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.5ch"}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph -->
		<p>
			<?php echo esc_html_x( 'Posted', 'Verb to explain the publication status of a post', 'memberblocks' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-date /-->

		<!-- wp:paragraph -->
		<p>
			<?php echo esc_html_x( 'by', 'Preposition to show the relationship between the post and its author', 'memberblocks' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:post-author {"showAvatar":false,"isLink":true} /-->

	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
