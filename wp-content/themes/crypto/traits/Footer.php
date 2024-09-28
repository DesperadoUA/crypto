<?php
trait Footer {
    public function footer(FooterLinkList $linkList, string $footerText) {
        $text = $this->footerText($footerText);
        $menu = $this->footerListMenu($linkList);
        $str = "<footer class='footer'>
                    <div class='container'>
                        {$menu}
                        {$text}
                    </div>
                </footer>";
        return $str;
    }
    public function footerListMenu(FooterLinkList $list) {
        if(!count($list->posts)) return '';
        $html = "<div class='footer_menu_wrapper'>";
        foreach($list->posts as $item) {
            $html .= "<div class='footer_menu_item'>";
            $html .= "<div class='footer_menu_item_title'>";
            $html .= $item->title;
            $html .= "</div>";
            if(count($item->posts)) {
                $html .= "<menu>";
                $html .= "<nav>";
                $html .= "<ul>";
                foreach($item->posts as $link) {
                    $html .= "<li class='footer_menu_item_link'><a href='{$link->permalink}'>{$link->title}</a></li>";
                }
                $html .= "</ul>";
                $html .= "<nav>";
                $html .= "</menu>";
            }
            $html .= "</div>";
        }
        $html .= "</div>";
        return $html;
    }
    public function footerText(string $str) {
        return "<div class='footer_text'>{$str}</div>";
    }
}