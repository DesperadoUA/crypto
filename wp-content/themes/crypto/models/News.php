<?php
class NewsCardItem {
    public string $title = '';
    public string $permalink = '';
    public string $thumbnail = '';
    public string $excerpt = '';
    public string $publicDate = '';
    function __construct(string $title, string $permalink, $thumbnail, $excerpt, $publicDate) {
        $this->title = $title;
        $this->permalink = $permalink;
        $this->thumbnail = $thumbnail;
        $this->excerpt = $excerpt;
        $this->publicDate = $publicDate;
    }
}
class NewsCardList {
    /** @var NewsCardItem[] */
    public array $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}