<?php
$cta = get_field('wide_cta', 'options');
$l = $cta['link'];
?>
<section class="wide_cta">
    <div class="overlay"></div>
    <div class="container-xl wide_cta__inner">
        <div class="row g-5 mb-4">
            <div class="col-md-6">
                <div class="wide_cta__pre-title">
                    <?=$cta['pre_title']?>
                </div>
                <div class="wide_cta__title">
                    <?=$cta['title']?>
                </div>
            </div>
            <div class="col-md-6 wide_cta__content">
                <?=$cta['content']?>
            </div>
        </div>
        <a class="wide_cta__button"
            href="<?=$l['url']?>"><span
                class="icon"></span>
            <div>
                <?=html_entity_decode($l['title'])?>
            </div>
        </a>
    </div>
</section>