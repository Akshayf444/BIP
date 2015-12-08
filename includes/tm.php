<?php
class tm extends Table {

    protected $table_name = "bip_manpower";

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

}
