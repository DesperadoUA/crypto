<?php
add_shortcode( 'img', 'img_shortcode');
function img_shortcode($attr) {
    $imgItem = get_img_item($attr['id']);
    $width = wp_is_mobile() ? $imgItem->mediumSettings[1] : $imgItem->fullSettings[1];
    $height = wp_is_mobile() ? $imgItem->mediumSettings[2] : $imgItem->fullSettings[2];
    return "
        <div class='img_container'>
            <picture>
                <source media='(max-width: 768px)' srcset='{$imgItem->mediumSettings[0]}'>
                <source media='(max-width: 1200px)' srcset='{$imgItem->largeSettings[0]}'>
                <img src='{$imgItem->fullSettings[0]}' alt='{$imgItem->alt}' title='{$imgItem->title}' width='{$width}' height='{$height}' />
            </picture>
        </div>";
}
