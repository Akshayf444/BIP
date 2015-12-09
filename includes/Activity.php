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

    public static function SMActivity($condition1 = array()) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,t_union.Zone,t_union.Region,t_union.Territory,t_union.TM_Name,t_union.BM_Name,t_union.SM_Name,t_union.SM_Emp_Id FROM (
                    SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,bmp.Zone,bmp.Region,bmp.Territory,bmp.TM_Name,bmp.BM_Name,bmp.SM_Name,bmp.SM_Emp_Id 
                        FROM BM_Activity ba INNER JOIN bip_manpower bmp ON bmp.smswayid = ba.smswayid   
                UNION ALL 
                    SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,bmp.Zone,bmp.Region,bmp.Territory,bmp.TM_Name,bmp.BM_Name,bmp.SM_Name,bmp.SM_Emp_Id 
                        FROM TM_Activity ta INNER JOIN bip_manpower bmp ON bmp.smswayid = ta.smswayid   ";

        $sql .= ") As t_union " . join(" ", $condition1);
        
        //echo  $sql;
        return Query::executeQuery($sql);
    }
    public static function TMActivity_Report($condition1) {
        $sql = "SELECT SUM(launch) AS launch,
                SUM(device_check) AS device_check,
                SUM(paramedic) AS paramedic,
                SUM(chemist_meet) AS chemist_meet,
                SUM(visibility) AS visibility,
                SUM(revolizer) AS revolizer,
                SUM(zvt) AS zvt,
                SUM(rotahaler) AS rotahaler,act_id,bim.Zone,bim.Region,bim.Territory,bim.TM_Name,bim.BM_Name FROM TM_Activity tm
                INNER JOIN bip_manpower bim
                ON tm.`smswayid`=bim.`smsWayID`
                WHERE bim.`SM_Emp_Id`=$condition1
                GROUP BY bim.TM_Emp_Id";
        //echo $sql;
        $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
    }
    public static function BMActivity_Report($condition1) {
        $sql = "SELECT SUM(launch) AS launch,
                SUM(device_check) AS device_check,
                SUM(paramedic) AS paramedic,
                SUM(chemist_meet) AS chemist_meet,
                SUM(visibility) AS visibility,
                SUM(revolizer) AS revolizer,
                SUM(zvt) AS zvt,
                SUM(rotahaler) AS rotahaler,act_id,bim.Zone,bim.Region,bim.Territory,bim.TM_Name,bim.BM_Name FROM BM_Activity tm
                INNER JOIN bip_manpower bim
                ON tm.`smswayid`=bim.`smsWayID`
                WHERE bim.`SM_Emp_Id`=$condition1
                GROUP BY bim.BM_Emp_Id";
        $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function TMActivity($conditions = array()) {
        $sql = "SELECT SUM(launch) AS launch,SUM(device_check) AS device_check,SUM(paramedic) AS paramedic,SUM(chemist_meet) AS chemist_meet,SUM(visibility) AS visibility,SUM(revolizer) AS revolizer,SUM(zvt) AS zvt,SUM(rotahaler) AS rotahaler,act_id,bmp.Zone,bmp.Region,bmp.Territory,bmp.TM_Name,bmp.BM_Name FROM TM_Activity ta INNER JOIN bip_manpower bmp ON bmp.smswayid = ta.smswayid  ";
        if (!empty($conditions)) {
            $sql .= join(" ", $conditions);
        }
        return Query::executeQuery($sql);
    }

}
