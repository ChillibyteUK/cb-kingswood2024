<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="padding-top">
<?php
$bg = '/wp-content/uploads/2024/02/shutters-get-in-touch.jpg';
?>    
<!-- hero -->
<section id="hero" class="hero d-flex align-items-center hero--default mb-0" style="background-position:center;background-image: url(<?=$bg?>);">
    <div class="overlay"></div>
    <div class="container-xl">
        <div class="hero__pre-title">
            404
        </div>
        <h1 class="hero__title">Page not found</h1>
        <div class="hero__content mb-4">
            We can't seem to find the page you're looking for.
        </div>
        <a href="/" class="ms-0 button">Return to the <span>Homepage</span></a>
    </div>
</section>
</main>
<?php
get_footer();