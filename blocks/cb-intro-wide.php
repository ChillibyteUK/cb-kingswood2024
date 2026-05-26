<?php
/**
 * Block Name: Intro Wide
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$has_crown = get_field( 'has_crown' );
$crown     = isset( $has_crown ) && ! empty( $has_crown ) && 'Yes' === $has_crown[0] ? 'intro--crown' : '';
?>
<section class="intro <?= esc_attr( $crown ); ?>">
    <?php
    $has_overlay = get_field( 'has_overlay' );
	if ( isset( $has_overlay ) && ! empty( $has_overlay ) && 'Yes' === $has_overlay[0] ) {
		echo '<div class="intro__overlay"></div>';
	}
	$title_align = get_field( 'title_align' );
	$align       = isset( $title_align ) && 'Left' === $title_align ? '' : 'text-center';
	$heading_tag = get_field( 'heading_level' );
	$heading_tag = in_array( $heading_tag, array( 'h1', 'h2' ), true ) ? $heading_tag : 'h2';
	?>
    <div class="container-xl">
        <div class="intro__inner">
            <?php
            if ( get_field( 'title' ) ?? null ) {
                ?>
            <<?= esc_attr( $heading_tag ); ?> class="<?= esc_attr( $align ); ?>">
                <?= esc_html( get_field( 'title' ) ); ?>
            </<?= esc_attr( $heading_tag ); ?>>
                <?php
            }
            ?>
            <div class="intro__wide">
                <?= wp_kses_post( get_field( 'content' ) ); ?>
            </div>
        </div>
    </div>
</section>