<?php
/**
 * CB Hero Block Template.
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-interval="4000" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = 'active';
            while ( have_rows( 'background' ) ) {
                the_row();
                $image_alt = get_post_meta( get_sub_field( 'image' ), '_wp_attachment_image_alt', true ) ?? null;
                ?>
            <div class="carousel-item <?= esc_attr( $active ); ?>">
                <?=
                wp_get_attachment_image(
                    get_sub_field( 'image' ),
                    'full',
                    false,
                    array(
						'class' => 'd-block w-100',
						'alt'   => $image_alt,
                    )
                );
				?>
            </div>
				<?php
                $active = '';
            }
            ?>

        </div>

        <?php
		/*
		if ( count( get_field( 'background' ) ) > 1 ) {
			?>
			<div class="carousel-indicators">
			<?php
			$active = 'active';
			for ($i = 0; $i < count(get_field('background')); $i++) {
            ?>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?=$i?>" class="<?=$active?>"></button>
            <?php
            $active = '';
			}
			?>
			</div>
			<?php
			}
		*/
		?>
    </div>

    <div class="overlay"></div>

    <div class="container-xl">
		<?php
		if ( get_field( 'pre_title' ) ?? null ) {
			?>
        <div class="hero__pre-title">
            <?= esc_html( get_field( 'pre_title' ) ); ?>
        </div>
			<?php
		}
		if ( get_field( 'title' ) ?? null ) {
			?>
        <h1 class="hero__title">
            <?= esc_html( get_field( 'title' ) ); ?>
        </h1>
			<?php
		}
		if ( get_field( 'content' ) ?? null ) {
			?>
        <div class="hero__content">
            <?= wp_kses_post( get_field( 'content' ) ); ?>
        </div>
	        <?php
		}
		if ( get_field( 'cta_1' ) || get_field( 'cta_2' ) ) {
			?>
        <div class="hero__ctas py-4">
            <?php
			if ( get_field( 'cta_1' ) ) {
				?>
            <a href="/contact/book-appointment/" class="hero__cta hero__cta--green"><i
                    class="fa-regular fa-calendar-days"></i> Book <span>Appointment</span></a>
            	<?php
			}
			if ( get_field( 'cta_2' ) ) {
				?>
            <a href="/request-a-brochure/" class="hero__cta hero__cta--gold"><i class="fa-regular fa-newspaper"></i>
                Request <span>Brochure</span></a>
            	<?php
			}
			?>
        </div>
			<?php
		}
		if ( ! is_front_page() ) {
			echo do_shortcode( '[brb_collection id=4088]' );
		}
		?>
	</div>

</section>