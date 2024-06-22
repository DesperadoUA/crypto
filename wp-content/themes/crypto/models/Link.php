<?php
class LinkItem {
    public string $title = '';
    public string $permalink = '';
    function __construct(string $title, string $permalink) {
        $this->title = $title;
        $this->permalink = $permalink;
    }
}
class LinkList {
    /** @var LinkItem[] */
    public array $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}