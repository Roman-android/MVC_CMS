<?php

function getLayouts($layout){
    $array_layouts=[
        'layouts'=>['header', 'menu','footer'],
    ];


    return $array_layouts[$layout];
}
