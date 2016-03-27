<?php
require_once __DIR__  . '/../classes/main.class.php';
require_once __DIR__  . '/../classes/safemysql.class.php';


$opt = new Machines;
$db = new SafeMySQL;

if($_REQUEST['firmware'] != "" && $_REQUEST['freq'] != ""){
    $firmware = $_REQUEST[firmware];
    $freq = $_REQUEST[freq];
    $machine_id = $_REQUEST[machinesid];



$opt->updateoption($firmware, $freq, $machine_id);

    $sq = $opt->getserial($machine_id);
    $data = $db->fetch($sq);
    $serial = $data['serial'];

$opt->inserthistory($machine_id, $serial, $firmware, $freq);

    header("location: /index.php");



}

else{

    header("location: /index.php");}


