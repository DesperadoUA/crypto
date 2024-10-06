<?php
trait Footer {
    public function footer(FooterLinkList $linkList, string $footerText, FeedbackList $feedback) {
        $text = $this->footerText($footerText);
        $menu = $this->footerListMenu($linkList);
        $feedbackHtml = $this->footerFeedback($feedback);
        $str = "<footer class='footer'>
                    <div class='container'>
                        {$menu}
                        {$feedbackHtml}
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
    public function footerFeedback(FeedbackList $list) {
        if(!count($list->posts)) return "";
        $html = "<div class='footer_feedback_wrapper'>";
        foreach($list->posts as $item) {
            $html .= "<div class='footer_feedback_item'>";
            $html .= "<a href='{$item->permalink}'><img src='{$item->img->fullSettings[0]}' loading='lazy' width='21' height='21' alt='{$item->img->alt}' /> {$item->title}</a>";
            $html .= "</div>";
        }
        $html .= "</div>";
        return $html;
    }
}