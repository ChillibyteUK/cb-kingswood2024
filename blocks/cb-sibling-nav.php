<?php
/**
 * CB Sibling Nav
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

global $post;

$current_page_id = $post->ID;
$parent_post_id  = get_post_field('post_parent', $current_page_id); // Get the parent post ID

$q = new WP_Query(array(
	'post_type'      => 'page',
	'posts_per_page' => -1,
	'post_parent'    => $parent_post_id,
	'post__not_in'   => array( $current_page_id ),
));

if ( $q->have_posts() ) {
	?>
<section class="sibling_nav py-5">
	<div class="container-xl">
		<h2 class="h3 mb-4">See Our Other Ranges</h2>
		<div class="sibling-nav__grid">
		<?php
		while ( $q->have_posts() ) {
			$q->the_post();
			$img = get_the_post_thumbnail_url(get_the_ID(), 'large') ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
			?>
		<a href="<?= esc_url( get_the_permalink() ); ?>"
		style="background-image:url(<?= esc_url( $img ); ?>)" ;
		class="sibling-nav__card">
		<div class="sibling-nav__card-title">
			<?= esc_html( get_the_title() ); ?>
		</div>
	</a>
			<?php
		}
		wp_reset_postdata();
		?>
		</div>
	</div>
</section>
	<?php
}

?>
