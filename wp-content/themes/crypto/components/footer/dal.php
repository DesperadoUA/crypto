<?php 
global $builder;
$text = carbon_get_theme_option( OPTIONS_KEYS['FOOTER_TEXT'] );
$linkList = carbon_get_theme_option( OPTIONS_KEYS['FOOTER_MENU'] );
$feedbackList = carbon_get_theme_option( OPTIONS_KEYS['FEEDBACK'] );
$feedbackLinkList = [];
$footerLinkList = [];
foreach($linkList as $item) {
    $title = $item['title_footer_section'];
    $links = [];
    foreach($item['footer_menu_items'] as $menuItem) {
        $link = new LinkItem($menuItem['title'], $menuItem['link']);
        $links[] = $link;
    }
    $footerLinkList[] = new FooterLinkItem($title, $links);
}
foreach($feedbackList as $item) {
    $title = $item['text'];
    $permalink = $item['link'];
    $img = get_img_item($item['icon']);
    $feedbackLinkList[] = new FeedbackItem($title, $permalink, $img);
}
echo $builder->footer(new FooterLinkList($footerLinkList), $text, new FeedbackList($feedbackLinkList));