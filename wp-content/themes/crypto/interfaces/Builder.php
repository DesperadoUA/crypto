<?php
interface Builder {
    public function ampAttrHead();
    public function wp_head(HeadData $data);
    public function styles($str);
    public function canonical();
    public function wp_footer();
    public function footer();
    public function header();
    public function content($content);
    public function faq(Faq $faq);
    public function getTranslate($key);
    public function headerMenu(MenuData $data);
    public function blogCard(BlogCardItem $post);
    public function blogLoop(BlogCardList $list);
    public function h1(string $str);
    public function newsCard(NewsCardItem $post);
    public function newsLoop(NewsCardList $list);
    public function banner(ImgItem $imgItem);
    public function headingSection(string $key);
    public function categoryLinks(LinkList $list);
    public function gameCard(GameCardItem $post);
    public function gameLoop(GameCardList $list);
    public function gameCardTop(GameCardTop $data);
    public function reviews(ReviewPostSettings $postSettings, ReviewItemList $list);
    public function reviewsLoop(ReviewItemList $list);
    public function reviewsForm($postId);
    public function breadcrumb(LinkList $list);
    public function airdropCard(AirdropCardItem $post);
    public function airdropLoop(AirdropCardList $list);
    public function airdropCardTop(AirdropCardTop $data);
    public function loader(LoaderSettings $data);
}