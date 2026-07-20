<?php
/**
 * CB Map
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? 'py-5';
?>
<section class="map <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<div class="row g-4">
			<div class="col-lg-6 col-xl-4">
				<div class="row g-4">
					<div class="col-md-6 col-lg-12">
						<h2 class="h3">Our Location</h2>
						<ul class="fa-ul">
							<li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <?= wp_kses_post( get_field( 'contact_address', 'option' ) ); ?></li>
							<li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <?= wp_kses_post( do_shortcode( '[contact_email]' ) ); ?></li>
							<li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <?= wp_kses_post( do_shortcode( '[contact_phone]' ) ); ?></li>
						</ul>
					</div>
					<div class="col-md-6 col-lg-12">
						<h2 class="h3">Opening Hours</h2>
						<ul class="fa-ul">
							<li><span class="fa-li"><i class="fa-solid fa-calendar"></i></span> <?= wp_kses_post( get_field( 'opening_hours', 'option' ) ); ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-8">
				<iframe src="<?= esc_url( get_field( 'maps_url', 'options' ) ); ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</section>