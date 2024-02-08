<section class="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-interval="4000" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = 'active';
            while(have_rows('background')) {
                the_row();
                ?>
                <div class="carousel-item <?=$active?>">
                    <img src="<?=wp_get_attachment_image_url(get_sub_field('image'),'full')?>" class="d-block w-100" alt="">
                </div>
                <?php
                $active = '';
            }
            ?>

        </div>
        
        <?php
    if (count(get_field('background')) > 1) {
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
    ?>
    </div>
    
    <div class="overlay"></div>

    <div class="container-xl">
        <div class="hero__pre-title">
            <?=get_field('pre_title')?>
        </div>
        <h1 class="hero__title"><?=get_field('title')?></h1>
        <div class="hero__content">
            <?=get_field('content')?>
        </div>
        <?php
        if (get_field('cta_1') || get_field('cta_2')) {
            ?>
        <div class="hero__ctas pt-4">
            <?php
            if(get_field('cta_1')) {
                ?>
<a href="/contact/book-appointment/" class="hero__cta hero__cta--green"><i class="fa-regular fa-calendar-days"></i> Book <span>Appointment</span></a>
                <?php
            }
            if(get_field('cta_2')) {
                ?>
<a href="/request-a-brochure/" class="hero__cta hero__cta--gold"><i class="fa-regular fa-newspaper"></i> Request <span>Brochure</span></a>
                <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </div>

</section>