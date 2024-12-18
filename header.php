<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-kingswood2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="stylesheet" href="https://use.typekit.net/uny4fbv.css">
    <?php
if (get_field('ga_property', 'options')) {
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
}
if (get_field('gtm_property', 'options')) {
    ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?=get_field('gtm_property', 'options')?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <?php
}
if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
}
if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
}

wp_head();
?>

<?php
if ( is_page(array(7,102)) ) {
?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "name": "Kingswood at Home Ltd",
            "url": "https://www.kingswoodathome.co.uk/",
            "logo": "https://www.kingswoodathome.co.uk/wp-content/themes/cb-kingswood2024/img/kingswood-wordmark.svg",
            "description": "Family run company based in Sussex designing, building and installing Fitted Furniture, Media units, Wardrobes, Shutters & Blinds, Wall Panelling.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Unit 32, Henfield Business Park, Shoreham Road",
                "addressLocality": "Henfield",
                "addressRegion": "West Sussex",
                "postalCode": "BN5 9SL",
                "addressCountry": "GB"
            },
            "telephone": "+44 (0) 800 470 1112",
            "openingHours": ["Mo-Fr 09:00-17:00, Sa 09:00-13:00"],
            "email": "info@kingswoodathome.co.uk",
            "aggregateRating": {
                "@type": "AggregateRating",
                "bestRating": "<?=get_field('best_rating', 'options')?>",
                "ratingValue": "<?=get_field('rating_value', 'options')?>",
                "reviewCount": "<?=get_field('review_count', 'options')?>"
            },
            "sameAs": [
                "https://www.instagram.com/kingswoodathome/",
                "https://www.facebook.com/kingswoodathome/",
                "https://twitter.com/kingswoodathome",
                "https://www.pinterest.co.uk/kingswoodshuttersuk/"
            ]
        }
    </script>
<?php
}
?>
</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
do_action('wp_body_open');

$sale_banner = get_field('show_sale_banner','option');
if (is_array($sale_banner) && isset($sale_banner[0]) && $sale_banner[0] === 'Yes') {
    ?>
<div class="topbit text-center">
    <?=get_field('banner_text','option')?>
</div>
    <?php
}
?>
    <div id="theNav">
        <div id="preNav">
            <div class="container-xl">
                <a href="/" class="logo" aria-label="Home"></a>
                <div class="d-none d-lg-flex contact">
                    <span class="contact__phone">
                        <?=do_shortcode('[contact_phone]')?>
                    </span>
                    <a href="/contact/book-appointment/" class="button button--sm">Book an <span>Appointment</span></a>
                    <a href="/request-a-brochure/" class="button button--sm">Request a <span>Brochure</span></a>
                </div>
                <div class="button-container text-end d-flex d-lg-none align-items-center justify-content-between">
                    <a href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"
                        class="me-4"><i class="fa-solid fa-phone text-green-400"></i></a>
                    <button class="navbar-toggle collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                    </button>
                </div>
            </div>
        </div>
        <div id="wrapper-navbar" class="sticky-top">
            <div class="container-xl">
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="collapse navbar-collapse" id="navbar">
                    <?php
                    wp_nav_menu(
    array(
        'theme_location'  => 'primary_nav',
        'container_class' => 'w-100',
        // 'container_id'    => 'primaryNav',
        'menu_class'      => 'navbar-nav justify-content-between w-100',
        'fallback_cb'     => '',
        'menu_id'         => 'navbarr',
        'depth'           => 3,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
    )
);
?>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <script>
document.querySelectorAll('.dropdown').forEach(function (dropdown) {
  dropdown.addEventListener('show.bs.dropdown', function (e) {
    const dropdownMenu = e.target.querySelector('.dropdown-menu');
    
    // Ensure dropdownMenu exists
    if (dropdownMenu) {
      const rect = dropdownMenu.getBoundingClientRect();

      // Check if the dropdown menu goes beyond the viewport on the right side
      if (rect.right > window.innerWidth) {
        dropdownMenu.classList.add('dropdown-menu-end');
      }
    }
  });
});

</script>