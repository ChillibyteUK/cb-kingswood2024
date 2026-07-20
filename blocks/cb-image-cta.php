<?php
/**
 * CB Image CTA
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$img = wp_get_attachment_image_url(get_field('image'), 'full');
?>
<section class="image_cta" style="background-image:url(<?= esc_url( $img ); ?>)">
	<div class="image_cta__inner">
		<?php
		if ( get_field( 'pre_title' ) ?? null ) {
			?>
		<div class="h4 mb-0"><?= esc_html( get_field( 'pre_title' ) ); ?></div>
			<?php
		}
		?>
		<h2 class="h1 mb-2"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
		<?php
		if ( get_field( 'content' ) ?? null ) {
			?>
		<div class="image_cta__content pb-4 h5">
			<?= wp_kses_post( get_field( 'content' ) ); ?>
		</div>
			<?php
		}
		$l = get_field('link');
		?>
		<a class="button" href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>"><?= wp_kses_post( html_entity_decode( $l['title'] ) ); ?></a>
	</div>
</section>