<?php
class sm extends Table {

    protected $table_name = "bip_manpower";

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

}
