<?php
/**
 * CB Text Image
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$txtcol = 'text' === get_field( 'order' ) ? 'order-2 order-md-1' : 'order-2 order-md-2';
$imgcol = 'text' === get_field( 'order' ) ? 'order-1 order-md-2' : 'order-1 order-md-1';

$txtsplit = '5050' === get_field( 'split' ) ? 'col-md-6' : 'col-md-8';
$imgsplit = '5050' === get_field( 'split' ) ? 'col-md-6' : 'col-md-4';

$classes = $block['className'] ?? 'py-5';

$h = get_field( 'level' ) ?? 'h2';

?>
<section class="text_image <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<?php
		if ( get_field('title') ?? null ) {
			?>
		<div class="h2 text-center d-md-none">
			<?= esc_html( get_field( 'title' ) ); ?>
		</div>
			<?php
		}
		?>
		<div class="row g-4">
			<div
				class="<?= esc_attr( $txtsplit ); ?> <?= esc_attr( $txtcol ); ?> d-flex flex-column justify-content-center">
				<?php
				if ( get_field( 'title' ) ?? null ) {
					?>
				<<?= esc_attr( $h ); ?> class="d-none d-md-block
					<?= esc_attr( $h ); ?>">
					<?= esc_html( get_field( 'title' ) ); ?>
				</<?= esc_attr( $h ); ?>>
					<?php
				}
				?>
				<div><?= wp_kses_post( get_field( 'content' ) ); ?></div>
				<?php
				if ( get_field( 'link' ) ?? null ) {
					$l = get_field( 'link' );
					?>
				<a href="<?= esc_url( $l['url'] ); ?>"
					target="<?= esc_attr( $l['target'] ); ?>"
					class="mt-4 button ms-md-0"><?= esc_html( $l['title'] ); ?></a>
					<?php
				}
				?>
			</div>
			<div
				class="<?= esc_attr( $imgsplit ); ?> <?= esc_attr( $imgcol ); ?> d-flex align-items-center">
				<img src="<?= esc_url( wp_get_attachment_image_url( get_field( 'image' ), 'large' ) ); ?>"
					alt="<?= esc_attr( get_field( 'title' ) ); ?>"
					class="text_image__img mx-auto">
			</div>
		</div>
	</div>
</section>