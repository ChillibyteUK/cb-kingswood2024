<?php
/**
 * CB Centre Para Block
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$h       = get_field('level') ?? 'h2';
$classes = $block['className'] ?? 'py-4';
$stylee  = 'Yes' === get_field('style_content')[0] ? 'ff-intro' : null;
?>
<section class="centre_para <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<?php
		if ( get_field( 'pre_title' ) ?? null ) {
			?>
	<div class="pre_title"><?= wp_kses_post( get_field( 'pre_title') ); ?></div>
			<?php
		}
		if ( get_field( 'title' ) ?? null ) {
			?>
		<<?= esc_attr( $h ); ?> class="<?= esc_attr( $h ); ?> text-center">
			<?= wp_kses_post( get_field( 'title' ) ); ?>
		</<?= esc_attr( $h ); ?>>
			<?php
		}
		?>
		<div class="text-center max-ch <?= esc_attr( $stylee ); ?>">
			<?= wp_kses_post( get_field( 'content' ) ); ?>
		</div>
	</div>
</section>