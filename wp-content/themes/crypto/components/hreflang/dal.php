<?php
global $post;
global $builder;
$hrefLang = (array)carbon_get_post_meta($post->ID, FIELDS_KEY['LANG_TRANSLATE']);
$siteLang = carbon_get_theme_option( OPTIONS_KEYS['LANG'] );
if(count($hrefLang)) {
    $x_default = '';
    if(HTML_ATTRS[LANG] === DEFAULT_LANG) {
        $x_default = $_SERVER['REQUEST_URI'] === '/'
        ? 'https://'.$_SERVER['HTTP_HOST']
        : 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
    else {
        foreach($hrefLang as $item) {
            if($item['hreflang'] === DEFAULT_LANG) $x_default = $item['link'];
        }
    };
    if(!empty($x_default)) {
        $arr = [
           HTML_ATTRS[LANG] => $_SERVER['REQUEST_URI'] === '/'
              ? 'https://'.$_SERVER['HTTP_HOST']
              : 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
           "x-default" => $x_default
        ];
        $arrSupport = [];
        foreach($hrefLang as $item) {
            $arrSupport = [
                $item['hreflang'] => $item['link']
            ];
        }
        $result = array_merge($arr, $arrSupport);
        echo $builder->hrefLang($result);
    }
}