<?php


namespace models;

use core\Model;

class MainModel extends Model
{

    public function requestMenu(){
        $menu = $this->db->row("SELECT item FROM menu");
        return $menu;
    }

}