<?php
add_shortcode( 'figure', 'figure');
function figure($attr) {
    if(!array_key_exists("id", $attr)) return "";
    $imgItem = get_img_item($attr['id']);
    $width = wp_is_mobile() ? $imgItem->mediumSettings[1] : $imgItem->fullSettings[1];
    $height = wp_is_mobile() ? $imgItem->mediumSettings[2] : $imgItem->fullSettings[2];
    $str = "<div class='figure_container'><figure>";
    $str .= "<picture>
                <source media='(max-width: 768px)' srcset='{$imgItem->mediumSettings[0]}'>
                <source media='(max-width: 1200px)' srcset='{$imgItem->largeSettings[0]}'>
                <img src='{$imgItem->fullSettings[0]}' alt='{$imgItem->alt}' title='{$imgItem->title}' width='{$width}' height='{$height}' />
            </picture>";
    $str .= "<figcaption>{$imgItem->description}</figcaption>";
    $str .= "</figure></div>";
    return $str;
}