<?php
/**
 * Title: List of posts in three columns.
 * Slug: memberblocks/query
 * Categories: posts
 */
?>

<!-- wp:query {"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"displayLayout":{"type":"flex","columns":3},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">		
	<!-- wp:post-template {"align":"wide"} -->
		<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"max(15vw, 30vh)","align":"wide"} /-->

		<!-- wp:post-title {"textAlign":"center","isLink":true,"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"fontSize":"30"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5ch","padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:post-author {"textAlign":"center","showAvatar":false,"byline":"by ","isLink":true} /-->

			<!-- wp:paragraph -->
			<p>&bull;</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:post-terms {"term":"category"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
