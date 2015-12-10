<?php

class man_power extends Table {

    protected $table_name = "bip_manpower";

    public static function authenticate($id = "", $password = "") {
        global $database;
        $id = $database->escape_value($id);
        $password = $database->escape_value($password);
        if ($id != '' && $password != '') {
            $sql = "SELECT * FROM bip_manpower ";
            $sql .= "WHERE BM_Emp_Id = '{$id}' ";
            $sql .= " AND  BM_Password = '{$password}' ";
            $sql .= " AND  status='Active'  ";

            $sql .= " LIMIT 1";
            //echo $sql;
            $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }

    public static function sm_authenticate($id = "", $password = "") {
        global $database;
        $id = $database->escape_value($id);
        $password = $database->escape_value($password);
        if ($id != '' && $password != '') {
            $sql = "SELECT * FROM bip_manpower ";
            $sql .= "WHERE SM_Emp_Id = '{$id}' ";
            $sql .= " AND  SM_Password = '{$password}' ";
            $sql .= " LIMIT 1";
            $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }

    public static function tm_authenticate($id = "", $password = "") {
        global $database;
        $id = $database->escape_value($id);
        $password = $database->escape_value($password);
        if ($id != '' && $password != '') {
            $sql = "SELECT * FROM bip_manpower ";
            $sql .= "WHERE TM_Emp_Id = '{$id}' ";
            $sql .= " AND  TM_Password = '{$password}' ";
            $sql .= " LIMIT 1";
            $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }

    public static function bmViewStatus($conditions = array()) {
        $sql = "SELECT SUM(regular_clinic) as regular_clinic,SUM(regular_activation) AS regular_activation , SUM(Rotahaler) AS Rotahaler,rm.`BM_Emp_Id`,rm.`SM_Emp_Id`,rm.`BM_Name`,rm.`Zone`,rm.`Territory`,rm.Region FROM breathfree_manpower rm INNER JOIN breathfree_activity act ON rm.smswayid = act.smswayid ";
        if (!empty($conditions)) {
            $sql .= join(" ", $conditions);
        }
        //echo $sql;
        return Query::executeQuery($sql);
    }

    public static function bmViewStatus2($conditions = array()) {
        $sql = "SELECT SUM(regular_clinic) as regular_clinic,SUM(regular_activation) AS regular_activation , SUM(Rotahaler) AS Rotahaler,rm.`BM_Emp_Id`,rm.`SM_Emp_Id`,rm.`BM_Name`,rm.`Zone`,rm.`Territory`,rm.Region FROM breathfree_manpower rm LEFT JOIN breathfree_activity act ON rm.smswayid = act.smswayid ";
        if (!empty($conditions)) {
            $sql .= join(" ", $conditions);
        }
        // echo $sql;
        return Query::executeQuery($sql);
    }

    public static function Activity_list($conditions) {
        $sql = "SELECT * FROM breathfree_manpower rm
                INNER JOIN breathfree_activity ra
                ON rm.`smsWayID`=ra.`smsWayid`
                WHERE ra.`BM_Emp_Id`=$conditions ";

        return Query::executeQuery($sql);
    }

    public static function adminLogin($id = "", $password = "") {
        global $database;
        $id = $database->escape_value($id);
        $password = $database->escape_value($password);
        if ($id != '' && $password != '') {
            $sql = "SELECT * FROM bip_admin ";
            $sql .= "WHERE username = '{$id}' ";
            $sql .= " AND  password = '{$password}' ";
            $sql .= " LIMIT 1";
            //echo $sql;
            $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }

    public static function SMList() {
        $sql = "SELECT DISTINCT(`SM_Emp_Id`) As SM_Emp_Id,`SM_Name` , `SM_Mobile` FROM `breathfree_manpower`";
        return Query::executeQuery($sql);
    }

    public static function SMDropdowm($smid = 0) {
        $output = '<option>Select SM</option>';
        $smlist = self::SMList();
        if (!empty($smlist)) {
            foreach ($smlist as $sm) {
                if ($sm->SM_Emp_Id == $smid) {
                    $output.= "<option value = " . $sm->SM_Emp_Id . " selected >" . $sm->SM_Name . "</option>";
                } else {
                    $output.= "<option value = " . $sm->SM_Emp_Id . " >" . $sm->SM_Name . "</option>";
                }
            }
        }

        return $output;
    }

    public static function BMlist2($condition) {
        $sql = "SELECT * FROM `breathfree_manpower` WHERE smswayid " . $condition;
        return Query::executeQuery($sql);
    }

    

}
