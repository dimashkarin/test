<?php
require_once __DIR__  . '/safemysql.class.php';




class Machines {

    public $id;
    public $serial;
    public $firmware;
    public $connect_freq;
    public $db;

    static public function getMachines(){
        $db = new SafeMySQL;
        $query = ("SELECT * FROM machines m JOIN machines_options o ON m.id = o.machine_id");
        return $db->query($query);

    }
    static public function updateoption($firmware, $freq, $machine_id)
    {
        $db = new SafeMySQL;
        $query = ("UPDATE machines_options SET firmware = '$firmware' , connect_freq = '$freq' WHERE machine_id = '$machine_id'");
        return $db->query($query);
    }

    static public function getmachineid($serial)
    {
        $db = new SafeMySQL;
        $query = ("SELECT id FROM machines WHERE serial = '$serial'");
        return $db->query($query);
    }

    static public function getmachineserial($serial)
    {
        $db = new SafeMySQL;
        $query = ("SELECT id, serial FROM machines");
        return $db->query($query);
    }


}





