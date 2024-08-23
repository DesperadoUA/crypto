<?php
add_shortcode( 'video', 'video_shortcode');
function video_shortcode($attr) {
    $text = $attr['text'];
    $src = $attr['src'];
    return "
        <div class='video_container'>
            <div class='video_wrapper'>
                <div class='video_title'>$text</div>
                <img src='/wp-content/themes/crypto/assets/img/youtube.webp' width='150' height='102' class='video_play' data-src='$src' />
            </div>
        </div>";
}
