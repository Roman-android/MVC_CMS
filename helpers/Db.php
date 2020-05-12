<?php


namespace helpers;
use PDO;

class Db
{
    protected $db;
    public function __construct()
    {
        $config_bd = require_once 'config/config_bd.php';
        //$this -> db = new PDO('mysql:host='.$config_bd['host'].';dbname='.$config_bd['base'].';charset='.$config_bd['charset'].'', $config_bd['user'], $config_bd['password']);


        /*$dsn = "mysql:host=".$config_bd['host'].";dbname=".$config_bd['base'].";charset=utf8";
        $this->db = new PDO($dsn, $config_bd['user'], $config_bd['password']);
        $this->db->query("SET NAMES 'utf8'");*/

        $dsn = "mysql:host=".$config_bd['host'].";dbname=".$config_bd['base']."";
        $this->db = new PDO($dsn, $config_bd['user'], $config_bd['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$config_bd['charset'].""));

    }

    private function query($sql,$params=[]){

        $stmt = $this -> db ->prepare($sql);
        if (!empty($params)){
            foreach ($params as $key => $val){
                $stmt->bindValue(':'.$key,$val);
            }
        }

        $stmt->execute();

        return $stmt;
    }

    public function row($sql,$params=[]){
        $result = $this->query($sql,$params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql,$params=[]){
        $result = $this->query($sql,$params);
        return $result->fetchColumn();
    }



}