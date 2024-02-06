<?php
$h = get_field('level') ?? 'h2';
$classes = $block['className'] ?? 'py-4';
$stylee = get_field('style_content')[0] == 'Yes' ? 'ff-intro': null;
?>
<section class="centre_para <?=$classes?>">
    <div class="container-xl">
        <?php
        if (get_field('pre_title') ?? null) {
            ?>
    <div class="pre_title"><?=get_field('pre_title')?></div>
            <?php
        }
        if (get_field('title') ?? null) {
            ?>
        <<?=$h?> class="<?=$h?> text-center">
            <?=get_field('title')?>
        </<?=$h?>>
        <?php
        }
        ?>
        <div class="text-center max-ch <?=$stylee?>">
            <?=get_field('content')?>
        </div>
    </div>
</section>