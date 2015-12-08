<?php

class Launch extends Table {

    protected $table_name = "abstract";
    
    function __construct($table_name){
        parent::__construct();
        $this->table_name = $table_name;
    }

}
