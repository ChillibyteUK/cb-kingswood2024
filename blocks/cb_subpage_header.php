<?php
$title = get_field('title') ?: get_the_title();
?>
<section class="subpage_header">
    <div class="container-xl py-5">
        <h1 class="subpage_header__title text-center"><?=$title?></h1>
        <div class="subpage_header__content text-center"><?=get_field('content')?></div>
        <div class="subpage_header__buttons d-flex flex-wrap gap-4 justify-content-center">
            <a href="/contact/book-appointment/" class="button">Book an <span>Appointment</span></a>
            <a href="/request-a-brochure/" class="button">Request a <span>Brochure</span></a>
        </div>
    </div>
</section>