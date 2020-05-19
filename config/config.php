<?php
//===============================================
/*Настройки для открытой (общей) части сайта*/
//===============================================

//$default_file = 'views/main/public/default_layout.php';
//$template_path = 'views\main\layouts\\' . ucfirst($value);
$default_page = 'views/main/public/default.php';

$templates_root = [
    'layouts'=>'\views\main\layouts\\',
    'widgets'=>'\views\main\widgets\\',
];

$layouts_tags = ['header', 'menu', 'footer'];
$widgets_tags =[
    'main' => ['gallery', 'maps'],
    'catalog' => ['categories'],
    'contacts' => ['map'],
    ];

define('default_page',$default_page);
define('templates_root',$templates_root);
define('layouts_tags',$layouts_tags);
define('widgets_tags',$widgets_tags);
