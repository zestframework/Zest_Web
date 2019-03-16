<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Zest\Auth\User;

class File extends Model
{   

    protected $db_name;
    protected $db_tbl = 'file';
    
    public function __construct()
    {
        $this->db_name = __config()->database->db_name;
        $this->createTable();
    }
    private function createTable()
    {
        $db = new Model();
        $db->db()->createTbl($this->db_name,"
            CREATE TABLE IF NOT EXISTS `file` (
                      `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                      `objectId` int(255) NOT NULL,
                      `type` varchar(255) NOT NULL,
                      `slug` varchar(255) NOT NULL,
                      `additional` varchar(255) NULL,
                      `created` int(255) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $db->db()->close();

        return true;
    }

    public function add($type, $slug,$objectId ,$additional = null)
    {
        $db = new Model();
        $result = $db->db()->insert(['table'=>$this->db_tbl,'db_name'=>$this->db_name,'columns' => [
            'objectId'   => $objectId,
            'type'       => $type,
            'slug'       => $slug,
            'additional' => json_encode($additional),
            'created'    => time(),
        ]]);
        $db->db()->close();

        return $result;
    }

    public function getByWhere($where,$value)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ["{$where} ="."'{$value}'"],'order_by'=> 'ID DESC']);
        $db->db()->close();

        return $result;
    }
}
