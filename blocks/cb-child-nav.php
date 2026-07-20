<?php
/**
 * CB Child Nav Block
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="child-nav py-5">
	<div class="container-xl">
		<div class="child-nav__grid">
			<?php
			global $post;

			$current_page_id = $post->ID;

			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $current_page_id,
			);

			$query = new WP_Query($args);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$img = get_the_post_thumbnail_url(get_the_ID(), 'large') ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
					?>
			<a href="<?= esc_url( get_the_permalink() ); ?>"
				style="background-image:url(<?= esc_url( $img ); ?>)" ;
				class="child-nav__card">
				<div class="child-nav__card-title">
					<?= esc_html( get_the_title() ); ?>
				</div>
			</a>
					<?php
				}
				wp_reset_postdata();
			} else {
				echo 'No child pages found';
			}
			?>
		</div>
	</div>
</section>