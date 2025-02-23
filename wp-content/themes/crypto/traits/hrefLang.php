<?php
trait hrefLang {
    public function hreflang($arr) {
        $str = "";
        foreach ($arr as $key => $value) {
            $str .= "<link hreflang='{$key}' rel='alternate' href='{$value}'>";
        }
        return $str;
    }

}