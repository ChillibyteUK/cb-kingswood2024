<?php
global $acf_script;
$acf_script = get_field('script');

function output_acf_script()
{
    global $acf_script;
    if (!empty($acf_script)) {
        echo '<script type="text/javascript">' . htmlspecialchars($acf_script, ENT_QUOTES, 'UTF-8') . '</script>';
    } else {
        echo '<!-- No script found in ACF field -->';
    }
}
add_action('wp_footer', 'output_acf_script', 9999);
