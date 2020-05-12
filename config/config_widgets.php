<?php

function getWidgets($page){
    $array_pages=[
        'main' =>['gallery','maps'],
        'catalog'=>['categories'],
        'contacts'=>['map'],
    ];

    return $array_pages[$page];
}
