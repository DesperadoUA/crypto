<?php
class AirdropCardItem {
    public $title = '';
    public $permalink = '';
    public $thumbnail = '';
    public $ref = '';
    public $bonus = '';
    public $ecosystem;
    public $rating;
    public $activity;
    public $projectAward;
    public $status;
    public $statusKey;
    function __construct(string $title, string $permalink, string $thumbnail, string $bonus, string $ref, $rating = 0, 
        $activity = [], 
        $project_award = '', 
        $status = '',
        $statusKey,
        LinkItem $ecosystem = null) 
        {
            $this->title = $title;
            $this->permalink = $permalink;
            $this->thumbnail = $thumbnail;
            $this->ref = $ref;
            $this->bonus = $bonus;
            $this->rating = $rating;
            $this->activity = $activity;
            $this->projectAward = $project_award;
            $this->status = $status;
            $this->statusKey = $statusKey;
            $this->ecosystem = $ecosystem;
        }
}
class AirdropCardList {
    /**
     * @var AirdropCardItem[]
     */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}
class AirdropCardTop {
    public $title = '';
    public $thumbnail;
    public $ref = '';
    public $bonus = '';
    public $ecosystem;
    public $activity;
    public $projectAward;
    public $status;
    public $statusKey;
    function __construct(string $title, $thumbnail, string $bonus, string $ref,  $activity = [], $project_award = '', $status = '', 
        $statusKey, LinkItem $ecosystem = null) {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->ref = $ref;
        $this->bonus = $bonus;
        $this->activity = $activity;
        $this->projectAward = $project_award;
        $this->status = $status;
        $this->statusKey = $statusKey;
        $this->ecosystem = $ecosystem;
    }
}