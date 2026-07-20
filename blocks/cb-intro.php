<?php
/**
 * CB Intro
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$has_crown = get_field('has_crown');
$crown     = isset( $has_crown ) && ! empty( $has_crown ) && 'Yes' === $has_crown[0] ? 'intro--crown' : '';
?>
<section class="intro <?= esc_attr( $crown ); ?>">
	<?php
	$has_overlay = get_field( 'has_overlay' );
	if ( isset( $has_overlay ) && ! empty( $has_overlay ) && 'Yes' === $has_overlay[0] ) {
		echo '<div class="intro__overlay"></div>';
	}
	$title_align = get_field('title_align');
	$align       = isset( $title_align ) && 'Left' === $title_align ? '' : 'text-center';
	?>
	<div class="container-xl">
		<div class="intro__inner">
			<h2 class="<?= esc_attr( $align ); ?>">
				<?= wp_kses_post( get_field( 'title' ) ); ?>
			</h2>
			<div class="intro__content">
				<?= wp_kses_post( get_field( 'content' ) ); ?>
			</div>
		</div>
	</div>
</section>