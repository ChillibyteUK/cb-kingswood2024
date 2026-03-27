<?php
$classes = $block['className'] ?? null;
$blog_url = get_permalink(get_option('page_for_posts')) ?: get_post_type_archive_link('post');

$q = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'ignore_sticky_posts' => true,
));

if ($q->have_posts()) {
    ?>
<section class="latest-news py-5 <?=$classes?>">
    <div class="container-xl">
        <div class="latest-news__header d-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0">Latest News</h2>
            <?php
            if ($blog_url) {
                ?>
            <a href="<?=esc_url($blog_url)?>" class="button button--sm me-0">View <span>all</span></a>
                <?php
            }
            ?>
        </div>
        <div class="row g-4">
            <?php
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
                ?>
            <div class="col-md-6 col-lg-3 index_blog">
                <a class="index_blog__card latest-news__card" href="<?=esc_url(get_the_permalink())?>">
                    <img class="index_blog__image" src="<?=esc_url($img)?>" alt="<?=esc_attr(get_the_title())?>">
                    <div class="index_blog__content">
                        <h3 class="index_blog__title latest-news__title pb-2 mb-0" style="font-size:var(--fs-450);"><?=esc_html(get_the_title())?></h3>
                        <div class="d-flex flex-column gap-2">
                            <div class="index_blog__read"><?=estimate_reading_time_in_minutes(get_the_content(), 200, true, false)?>m read</div>
                            <div class="index_blog__meta">
                                <div class="index_blog__date"><?=esc_html(get_the_date('jS F, Y'))?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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
