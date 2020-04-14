<?php


namespace helpers;
use mysqli;
use PDO;

class Db
{
    protected $db;
    public function __construct()
    {
        $config = require_once 'config/db.php';
        $this -> db = new PDO('mysql:host='.$config['host'].';dbname='.$config['base'].';charset='.$config['charset'].'', $config['user'], $config['password']);


        /*$dsn = "mysql:host=".$config['host'].";dbname=".$config['base'].";charset=utf8";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->db->query("SET NAMES 'utf8'");*/

        $dsn = "mysql:host=".$config['host'].";dbname=".$config['base']."";
        $this->db = new PDO($dsn, $config['user'], $config['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$config['charset'].""));

    }

    public function query($sql,$params=[]){

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