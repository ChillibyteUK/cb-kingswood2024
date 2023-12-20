<section class="four_images">
    <div class="container-xl">
        <div class="four_images__grid">
            <img src="<?=wp_get_attachment_image_url(get_field('image_1'),'full')?>" alt="">
            <img src="<?=wp_get_attachment_image_url(get_field('image_2'),'large')?>" alt="">
            <img src="<?=wp_get_attachment_image_url(get_field('image_3'),'large')?>" alt="">
            <img src="<?=wp_get_attachment_image_url(get_field('image_4'),'large')?>" alt="">
        </div>
    </div>
</section>