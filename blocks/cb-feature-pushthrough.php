<?php
/**
 * Template for the CB Feature Pushthrough block.
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$image   = get_field( 'image' );
$btitle  = get_field( 'title' );
$content = get_field( 'content' );
$l       = get_field( 'link' );

?>
<section class="cb-feature-pushthrough">
	<div class="cb-feature-pushthrough__row">
		<div class="cb-feature-pushthrough__content">
			<div class="cb-feature-pushthrough__content-inner">
				<?php if ( $btitle ) : ?>
				<h2 class="cb-feature-pushthrough__title"><?= esc_html( $btitle ); ?></h2>
				<?php endif; ?>
				<?php if ( $content ) : ?>
				<div class="cb-feature-pushthrough__text"><?= wp_kses_post( $content ); ?></div>
				<?php endif; ?>
				<?php if ( $l ) : ?>
				<a class="cb-feature-pushthrough__link" href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>"><?= wp_kses_post( html_entity_decode( $l['title'] ) ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="cb-feature-pushthrough__image">
			<?php if ( $image ) : ?>
			<?=
			wp_get_attachment_image(
				$image,
				'full',
				false,
				array(
					'class' => 'cb-feature-pushthrough__img',
					'alt'   => get_post_meta( $image, '_wp_attachment_image_alt', true ),
				)
			);
			?>
			<?php endif; ?>
		</div>
	</div>
</section>