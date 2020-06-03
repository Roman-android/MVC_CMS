<?php

namespace views\main\widgets;

class Products
{
    private $categories;

    public function getProducts($res){
        $this->categories .= '<p>Раздел "Категории"</p>';

        foreach ($res as $val){
            $this->categories .= "Фото товара: ".$val["img_product"]."<br/>";
        }
        return $this->categories;
    }
}