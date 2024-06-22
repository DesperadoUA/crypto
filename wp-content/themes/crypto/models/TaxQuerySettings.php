<?php

class TaxQuerySettings {
    public int $limit;
    public string $postType;
    public array $executeIds = [];
    public int $taxId;
    public string $taxonomy;
    function __construct(int $taxId, string $taxonomy, $post_type = 'blog', int $limit = 15, array $execute_ids = [])
    {
        $this->taxId = $taxId;
        $this->taxonomy = $taxonomy;
        $this->postType = $post_type;
        $this->limit = $limit;
        $this->executeIds = $execute_ids;
    }
}