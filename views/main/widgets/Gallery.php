<?php


namespace views\main\widgets;


class Gallery
{
    private $gallery;

    public function getGallery(){
        $this->gallery ='<p>Раздел "Галлерея"</p>';
        return $this->gallery;
    }
}