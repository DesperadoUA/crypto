<?php
class GameCardItem {
    public $title = '';
    public $permalink = '';
    public string $thumbnail = '';
    public string $excerpt = '';
    public string $ref = '';
    public string $bonus = '';
    public LinkItem $ecosystem;
    function __construct(string $title, string $permalink, string $thumbnail, string $excerpt, string $bonus, string $ref, LinkItem $ecosystem = null) {
        $this->title = $title;
        $this->permalink = $permalink;
        $this->thumbnail = $thumbnail;
        $this->excerpt = $excerpt;
        $this->ref = $ref;
        $this->bonus = $bonus;
        $this->ecosystem = $ecosystem;
    }
}
class GameCardList {
    /**
     * @var GameCardItem[]
     */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}