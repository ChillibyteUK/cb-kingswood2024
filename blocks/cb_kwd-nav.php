
<section class="kwd_nav py-5">
    <div class="container-xl">
        <h2 class="h3 mb-4">More from Kingswood</h2>
        <div class="kwd-nav__grid">
        <?php
$parent_slugs = array('wardrobes','shutters','blinds','interiors-storage','rooms');

foreach ($parent_slugs as $slug) {
    $parent_page = get_page_by_path($slug);
    if ($parent_page) {
        $current = $parent_page->ID;
        $img = get_the_post_thumbnail_url($current, 'large') ?: get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
        ?>
    <a href="<?=get_the_permalink($current)?>"
        style="background-image:url(<?=$img?>)" ;
        class="kwd-nav__card">
        <div class="kwd-nav__card-title">
            <?=get_the_title($current)?>
        </div>
    </a>
        <?php
    }
}
        ?>
        </div>
    </div>
</section>
