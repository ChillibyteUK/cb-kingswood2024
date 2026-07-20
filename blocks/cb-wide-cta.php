<?php
/**
 * CB Wide CTA
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$cta = get_field( 'wide_cta', 'option' );
$l   = $cta['link'];
?>
<section class="wide_cta">
	<div class="overlay"></div>
	<div class="container-xl wide_cta__inner">
		<div class="row g-5 mb-4">
			<div class="col-md-6">
				<div class="wide_cta__pre-title">
					<?= esc_html( $cta['pre_title'] ); ?>
				</div>
				<div class="wide_cta__title">
					<?= esc_html( $cta['title'] ); ?>
				</div>
			</div>
			<div class="col-md-6 wide_cta__content">
				<?= wp_kses_post( $cta['content'] ); ?>
			</div>
		</div>
		<a class="wide_cta__button"
			href="<?= esc_url( $l['url'] ); ?>"><span
				class="icon"></span>
			<div>
				<?= esc_html( html_entity_decode( $l['title'] ) ); ?>
			</div>
		</a>
	</div>
</section>