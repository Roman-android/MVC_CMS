<?php


namespace models;

use core\Model;

class MainModel extends Model
{

    public function requestLayouts(){
        $header = $this->db->row("SELECT addres,telephone FROM header");
        $menu = $this->db->row("SELECT item FROM menu");
        $footer = $this->db->row("SELECT item FROM menu");
        return [$header,$menu,$footer];
    }

    public function requestNews()
    {
        $result = $this->db->row("SELECT title,description FROM news");
        return $result;
    }



}