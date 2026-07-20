<?php
/**
 * CB Category Gallery Block
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? 'pb-5';
$ctgry   = get_field('project_category');

$q = new WP_Query(array(
	'post_type'      => 'attachment',
	'post_status'    => 'inherit', // Include attachments that are published
	'posts_per_page' => -1,
	'tax_query'      => array(
		array(
			'taxonomy' => 'project',
			'field'    => 'term_id',
			'terms'    => $ctgry,
		),
	),
));

$r = random_str(8);

if ( get_field('id') ?? null ) {
	?>
<a class="anchor" id="<?= esc_attr( get_field( 'id' ) ); ?>"></a>
	<?php
}
?>
<section class="gallery <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<?php
		if ( get_field('title') ?? null ) {
			?>
		<h2 class="h3"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
		<div class="gallery__grid">
			<?php
			while ( $q->have_posts() ) {
				$q->the_post();
				?>
			<a href="<?= esc_url( wp_get_attachment_image_url( get_the_ID(), 'full' ) ); ?>"
				class="glightbox" data-gallery="gallery<?= esc_attr( $r ); ?>">
				<img src="<?= esc_url( wp_get_attachment_image_url( get_the_ID(), 'medium' ) ); ?>"
					alt="image" class="gallery__image" />
			</a>
				<?php
			}
			?>
		</div>
	</div>
</section>