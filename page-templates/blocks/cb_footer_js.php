<?php
global $acf_script;
$acf_script = get_field('script') ?? null;

function output_acf_script()
{
    global $acf_script;
    if (!empty($acf_script)) {
        echo $acf_script;
    } else {
        echo '<!-- No script found in ACF field -->';
    }
}

if ($acf_script) {
    add_action('wp_footer', 'output_acf_script', 9999);
}
