<?php
/**
 * FAQ Block
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? 'py-5';
?>
<section class="faqs <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<?php
		if ( get_field( 'title' ) ?? null ) {
			?>
		<h2 class="mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}

		$accordion = random_str(5);

		echo '<div itemscope="" itemtype="https://schema.org/FAQPage" id="accordion' . esc_attr( $accordion ) . '" class="accordion accordion-flush">';
		$counter   = 0;
		$show      = 'show';
		$collapsed = '';
		while ( have_rows('faqs') ) {
			the_row();
			$ac = $accordion . '_' . $counter;
			?>
		<div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion-item">
			<div class="accordion-head accordion-collapse <?= esc_attr( $collapsed ); ?>"
				itemprop="name" data-bs-toggle="collapse"
				id="heading_<?= esc_attr( $ac ); ?>"
				data-bs-target="#c<?= esc_attr( $ac ); ?>" aria-expanded="true"
				aria-controls="collapse_<?= esc_attr( $ac ); ?>">
				<div class="h4">
					<?= wp_kses_post( get_sub_field( 'question' ) ); ?>
				</div>
			</div>
			<div class="collapse <?= esc_attr( $show ); ?>" itemscope=""
				itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"
				id="c<?= esc_attr( $ac ); ?>"
				aria-labelledby="heading_<?= esc_attr( $ac ); ?>"
				data-bs-parent="#accordion<?= esc_attr( $accordion ); ?>">
				<div itemprop="text" class="faq__answer">
					<?= wp_kses_post( get_sub_field( 'answer' ) ); ?>
				</div>
			</div>
		</div>
			<?php
			++$counter;
			$show      = '';
			$collapsed = 'collapsed';
		}
		echo '</div>';
		?>
	</div>
</section>