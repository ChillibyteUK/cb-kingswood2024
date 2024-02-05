<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'				=> 'cb_hero',
            'title'				=> __('CB Hero'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_hero.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_intro',
            'title'				=> __('CB Intro'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_intro.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_text_image',
            'title'				=> __('CB Text / Image'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_text_image.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_child-nav',
            'title'				=> __('CB Child Nav'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_child-nav.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_sibling-nav',
            'title'				=> __('CB Sibling Nav'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_sibling-nav.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_kwd-nav',
            'title'				=> __('CB Kingswood Nav'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_kwd-nav.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_nav_cards',
            'title'				=> __('CB Nav Cards'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_nav_cards.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_wide_cta',
            'title'				=> __('CB Wide CTA'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_wide-cta.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_features',
            'title'				=> __('CB Kingswood Features'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_features.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_subpage_header',
            'title'				=> __('CB Sub-Page Header'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_subpage_header.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_four_images',
            'title'				=> __('CB Four Images'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_four_images.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));

        // DOORS
        acf_register_block_type(array(
            'name'				=> 'cb_door_style',
            'title'				=> __('CB Door Style'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_door_style.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_door_finish',
            'title'				=> __('CB Door Finish'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_door_finish.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_door_colour',
            'title'				=> __('CB Door Colour'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_door_colour.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/columns') {
        // $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_heading';
    }
    // if ( $name == 'core/button' ) {
    //     $args['render_callback'] = 'modify_core_buttons';
    // }
    // if ( $name == 'core/quote' ) {
    //     $args['render_callback'] = 'modify_core_quote';
    // }

    // echo '<pre>' . $name . '</pre>';

    return $args;
}

function modify_core_add_container($attributes, $content)
{
    ob_start();
    // $class = $block['className'];
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_heading($attributes, $content)
{
    ob_start();
    $id = strtolower(wp_strip_all_tags($content));
    $id = cbslugify($id);
    ?>
<div class="container-xl" id="<?=$id?>">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}


add_filter('acf/load_field/name=door_style', 'populate_door_style_choices');

function populate_door_style_choices($field)
{
    // Ensure ACF is loaded
    if (function_exists('get_field')) {
        // Get repeater field data from options page
        $repeater_values = get_field('door_styles', 'option');

        // Check if there's any data
        if ($repeater_values) {
            // Clear any default choices set in ACF admin
            $field['choices'] = array();

            // Loop over the repeater rows
            foreach ($repeater_values as $row) {
                // Adjust the line below according to the structure of your repeater sub-fields
                $option_value = $row['title']; // Replace 'sub_field_name' with the actual sub-field name you want to use
                // Populate the choices array
                $field['choices'][$option_value] = $option_value;
            }
        }
    }
    return $field;
}

add_filter('acf/load_field/name=door_finish', 'populate_door_finish_choices');

function populate_door_finish_choices($field)
{
    // Ensure ACF is loaded
    if (function_exists('get_field')) {
        // Get repeater field data from options page
        $repeater_values = get_field('door_finishes', 'option');

        // Check if there's any data
        if ($repeater_values) {
            // Clear any default choices set in ACF admin
            $field['choices'] = array();

            // Loop over the repeater rows
            foreach ($repeater_values as $row) {
                // Adjust the line below according to the structure of your repeater sub-fields
                $option_value = $row['title']; // Replace 'sub_field_name' with the actual sub-field name you want to use
                // Populate the choices array
                $field['choices'][$option_value] = $option_value;
            }
        }
    }
    return $field;
}

add_filter('acf/load_field/name=door_colour', 'populate_door_colour_choices');

function populate_door_colour_choices($field)
{
    // Ensure ACF is loaded
    if (function_exists('get_field')) {
        // Get repeater field data from options page
        $repeater_values = get_field('door_colours', 'option');

        // Check if there's any data
        if ($repeater_values) {
            // Clear any default choices set in ACF admin
            $field['choices'] = array();

            // Loop over the repeater rows
            foreach ($repeater_values as $row) {
                // Adjust the line below according to the structure of your repeater sub-fields
                $option_value = $row['title']; // Replace 'sub_field_name' with the actual sub-field name you want to use
                // Populate the choices array
                $field['choices'][$option_value] = $option_value;
            }
        }
    }
    return $field;
}

/*

function modify_core_buttons($attributes, $content) {
    ob_start();

    $btn = $content;

    preg_match('/class="wp-block-button (.*?)"/', $btn, $class);

    preg_match('/href="(.*?)"/', $btn, $link);

    preg_match('/target="(.*?)" rel="(.*?)"/', $btn, $target);

    preg_match('/<a.*?>(.*?)<\/a>/', $btn, $label);

    ?>
    <!-- core/buttons -->
    <div class="container-xl clearfix mb-4"><a class="btn <?=$class[1]?>" href="<?=$link[1]?>" target="<?=$target[1]?>" rel="<?=$target[2]?>"><?=$label[1]?></a></div>
    <?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_quote($attributes, $content) {
    ob_start();

    ?>
    <!-- wp_quote -->
    <div class="container-xl">
        <div class="wp-block-quote--cb my-4 w-md-75 mx-auto">
            <div class="overlay"></div>
            <?=$content?>
        </div>
    </div>
    <?php

    $content = ob_get_clean();
    return $content;
}

*/
?>