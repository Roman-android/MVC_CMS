<?php


namespace models;


use core\Model;

class MainModel extends Model
{
    public function requestNews()
    {
        $result = $this->db->row("SELECT title,description FROM news");
        return $result;
    }

    public function requestMenu(){
        $menu = $this->db->row("SELECT item FROM menu");
        return $menu;
    }

    public function test(){
        $res = '456';
        return $res;
    }

}