<?php


namespace models;


use core\Model;

class MainModel extends Model
{
    public function getNews()
    {
        $result = $this->db->row("SELECT title,description FROM news");
        return $result;
    }

    public function getMenu(){
        $menu = $this->db->row("SELECT item FROM menu");
        return $menu;
    }

}