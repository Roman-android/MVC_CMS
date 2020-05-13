<?php


namespace views\main\widgets;


class Categories
{
    private $categories;

    public function getCategories(){
        $this->categories = '<p>Раздел "Категории"</p>';
        return $this->categories;
    }
}