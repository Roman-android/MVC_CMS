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

}