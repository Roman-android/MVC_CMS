<?php


namespace core;

use helpers\Db;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

}