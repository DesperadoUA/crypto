<?php

class LoaderSettings {
    public $taxId;
    public $post_type;
    public $numberPostsOnQuery;
    public $totalPosts;
    public $container;
    function __construct($taxId, $post_type = 'blog', $numberPostsOnQuery, $totalPosts, $container)
    {
        $this->taxId = $taxId;
        $this->postType = $post_type;
        $this->numberPostsOnQuery = $numberPostsOnQuery;
        $this->totalPosts = $totalPosts;
        $this->container = $container;
    }
}