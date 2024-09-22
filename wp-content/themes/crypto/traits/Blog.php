<?php
trait Blog {
    public function blogCard(BlogCardItem $post):string {
        $str = "<article class='blog_card border_radius_s'>
                    <div class='wrapper'>
                        <div class='top'>
                            <div class='blog_card_img_wrapper'>
                                <a href='{$post->permalink}' title='{$post->title}'>
                                    <img class='object_fit_cover border_radius_s' 
                                       width='100%' 
                                       height='160px' 
                                       alt='{$post->title} logo' 
                                       src='{$post->thumbnail}'
                                       loading='lazy'
                                    />
                                </a>
                            </div>
                        </div>
                        <div class='blog_card_center'>
                            <a href='{$post->permalink}' title='{$post->title}' class='blog_card_title'>
                                {$post->title}
                            </a>
                            <div class='blog_card_date'>{$post->publicDate}</div>
                            <div class='blog_card_desc'>{$post->excerpt}</div>
                        </div>
                        <div class='blog_card_bottom'>
                            <a href='{$post->permalink}' title='{$post->title}' class='blog_card_read_more'>";
        $str .= $this->getTranslate('READ_MORE');
        $str .= "</a></div></div>
                </article>";
        return $str;
    }
    public function blogLoop(BlogCardList $list):string {
        $str = "<div class='blog_loop blog_container'>";
        foreach ($list->posts as $item) $str .= $this->blogCard($item);
        $str .= "</div>";
        return $str;
    }
}