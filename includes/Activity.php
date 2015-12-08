<?php

class Activity extends Table {

    protected $table_name = 'abstract';

    function __construct($table_name) {
        parent::__construct();
        $this->table_name = $table_name;
    }

    public static function BMActivity($conditions = array()) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,bmp.Zone,bmp.Region,bmp.Territory,bmp.TM_Name,bmp.BM_Name FROM BM_Activity ba INNER JOIN bip_manpower bmp ON bmp.smswayid = ba.smswayid  ";
        if (!empty($conditions)) {
            $sql .= join(" ", $conditions);
        }
        //echo $sql;
        return Query::executeQuery($sql);
    }

    public static function TMActivity($conditions = array()) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,bmp.Zone,bmp.Region,bmp.Territory,bmp.TM_Name,bmp.BM_Name FROM TM_Activity ta INNER JOIN bip_manpower bmp ON bmp.smswayid = ta.smswayid  ";
        if (!empty($conditions)) {
            $sql .= join(" ", $conditions);
        }
        return Query::executeQuery($sql);
    }

}
