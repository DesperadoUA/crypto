<?php
class ImgItem {
    public string $title = '';
    public string $alt = '';
    public array $fullSettings = [];
    public array $mediumSettings = [];
    public array $largeSettings = [];
    public string $description;
    function __construct(string $title, string $alt, $fullSettings, $mediumSettings, $largeSettings, $description = '') {
        $this->title = $title;
        $this->alt = $alt;
        $this->fullSettings = $fullSettings;
        $this->mediumSettings = $mediumSettings;
        $this->largeSettings = $largeSettings;
        $this->description = $description;
    }
}