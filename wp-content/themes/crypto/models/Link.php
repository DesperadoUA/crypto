<?php
class LinkItem {
    public $title = '';
    public $permalink = '';
    function __construct(string $title, string $permalink) {
        $this->title = $title;
        $this->permalink = $permalink;
    }
}
class LinkList {
    /** @var LinkItem[] */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}
class FooterLinkItem {
    public $title = '';
    /** @var LinkItem[] */
    public $posts = [];
    function __construct($title, array $posts) {
        $this->title = $title;
        $this->posts = $posts;
    }
}
class FooterLinkList {
    /** @var FooterLinkItem[] */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}
class FeedbackItem {
    public $title;
    public $permalink;
    public $img;
    function __construct($title, $permalink, $img) {
        $this->title = $title;
        $this->permalink = $permalink;
        $this->img = $img;
    }
}
class FeedbackList {
    /** @var FeedbackItem[] */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}