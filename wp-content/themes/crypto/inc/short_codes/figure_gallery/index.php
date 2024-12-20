<?php
add_shortcode( 'figure_gallery', 'figure_gallery');
function figure_gallery($attr) {
    if(!array_key_exists("ids", $attr)) return "";
    $Ids = explode(",", $attr['ids']);
    $str = "<div class='gallery_container'>";
    foreach($Ids as $id) {
        $imgItem = get_img_item($id);
        $width = wp_is_mobile() ? $imgItem->mediumSettings[1] : $imgItem->fullSettings[1];
        $height = wp_is_mobile() ? $imgItem->mediumSettings[2] : $imgItem->fullSettings[2];
        $str .= "<figure><picture>
                <source media='(max-width: 768px)' srcset='{$imgItem->mediumSettings[0]}'>
                <source media='(max-width: 1200px)' srcset='{$imgItem->largeSettings[0]}'>
                <img src='{$imgItem->fullSettings[0]}' alt='{$imgItem->alt}' title='{$imgItem->title}' width='{$width}' height='{$height}' />
            </picture>
            <figcaption>{$imgItem->description}</figcaption>
            </figure>";
    }
    $str .= "</div>";
    return $str;
}
