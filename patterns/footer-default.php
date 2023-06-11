<?php
/**
 * Title: Default Footer
 * Slug: memberblocks/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"grey-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-grey-1-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html_e( 'Welcome to MemberBlocks', 'memberblocks' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>
			<?php echo esc_html_e( 'MemberBlocks is a groundbreaking block theme designed exclusively for membership sites, harnessing the full potential of the WordPress site editor while offering extensive customization options.', 'memberblocks' ); ?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>
				<?php echo esc_html_e( 'It provides an intuitive and deeply customizable platform, enabling site owners to effortlessly create and manage their unique membership-based websites.', 'memberblocks' ); ?>
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html_e( 'Categories', 'memberblocks' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:categories /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html_e( 'Recent Posts', 'memberblocks' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:latest-posts {"postsToShow":3,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":96,"featuredImageSizeHeight":72,"addLinkToFeaturedImage":true} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"right"} -->
		<p class="has-text-align-right">
		<?php
		printf(
			/* Translators: WordPress link. */
			esc_html__( 'Proudly powered by %s', 'memberblocks' ),
			'<a href="' . esc_url( __( 'https://wordpress.org', 'memberblocks' ) ) . '" rel="nofollow">WordPress</a>'
		)
		?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"right"} -->
		<p class="has-text-align-right">
		<?php
		printf(
			/* Translators: Stranger Studios link. */
			esc_html__( 'Theme: MemberBlocks by %s', 'memberblocks' ),
			'<a href="' . esc_url( __( 'https://www.strangerstudios.com', 'memberblocks' ) ) . '" rel="nofollow">Kim Coleman</a>'
		)
		?>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
