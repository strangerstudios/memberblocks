<?php
/**
 * MemberBlocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MemberBlocks
 * @since MemberBlocks 1.0
 */


if ( ! function_exists( 'memberblocks_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since MemberBlocks 1.0
	 *
	 * @return void
	 */
	function memberblocks_support() {

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// Make theme available for translation.
		load_theme_textdomain( 'memberblocks' );
	}

endif;

add_action( 'after_setup_theme', 'memberblocks_support' );

if ( ! function_exists( 'memberblocks_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Hey 1.0
	 *
	 * @return void
	 */
	function memberblocks_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'memberblocks-style',
			get_stylesheet_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'memberblocks-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'memberblocks_styles' );

/**
 * Customize the bbp_breadcrumb output.
 *
 * @since 1.0.0
 *
 * @return array $args The bbp_breadcrumb arguments.
 */
function memberblocks_bbp_breadcrumb( $args ) {
	$args = array(
		'sep'       => '&nbsp;&#47;&nbsp;',
		'home_text' => __( 'Home', 'memberblocks' ),
		'before'    => '',
		'after'     => '',
	);
	return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'memberblocks_bbp_breadcrumb' );


/**
 * MemberBlocks Breadcrumbs
 *
 * @since 1.0.0
 *
 * @return string $breadcrumbs The breadcrumbs.
 */
function memberblocks_get_breadcrumbs() {
	global $posts, $post;

	$memberblocks_delimiter = '&nbsp;&#47;&nbsp;';
if( is_singular() ) { echo 'hi'; };
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		woocommerce_breadcrumb();
	} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
		<?php
			/* Displays bbp_breadcrumb in theme masthead */
			remove_filter( 'bbp_no_breadcrumb', '__return_true' );
			echo wp_kses_post( bbp_breadcrumb() );
			add_filter( 'bbp_no_breadcrumb', '__return_true' );
		?>
		</nav>
	<?php } elseif ( is_attachment() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php
				global $post;
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '" title="">' . get_the_title( $page->ID ) . '</a><span class="sep">' . $memberblocks_defaults['delimiter'] . '</span>';
				$parent_id     = $page->post_parent;
			}
				$breadcrumbs = array_reverse( $breadcrumbs );
			foreach ( $breadcrumbs as $crumb ) {
				echo wp_kses_post( $crumb );
			}
			?>
			<span class="current_page_item"><?php the_title(); ?></span>
		</nav>
	<?php } elseif ( is_page() && ! is_front_page() && ! is_attachment() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php
				$breadcrumbs = get_post_ancestors( $post->ID );
			if ( ! empty( $breadcrumbs ) ) {
				$breadcrumbs = array_reverse( $breadcrumbs );
				foreach ( $breadcrumbs as $crumb ) {
				?>
						<a href="<?php echo esc_url( get_permalink( $crumb ) ); ?>"><?php echo esc_html( get_the_title( $crumb ) ); ?></a>
						<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
					<?php
				}
			}
			?>
			<?php
			if ( function_exists( 'pmpro_getOption' ) && is_page( array( pmpro_getOption( 'cancel_page_id' ), pmpro_getOption( 'billing_page_id' ), pmpro_getOption( 'confirmation_page_id' ), pmpro_getOption( 'invoice_page_id' ) ) ) && ! in_array( pmpro_getOption( 'account_page_id' ), get_post_ancestors( $post->ID ) ) ) {
			?>
				<a href="<?php echo esc_url( get_permalink( pmpro_getOption( 'account_page_id' ) ) ); ?>"><?php echo esc_html( get_the_title( pmpro_getOption( 'account_page_id' ) ) ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
				<?php
			}
			?>
			<span class="current_page_item"><?php the_title(); ?></span>
		</nav>
	<?php } elseif ( is_post_type_archive() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php
			$post_type = get_post_type_object( get_query_var( 'post_type' ) );
			echo '<span class="current_page_item">' . esc_html( $post_type->labels->name ) . '</span>';
		?>
		</nav>
	<?php } elseif ( is_author() || is_tag() || is_archive() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php
			if ( is_tax() ) {
				$queried_object = get_queried_object();
				$term_taxonomy  = $queried_object->taxonomy;
				$taxonomy       = get_taxonomy( $term_taxonomy );
			}
			if ( is_tax() && count( $taxonomy->object_type ) === 1 ) {
				$post_type = get_post_type_object( $taxonomy->object_type[0] );
				?>
				<a href="<?php echo esc_url( get_post_type_archive_link( $taxonomy->object_type[0] ) ); ?>"><?php echo esc_html( $post_type->labels->name ); ?></a>
					<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
					<?php
			} elseif ( get_option( 'page_for_posts' ) ) { ?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
					<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
					<?php
			} ?>

			<?php
				if ( is_category() ) :
					echo '<span class="current_page_item">' . single_cat_title( '', false ) . '</span>';

				elseif ( is_tag() ) :
					$current_tag = single_tag_title( '', false );
					/* translators: %s: current tag archive's single title */
					printf( esc_html__( 'Posts Tagged: %s', 'memberblocks' ), '<span class="current_page_item">' . esc_html( $current_tag ) . '</span>' );

				elseif ( is_author() ) :
					/* translators: %s: current author archive's name */
					printf( esc_html__( 'Author: %s', 'memberblocks' ), '<span class="vcard current_page_item">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					/* translators: %s: day for the viewed archive */
					printf( esc_html__( 'Day: %s', 'memberblocks' ), '<span class="current_page_item">' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					/* translators: %s: month for the viewed archive */
					printf( esc_html__( 'Month: %s', 'memberblocks' ), '<span class="current_page_item">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'memberblocks' ) ) . '</span>' );

				elseif ( is_year() ) :
					/* translators: %s: year for the viewed archive */
					printf( esc_html__( 'Year: %s', 'memberblocks' ), '<span class="current_page_item">' . get_the_date( _x( 'Y', 'yearly archives date format', 'memberblocks' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Asides', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Galleries', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Images', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Videos', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Quotes', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Links', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Statuses', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Audios', 'memberblocks' ) . '</span>';

				elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
					echo '<span class="current_page_item">' . esc_html__( 'Chats', 'memberblocks' ) . '</span>';

				elseif ( is_tax( ) ) :
					echo '<span class="current_page_item">' . esc_html( single_term_title( '', false ) ) . '</span>';

				else :
					echo '<span class="current_page_item">' . esc_html__( 'Archives', 'memberblocks' ) . '</span>';

				endif;
			?></span>
		</nav>
	<?php } elseif ( is_singular( array( 'post' ) ) ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php if ( get_option( 'page_for_posts' ) ) { ?>
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<span class="current_page_item"><?php the_title(); ?></span>
		</nav>
	<?php } elseif ( is_single() ) {
		$post_type_object = get_post_type_object( get_post_type( $post ) );
		?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
			<?php } ?>
			<?php if ( $post_type_object->has_archive == true ) { ?>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
				<a href="<?php echo esc_url( get_post_type_archive_link( get_post_type( $post ) ) ); ?>"><?php echo esc_html( $post_type_object->labels->name ); ?></a>
			<?php } ?>
			<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<span class="current_page_item"><?php the_title(); ?></span>
		</nav>
	<?php } elseif ( is_search() ) { ?>
		<nav class="memberblocks-breadcrumb" itemprop="breadcrumb">
			<?php if ( empty( $memberblocks_hide_home_breadcrumb ) ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberblocks' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
			<?php } ?>
			<?php
			if ( get_option( 'page_for_posts' ) ) {
				?>
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
					<span class="sep"><?php echo esc_html( $memberblocks_delimiter ); ?></span>
					<?php
			}
			?>
			<?php esc_html_e( 'Search Results For', 'memberblocks' ); ?> '<?php the_search_query(); ?>'
		</nav>
	<?php
	}
}