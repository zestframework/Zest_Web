<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Config\Database;

class Announcement extends Model
{   
    /* 
    * Store database name
    */
    protected $db_name = Database::DB_NAME;
    /* 
    * Store database table name
    */
    protected $db_tbl = 'announcement';
    
    public function __construct()
    {
        $this->createTable();
    }
    public function createTable()
    {
        $db = new Model();
        $db->db()->createTbl($this->db_name,"
            CREATE TABLE IF NOT EXISTS `announcement` (
                      `id` int(255) NOT NULL,
                      `title` varchar(255) NOT NULL,
                      `type` varchar(255) NOT NULL,
                      `detail` varchar(255) NOT NULL,
                      `created` int(255) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $db->db()->close();

        return true;
    }
    public function add($title,$type,$detail)
    {   
        $db = new Model;
        $result = $db->db()->insert(['table'=>$this->db_tbl,'db_name'=>$this->db_name,'columns' => [
            'id' => 1,
            'title' => $title,
            'type' => $type,
            'detail' => $detail,
            'created' => time(),
        ]]);

        $db->db()->close();
        return $result;
    }
    public function get()
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl]);
        $db->db()->close();
        return $result;     
    }
    public function update($title,$type,$detail)
    {
        $db = new Model;
        $update = $db->db()->update(['db_name'=>$this->db_name,'table'=>$this->db_tbl,
        'columns' => [
            'title' => $title,
            'type' => $type,
            'detail' => $detail,
            'created' => time(),
        ] ,'wheres'=>['id = '. 1]]);
        $db->db()->close();
        return $update;     
    }
}
