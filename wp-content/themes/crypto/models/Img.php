<?php
class ImgItem {
    public string $title = '';
    public string $alt = '';
    public array $fullSettings = [];
    public array $mediumSettings = [];
    public array $largeSettings = [];
    function __construct(string $title, string $alt, $fullSettings, $mediumSettings, $largeSettings) {
        $this->title = $title;
        $this->alt = $alt;
        $this->fullSettings = $fullSettings;
        $this->mediumSettings = $mediumSettings;
        $this->largeSettings = $largeSettings;
    }
}