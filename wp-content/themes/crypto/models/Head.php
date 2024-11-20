<?php
class HeadData {
    public $title = '';
    public $description = '';
    public $ogLocale = '';
    public $ogSiteName = '';
    public $ogType = '';
    public $ogUrl = '';
    public $ogImage = '';
    function __construct(string $title = '', string $description = '', $ogUrl, $ogImage,  $ogLocale = 'ru', $ogSiteName = 'CryptoKing', $ogType = 'Page') {
        $this->title = $title;
        $this->description = $description;
        $this->ogLocale = $ogLocale;
        $this->ogSiteName = $ogSiteName;
        $this->ogType = $ogType;
        $this->ogUrl = $ogUrl;
        $this->ogImage = $ogImage;
    }
}