<?php
class DefaultBuilder implements Builder {
    use UI;
    use Reviews;
    use Game;
    use Blog;
    use News;
    private $ampPrefix = PREFIX_AMP;
    private $translate = TRANSLATE;
    private $lang = LANG;
    private $siteUrl = SITE_URL;
    private $url = URL;
    public function wp_head(HeadData $data):string {
        wp_head();
        return "<title>{$data->title}</title>
              <meta name='description' content='{$data->description}'>";
    }
    public function styles($str):string {
        return "<style>{$str}</style>";
    }
    public function canonical():string {
        $link = get_site_url() . URL;
        return "<link rel='canonical' href='{$link}'>";
    }
    public function wp_footer():string {
        wp_footer();
        global $post;
        $template = getTemplate($post);
        $postType = getPostType($post);
        $fileName = '.js';
        $filePath = TEMPLATE_DIR_URI."/dist/".TEMPLATES_DI_STYLE[$postType][$template].$fileName;
        return "<script type='text/javascript' src='{$filePath}' ></script>";
    }
    public function ampAttrHead():string {
        return "";
    }
    public function header():string {
        return "<header>Default Header</header>";
    }
    public function footer():string {
        return "<footer>Default Footer</footer>";
    }
    public function content($content):string {
        return "<section class='default_cms'>
                    <div class='container'>
                        <article class='cms'>
                            {$content}
                        </article>
                    </div>
                </section>";
    }
    public function faq(Faq $faq):string {
        $str = "<section class='faq' itemscope itemtype='https://schema.org/FAQPage'>
		            <div class='faq_title'>{$faq->title}</div>
                        <div class='container faq_wrapper'>";
        foreach ($faq->posts as $item) {
           $str .= "<div class='faq_row' itemscope itemprop='mainEntity' itemtype='https://schema.org/Question'>
                       <div class='faq_question'>
                            <span itemprop='name'>{$item->question}</span>
                            <span class='faq_close'></span>
                        </div>
                        <div class='faq_answer' itemscope itemprop='acceptedAnswer' itemtype='https://schema.org/Answer'>
                            <span itemprop='text'>{$item->answer}</span>
                        </div> 
                    </div>";
        }
        $str .= "</div></section>";
        return $str;
    }
    public function getTranslate($key):string {
        return array_key_exists($key, $this->translate) ? $this->translate[$key][$this->lang] : "";
    }
    public function headerMenu(MenuData $data):string {
        if(empty($data->posts)) return "";
        $html = "<nav class='header_nav' id='container-menu'>
                    <button class='menu_close' type='button' id='burger-close'></button>
                    <ul class='menu'>";
        foreach ($data->posts as $item) {
            $html .= "<li class='menu_item'>
                                  <a href='{$item->url}'>{$item->title}</a>";
            if(!empty($item->children)) {
                $html .= '<div class="drop_menu">';
                foreach ($item->children as $item_children) {
                    $html .= "<a class='drop_menu_item' href='{$item_children->url}'>{$item_children->title}</a>";
                }
                $html .= '</div>';
            }
            $html .= "</li>";
        }
        $html .= "</ul></nav>";
        return $html;
    }
    public function h1($str):string {
        return "<section class='section_heading'>
                   <div class='container'>
                      <h1>$str</h1>
                   </div>
               </section>";
    }
    public function banner(ImgItem $imgItem): string {
        $str = "<section class='banner'>
                <div class='container'>";
        $str .=  $this->picture($imgItem);
        $str .= "</div></section>";
        return $str;
    }
    public function categoryLinks(LinkList $list) {
        $str = "<section class='section_padding'><div class='container'><nav class='category_links_container'>";
        foreach($list->posts as $item) {
            $str .= "<a href='{$item->permalink}' class='category_item' title='{$item->title}'>{$item->title}</a>";
        }
        $str .= "</nav></div></section>";
        return $str;
    }
    public function breadcrumb(LinkList $list) {
        $str = "<section class='section_padding'><div class='container'>";
        $str .= "<ol class='breadcrumb' itemscope itemtype='https://schema.org/BreadcrumbList'>";
        for($i=0; $i < count($list->posts); $i++) {
            if($i < count($list->posts)-1) {
                $counter = $i+1;
                $str .= "<li itemprop='itemListElement' itemscope
                            itemtype='https://schema.org/ListItem' class='breadcrumbItem'>
                            <a itemprop='item' href='{$list->posts[$i]->permalink}'>
                            <span itemprop='name'>{$list->posts[$i]->title}</span></a>
                            <meta itemprop='position' content='{$counter}' />
                        </li>";
            } else {
                $str .= "<li itemprop='itemListElement' itemscope
                            itemtype='https://schema.org/ListItem' class='breadcrumbItem'>
                            <div itemprop='item'>
                            <span itemprop='name'>{$list->posts[$i]->title}</span></div>
                            <meta itemprop='position' content='{$counter}' />
                        </li>";
            }
        }
        $str .= "</ol>";
        $str .= "</div></section>";
        return $str;
    }
}