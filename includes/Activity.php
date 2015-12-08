<?php

class Activity extends Table {

    protected $table_name = 'abstract';

    function __construct($table_name) {
        parent::__construct();
        $this->table_name = $table_name;
    }

    public static function BMActivity($id) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id FROM BM_Activity WHERE BM_Emp_ID = {$id} ";
        return Query::executeQuery($sql);
    }

    public static function TMActivity($id) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id FROM TM_Activity WHERE TM_Emp_ID = {$id} ";
        return Query::executeQuery($sql);
    }

}
