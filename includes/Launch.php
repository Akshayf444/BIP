<?php

class Launch extends Table {

    protected $table_name = "abstract";

    function __construct($table_name) {
        parent::__construct();
        $this->table_name = $table_name;
    }

    public static function BMActivity($id) {
        $sql = "SELECT * FROM BM_Launch WHERE BM_Emp_ID = {$id} ";
        return Query::executeQuery($sql);
    }

    public static function TMActivity($id) {
        $sql = "SELECT * FROM TM_Launch WHERE TM_Emp_ID = {$id} ";
        return Query::executeQuery($sql);
    }
    
    

}
