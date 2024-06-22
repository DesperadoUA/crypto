<?php
trait News {
     public function newsCard(NewsCardItem $post):string {
        return "<article class='news_item'>
                    <div class='news_item_left'>
                        <img src='{$post->thumbnail}' width='330' height='190' alt='{$post->title}' loading='lazy' />
                    </div>
                    <div class='news_item_right'>
                        <div class='news_item_ttl_wrapper'>
                            <a href='{$post->permalink}' class='news_item_ttl'>{$post->title}</a>
                            <div class='news_item_date'>{$post->publicDate}</div>
                        </div>
                        <p class='news_item_excerpt'>{$post->excerpt}</p>
                        <a href='{$post->permalink}' class='news_item_read_more'>{$this->getTranslate('READ_MORE')}</a>
                    </div>
                </article>";
    }
    public function newsLoop(NewsCardList $list):string {
        $str = "<div class='news_loop news_container'>";
        foreach ($list->posts as $item) $str .= $this->newsCard($item);
        $str .= "</div>";
        return $str;
    }
}