<?php
class MenuItem {
    public string $title = '';
    public string $url = '';
    /** @var MenuItem[] */
    public array $children = [];
    function __construct(string $title, string $url, array $children = []) {
        $this->title = $title;
        $this->url = $url;
        $this->children = $children;
    }
}
class MenuData {
    /** @var MenuItem[] */
    public array $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}