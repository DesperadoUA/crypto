<?php
class AirdropCardItem {
    public $title = '';
    public $permalink = '';
    public string $thumbnail = '';
    public string $ref = '';
    public string $bonus = '';
    public LinkItem|null $ecosystem;
    public string|null $rating;
    public array $activity;
    public string $projectAward;
    public string $status;
    public string $statusKey;
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
    public string $title = '';
    public ImgItem|null $thumbnail;
    public string $ref = '';
    public string $bonus = '';
    public LinkItem|null $ecosystem;
    public array $activity;
    public string $projectAward;
    public string $status;
    public string $statusKey;
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