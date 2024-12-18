<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="pre-footer"></div>
<footer class="footer pt-5">
    <div class="container-xl pb-4">
        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <a href="<?=get_home_url()?>"><img
                                src="<?=get_stylesheet_directory_uri()?>/img/kingswood-wordmark.svg"
                                alt="Kingswood at Home" class="logo mb-5"></a>
                    </div>
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="footer__heading">Call us on</div>
                        <div class="footer__phone"><?=do_shortcode('[contact_phone]')?></div>
                        <div class="footer__email"><?=do_shortcode('[contact_email]')?></div>
                    </div>
                    <img src="<?=get_stylesheet_directory_uri()?>/img/BIID_Appellation_INDPARTNER_2023_AW-BLACK.png" alt="BIID Industry Partner" width=2506 height=726 style="max-width:350px">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 order-3 order-lg-1">
                        <a href="<?=get_field('showroom_link', 'options')?>"><div class="footer__heading">Showroom</div></a>
                        <a
                        href="<?=get_field('google_directions', 'options')?>"
                        target="_blank"><?=get_field('contact_address', 'options')?></a><br>
                        <a
                        href="<?=get_field('google_directions', 'options')?>"
                        target="_blank" class="mt-2 d-block"><i class="fa-solid fa-location-dot"></i> Get Directions</a>
                    </div>
                    <div class="col-md-6 col-lg-4 order-1 order-lg-2">
                        <div class="footer__heading">Our Products</div>
                        <?php wp_nav_menu(array('theme_location' => 'footer_menu1')); ?>
                    </div>
                    <div class="col-md-6 col-lg-4 order-5 order-lg-3">
                        <div class="footer__heading">Newsletter Signup</div>
                        <div>Receive our latest offers and deals in accordance with our <a href="/privacy/">privacy policy</a></div>
                        <?=do_shortcode('[mc4wp_form id=2053]')?>
                    </div>
                    <div class="col-md-6 col-lg-4 order-4">
                        <div class="footer__heading">Follow Us</div>
                        <div class="mb-3">Keep up to date with us on social media</div>
                        <div class="footer__social"><?=do_shortcode('[social_icons]')?></div>
                    </div>
                    <div class="col-md-6 col-lg-4 order-2 order-lg-5">
                        <div class="footer__heading">Useful Links</div>
                        <?php wp_nav_menu(array('theme_location' => 'footer_menu2')); ?>
                    </div>
                    <div class="col-md-6 col-lg-4 order-6">
                        <div class="footer__heading">Areas Covered</div>
                        <div class="mb-4"><?=get_field('footer_locations','options')?></div>
                        <div class="footer__badges">
                            <img src="<?=get_stylesheet_directory_uri()?>/img/makeitsafe.svg" alt="">
                            <img src="<?=get_stylesheet_directory_uri()?>/img/bbsa.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container-xl py-2">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="col-md-8 text-center text-md-start">
                    &copy; <?=date('Y')?> Kingswood At Home Ltd. Registered in England, no 09757399.
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end flex-wrap gap-3">
                    <span><a href="/privacy/">Privacy</a> & <a href="/cookies/">Cookies</a></span> |
                    <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                        title="Digital Marketing by Chillibyte"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
if (!is_page('book-appointment')) {
    ?>
<div class="mobilecta d-lg-none fixed-bottom mb-2">
    <a href="/contact/book-appointment/" class="button button--sm">Book <span>Appointment</span></a>
</div>
    <?php
}
?>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
?>
</body>

</html>