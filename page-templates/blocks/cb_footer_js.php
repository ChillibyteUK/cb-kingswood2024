<?php
add_action('wp_footer', function () {
    get_field('script');
}, 9999);
