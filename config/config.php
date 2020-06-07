<?php
//===============================================
/*Настройки для открытой (общей) части сайта*/
//===============================================

define('GALLERY', "gallery");
define('MAPS', "maps");
define('PRODUCTS', "products");
define('MAP', "map");

$part_app = [
    'test.homedver.ru' => 'main',
    'admin.homedver.ru' => 'admin',
];

$default_page = 'views/main/public/default.php';

$templates_root = [
    'layouts' => '\views\main\layouts\\',
    'widgets' => '\views\main\widgets\\',
];

$content_page = [
    'widgets' => 'Widgets',
    'error' => 'Errors',
];

$layouts_tags = ['header', 'menu', 'footer'];


$pages = [
    'main' => ['maps', 'gallery'],
    'catalog' => ['products'],
    'contacts' => ['map'],
];

//====================================

//====================================
define('default_page', $default_page);
define('part_app', $part_app);
define('templates_root', $templates_root);
define('layouts_tags', $layouts_tags);
define('pages', $pages);
define('content_page', $content_page);

