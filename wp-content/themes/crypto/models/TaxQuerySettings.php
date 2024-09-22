<?php

class TaxQuerySettings {
    public $limit;
    public $postType;
    public $executeIds = [];
    public $taxId;
    public $taxonomy;
    public $offset;
    function __construct(int $taxId, string $taxonomy, $post_type = 'blog', int $limit = 15, array $execute_ids = [], $offset = 0)
    {
        $this->taxId = $taxId;
        $this->taxonomy = $taxonomy;
        $this->postType = $post_type;
        $this->limit = $limit;
        $this->executeIds = $execute_ids;
        $this->offset = $offset;
    }
}