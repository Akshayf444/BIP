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

    public static function BM_Doctor_view($id) {
        $sql = "SELECT * FROM tm_doctor td
INNER JOIN bip_manpower bmp
ON bmp.`smsWayID`=td.`smsWayID`
WHERE bmp.`BM_Emp_Id`=$id";
        return Query::executeQuery($sql);
    }

    public static function BM_Doctor_list($id) {
        $sql = "SELECT COUNT(td.`id`)AS doctor_count ,bmp.`TM_Name`,bmp.TM_Emp_Id FROM bip_manpower bmp
LEFT JOIN tm_doctor td 
ON bmp.`smsWayID`=td.`smsWayID`
WHERE bmp.`BM_Emp_Id`=$id
GROUP BY bmp.`TM_Emp_Id`";
        return Query::executeQuery($sql);
    }

    public static function TM_Doctor($id) {
        $sql = "select * from tm_doctor where TM_Emp_Id = $id";
        return Query::executeQuery($sql);
    }

}
