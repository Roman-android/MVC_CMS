<?php


namespace models;

use core\Config;
use core\Model;

class MainModel extends Model
{

    public function request_layouts()
    {

        $layouts = array();
        $layouts["header"] = $this->db->row("SELECT * FROM header");
        $layouts["menu"] = $this->db->row("SELECT * FROM menu");
        $layouts["footer"] = $this->db->row("SELECT * FROM menu");
        return $layouts;

    }

    public function request_pages()
    {

        $page = Config::current_page();

        $res = array();

        $res[GALLERY] = $this->db->row("SELECT image_big, image_small,img_title FROM gallery");
        $res[MAPS] = $this->db->row("SELECT axis_x,axis_y FROM maps");
        $res[PRODUCTS] = $this->db->row("SELECT img_product,title,description FROM products");

        return $res;
    }


}