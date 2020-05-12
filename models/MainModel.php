<?php


namespace models;

use core\Model;

class MainModel extends Model
{

    public function requestLayouts(){
        $header = $this->db->row("SELECT * FROM header");
        $menu = $this->db->row("SELECT * FROM menu");
        $footer = $this->db->row("SELECT * FROM menu");
        return [$header,$menu,$footer];
    }

    public function requestNews()
    {
        $result = $this->db->row("SELECT title,description FROM news");
        return $result;
    }

    public function requestPage(){

    }


}