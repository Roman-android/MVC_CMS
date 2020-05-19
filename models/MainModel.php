<?php


namespace models;

use core\Config;
use core\Model;

class MainModel extends Model
{
    
    private $page;

    public function __construct($page){
        parent::__construct();
        $this->page = $page;
    }
    
    public function requestLayouts(){
        /*$layouts = [
            'header' => '$this->db->row("SELECT * FROM header")',
            'menu' => '$this->db->row("SELECT * FROM menu")',
            'footer' => '$this->db->row("SELECT * FROM menu")',
            ];
            
        return $layouts;*/


        $layout_part = array();
        foreach(Config::get_tags('layouts') as $key=>$value){
            $layout_part[$key] = $this->db->row("SELECT * FROM $value");
        }
        return $layout_part;



        /*$test = 'header';
        $test1 = 'footer';
        $header = $this->db->row("SELECT * FROM $test");
        $menu = $this->db->row("SELECT * FROM menu");
        $footer = $this->db->row("SELECT * FROM $test1");
        return [$header,$menu,$footer];*/

    }

    public function requestNews()
    {
        $result = $this->db->row("SELECT title,description FROM news");
        return $result;
    }

    public function requestPage(){

    }


}