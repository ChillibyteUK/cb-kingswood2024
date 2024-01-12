<section class="four_images">
    <div class="container-xl">
        <div class="four_images__grid">
            <img id="four_images__large" class="four_images__image" src="<?=wp_get_attachment_image_url(get_field('image_1'),'full')?>" alt="">
            <img class="four_images__image" src="<?=wp_get_attachment_image_url(get_field('image_2'),'full')?>" alt="">
            <img class="four_images__image" src="<?=wp_get_attachment_image_url(get_field('image_3'),'full')?>" alt="">
            <img class="four_images__image" src="<?=wp_get_attachment_image_url(get_field('image_4'),'full')?>" alt="">
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function() {
    ?>
<script>
document.querySelectorAll('.four_images__image').forEach(image => {
    image.addEventListener('click', function() {
        const largeImage = document.getElementById('four_images__large');
        let tempSrc = largeImage.src;
        largeImage.src = this.src;
        this.src = tempSrc;
    });
});
</script>
    <?php
});