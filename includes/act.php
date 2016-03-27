<?php
require_once __DIR__  . '/../classes/main.class.php';

$opt = new Machines;

if($_REQUEST['firmware'] != "" && $_REQUEST['freq'] != ""){
    $firmware = $_REQUEST[firmware];
    $freq = $_REQUEST[freq];
    $machine_id = $_REQUEST[machinesid];

$opt->updateoption($firmware, $freq, $machine_id);
    header("location: /index.php");

}

else{

    header("location: /index.php");}


