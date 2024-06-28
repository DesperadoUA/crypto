<?php
class AmpBuilder implements Builder {
    use UI_AMP;
    private $ampPrefix = PREFIX_AMP;
    private $translate = TRANSLATE;
    private $lang = LANG;
    private $templateDirUri = TEMPLATE_DIR_URI;
    private $siteUrl = SITE_URL;
    private $url = URL;
    public function wp_head(HeadData $data):string {
        return "<title>{$data->title}</title>
        <meta name='description'  content='{$data->description}' />
        <script async src='https://cdn.ampproject.org/v0.js'></script>
        <script async custom-element='amp-sidebar' src='https://cdn.ampproject.org/v0/amp-sidebar-0.1.js'></script>
        <script async custom-element='amp-script' src='https://cdn.ampproject.org/v0/amp-script-0.1.js'></script>
        <script async custom-element='amp-iframe' src='https://cdn.ampproject.org/v0/amp-iframe-0.1.js'></script>";
    }
    public function styles($str):string {
        return "<style amp-boilerplate>
                    body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        -moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        -ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        animation:-amp-start 8s steps(1,end) 0s 1 normal both}
                    @-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                </style>
                <noscript>
                    <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style>
                </noscript>
                <style amp-custom>
                   {$str}     
                </style>";
    }
    public function canonical():string {
        $link = $this->siteUrl.str_replace('/'.$this->ampPrefix, '', $this->url);
        return "<link rel='canonical' href='{$link}' />";
    }
    public function wp_footer():string {
        return '';
    }
    public function ampAttrHead():string {
        return "amp";
    }
    public function header():string {
        global $post;
        $template = getTemplate($post);
        $postType = getPostType($post);
        $fileName = '.amp.js';
        $filePath = TEMPLATE_DIR_URI."/webpack_dist/".TEMPLATES_DI_STYLE[$postType][$template].$fileName;
        return "<header>AMP Header</header>
            <amp-script layout='container' src='{$filePath}'>";
    }
    public function footer():string {
        return "<footer>AMP Footer</footer></amp-script>";
    }
    public function content($content):string {
        return "<article class='content'>{$content}</article>";
    }
    public function faq(Faq $faq):string {
        return "<section class='faq'>
                    <h2>{$faq->title}</h2>
                </section>";
    }
    public function getTranslate($key):string {
        return array_key_exists($key, $this->translate) ? $this->translate[$key][$this->lang] : "";
    }
    public function headerMenu(MenuData $data):string {
        return '';
    }
    public function blogCard(BlogCardItem $post):string {
        return '';
    }
    public function blogLoop(BlogCardList $list):string {
        return '';
    }
    public function h1($str):string {
        return $str;
    }
    public function newsCard(NewsCardItem $post):string {
        return '';
    }
    public function newsLoop(NewsCardList $list):string {
        return '';
    }
    public function banner(ImgItem $imgItem):string {
        return '';
    }
    public function categoryLinks(LinkList $list):string {
        return '';
    }
    public function gameCard(GameCardItem $post):string {
        return '';
    }
    public function gameLoop(GameCardList $list):string {
        return '';
    }
    public function reviews(ReviewPostSettings $postSettings, ReviewItemList $list):string {
        return '';
    }
    public function reviewsLoop(ReviewItemList $list):string {
        return '';
    }
    public function reviewsForm($postId):string {
        return '';
    }
    public function breadcrumb(LinkList $list):string {
        return '';
    }
    public function airdropCard(AirdropCardItem $post):string {
        $str = "";
        return $str;
    }
    public function airdropLoop(AirdropCardList $list):string {
        $str = "";
        return $str;
    }
    public function gameCardTop(GameCardTop $data):string {
        return '';
    }
    public function airdropCardTop(AirdropCardTop $data):string {
        return '';
    }
}