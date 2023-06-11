<?php
/**
 * Title: Default Header
 * Slug: memberblocks/header-default
 * Categories: header
 * Block Types: core/template-part/header
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:site-title {"level":0} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"ref":2439,"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left"}} /-->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"tertiary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-tertiary-background-color has-background wp-element-button">CTA Button</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"border":{"top":{"color":"var:preset|color|grey-3","width":"1px"},"bottom":{"color":"var:preset|color|grey-3","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"grey-1","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-grey-1-background-color has-background" style="border-top-color:var(--wp--preset--color--grey-3);border-top-width:1px;border-bottom-color:var(--wp--preset--color--grey-3);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:navigation {"ref":2163,"align":"wide"} /-->

			<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonPosition":"no-button","buttonUseIcon":true} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
