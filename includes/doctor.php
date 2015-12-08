<?php

class doctor extends Table {

    protected $table_name = "abstract";

    function __construct($table_name) {
        parent::__construct();
        $this->table_name = $table_name;
    }

    public static function BM_Doctor($id) {
        $sql = "select * from bm_doctor where BM_Emp_Id=$id";
        return Query::executeQuery($sql);
    }

    public static function TM_Doctor($id) {
        $sql = "select * from tm_doctor where TM_Emp_Id=$id";
        return Query::executeQuery($sql);
    }

}
