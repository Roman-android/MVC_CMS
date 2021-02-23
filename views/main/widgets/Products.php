<?php

namespace views\main\widgets;

class Products
{
    private $categories;

    public function getProducts($res){
        $this->categories .= '<p>Раздел "Категории"</p>';

        foreach ($res as $val){
            $this->categories .= "<p class='test'>Фото товара: ".$val["img_product"]."</p>";
            $this->categories .= "<p class='test1'>Название товара: ".$val["title"]."</p>";
            $this->categories .= "<p class='test2'>Описание товара: ".$val["description"]."</p>\n";
            $this->categories .= "<hr/>";
        }
        return $this->categories;
    }
}