<?php
define("THEME_ROOT", dirname(__DIR__));
define("URL", $_SERVER["REQUEST_URI"]);
const HTML_ATTRS = ["RU" => "ru", "UA" => "uk"];
const LANG = "RU";
define("TEMPLATE_DIR_URI", get_template_directory_uri());
define("SITE_URL", get_site_url());
const SUCCESS_STATUS = 'ok';
const ERROR_STATUS = 'error';
const DEFAULT_SOCIAL_IMG = '/wp-content/themes/crypto/components/header/img/logo-1.png';