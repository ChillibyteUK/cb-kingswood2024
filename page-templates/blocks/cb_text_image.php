<?php
$txtcol = get_field('order') == 'text' ? 'order-2 order-md-1' : 'order-2 order-md-2';
$imgcol = get_field('order') == 'text' ? 'order-1 order-md-2' : 'order-1 order-md-1';

$txtsplit = get_field('split') == '5050' ? 'col-md-6' : 'col-md-8';
$imgsplit = get_field('split') == '5050' ? 'col-md-6' : 'col-md-4';

$classes = $block['className'] ?? 'py-5';

$h = get_field('level') ?? 'h2';

?>
<section class="text_image <?=$classes?>">
    <div class="container-xl">
        <?php
        if (get_field('title') ?? null) {
            ?>
        <div class="h2 text-center d-md-none">
            <?=get_field('title')?>
        </div>
        <?php
        }
?>
        <div class="row g-4">
            <div
                class="<?=$txtsplit?> <?=$txtcol?> d-flex flex-column justify-content-center">
                <?php
        if (get_field('title') ?? null) {
            ?>
                <<?=$h?> class="d-none d-md-block
                    <?=$h?>">
                    <?=get_field('title')?>
                </<?=$h?>>
                <?php
        }
?>
                <div><?=get_field('content')?>
                </div>
                <?php
if (get_field('link') ?? null) {
    $l = get_field('link');
    ?>
                <a href="<?=$l['url']?>"
                    target="<?=$l['target']?>"
                    class="mt-4 button ms-md-0"><?=$l['title']?></a>
                <?php
}
?>
            </div>
            <div
                class="<?=$imgsplit?> <?=$imgcol?> d-flex align-items-center">
                <img src="<?=wp_get_attachment_image_url(get_field('image'), 'large')?>"
                    alt="<?=get_field('title')?>"
                    class="text_image__img mx-auto">
            </div>
        </div>
    </div>
</section>