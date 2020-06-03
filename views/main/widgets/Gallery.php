<?php


namespace views\main\widgets;


class Gallery
{
    private $gallery;

    public function getGallery($res){
        $this->gallery .='<p>Раздел "Галлерея"</p>';
        foreach ($res as $val){
            $this->gallery .= "image_small = ".$val['image_small']."<br/>";
        }
        return $this->gallery;
    }
}