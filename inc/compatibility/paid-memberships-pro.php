<?php
/**
 * MemberBlocks Paid Memberships Pro integration.
 *
 * @package MemberBlocks
 *
 * @since 1.0.0
 * @version 1.0.0
 */

// Return early if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Paid Memberships Pro custom styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function memberblocks_pmpro_wp_enqueue_scripts(): void {
	// Return early if PMPro is not active.
	if ( ! defined( 'PMPRO_VERSION' ) ) {
		return;
	}

	// Remove default styles for Paid Memberships Pro.
	wp_dequeue_style( 'pmpro_frontend' );

	// Add custom css for Paid Memberships Pro.
	wp_enqueue_style(
		'memberblocks-pmpro',
		MEMBERBLOCKS_THEME_URI . 'assets/css/paid-memberships-pro.css',
		[],
		MEMBERBLOCKS_THEME_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'memberblocks_pmpro_wp_enqueue_scripts' );

/**
 * Custom editor styles for Paid Memberships Pro.
 *
 * @since 1.0.0
 *
 * @return void
 */
function memberblocks_pmpro_editor_styles(): void {
	// Return early if PMPro is not active.
	if ( ! defined( 'PMPRO_VERSION' ) ) {
		return;
	}

	add_editor_style( 'assets/css/paid-memberships-pro.css' );
}
add_action( 'after_setup_theme', 'memberblocks_pmpro_editor_styles' );
