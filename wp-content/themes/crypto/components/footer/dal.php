<?php 
global $builder;
$text = carbon_get_theme_option( OPTIONS_KEYS['FOOTER_TEXT'] );
$linkList = carbon_get_theme_option( OPTIONS_KEYS['FOOTER_MENU'] );
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
echo $builder->footer(new FooterLinkList($footerLinkList), $text);