<?php
$hasCrown = get_field('has_crown');
$crown = isset($hasCrown) && !empty($hasCrown) && $hasCrown[0] == 'Yes' ? 'intro--crown' : '';
?>
<section class="intro <?=$crown?>">
    <?php
    $hasOverlay = get_field('has_overlay');
if (isset($hasOverlay) && !empty($hasOverlay) && $hasOverlay[0] == 'Yes') {
    echo '<div class="intro__overlay"></div>';
}
$titleAlign = get_field('title_align');
$align = isset($titleAlign) && $titleAlign == 'Left' ? '' : 'text-center';
?>
    <div class="container-xl">
        <div class="intro__inner">
            <?php
            if (get_field('title') ?? null) {
                ?>
            <h2 class="<?=$align?>">
                <?=get_field('title')?>
            </h2>
                <?php
            }
            ?>
            <div class="intro__wide">
                <?=get_field('content')?>
            </div>
        </div>
    </div>
</section>