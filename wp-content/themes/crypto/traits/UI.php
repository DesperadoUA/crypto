<?php
trait UI {
    public function button():string {
        return "<button>Default Button</button>";
    }
    public function picture(ImgItem $imgItem, string $class = ''):string {
        $width = wp_is_mobile() ? $imgItem->mediumSettings[1] : $imgItem->fullSettings[1];
        $height = wp_is_mobile() ? $imgItem->mediumSettings[2] : $imgItem->fullSettings[2];
        return "<picture>
                  <source media='(max-width: 768px)' srcset='{$imgItem->mediumSettings[0]}'>
                  <source media='(max-width: 1200px)' srcset='{$imgItem->largeSettings[0]}'>
                  <img src='{$imgItem->fullSettings[0]}' alt='{$imgItem->alt}' title='{$imgItem->title}' width='{$width}' height='{$height}' />
                </picture>";
    }
    public function headingSection(string $key):string {
        return "<div class='section_title'>
                   <div class='container'>
                        <div class='section_title_text'>
                            {$this->getTranslate($key)}
                        </div>
                    </div>
                </div>";
    }
}