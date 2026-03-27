<section class="options_panel">
    <div class="options_panel__heading bg-grey-900">Door Style</div>
    <div class="container-xl">
        <div class="options_panel__grid">
        <?php
$selected_door_styles = get_field('door_style');

if ($selected_door_styles) {
    $repeater_values = get_field('door_styles', 'options');
    if ($repeater_values) {
        foreach ($selected_door_styles as $selected_style) {
            foreach ($repeater_values as $row) {
                if ($row['title'] === $selected_style) {
                    $icon = $row['icon'];
                    $name = $row['title'];
                    ?>
                    <div class="options_panel__card">
                        <img src="<?=wp_get_attachment_image_url($icon,'full')?>" alt="">
                        <div><?=$name?></div>
                    </div>
                    <?php
                }
            }
        }
    }
}
        ?>
        </div>
    </div>
</section>