<?php
class ReviewItem {
    public $id;
    public $author;
    public $content;
    public $date;
    public $parentId;
    public $relativeComments;
    function __construct(string $id, string $parent_id, string $author, string $content, string $date, $chields_comments = []) {
        $this->id = $id;
        $this->parentId = $parent_id;
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->relativeComments = new ReviewItemList($chields_comments);
    }
}
class ReviewPostSettings {
    public $id;
    public $title;
    function __construct(string $id, string $title) {
        $this->id = $id;
        $this->title = $title;
    }
}
class ReviewItemList {
    /**
     * @var ReviewItem[]
     */
    public $posts = [];
    function __construct(array $posts = []) {
        $this->posts = $posts;
    }
}