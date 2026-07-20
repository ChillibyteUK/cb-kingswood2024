<?php
/**
 * This file is used to output the ACF script field in the footer.
 * It checks if the ACF script field is not empty and then outputs it in the footer.
 * If the field is empty, it outputs a comment indicating that no script was found.
 */

defined( 'ABSPATH' ) || exit;

global $acf_script;
$acf_script = get_field('script') ?? null;

if ( ! function_exists( 'output_acf_script' ) ) {
	function output_acf_script() {
		global $acf_script;
		if ( ! empty( $acf_script ) ) {
			echo $acf_script; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			echo '<!-- No script found in ACF field -->';
		}
	}
}

if ( $acf_script ) {
	add_action('wp_footer', 'output_acf_script', 9999);
}
