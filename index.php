<?php
require_once __DIR__  . '/classes/main.class.php';



$db = new SafeMySQL;

$machines = Machines::getMachines();

$options_q = Machines::getmachineserial();


while ($cdrow=mysqli_fetch_array($options_q)) {



    $options .= '<option value="'.$cdrow['id'].'">'. $cdrow['serial'].'</option>';
}

$content_page .= "
<table size = 10px border = 1>
    <thead>
    <tr>
        <th>SERIAL</th>
        <th>FIRMWARE</th>
        <th>CONNECT FREQ</th>
    </tr>
    </thead>
    ";
$content_page .= "
    <tbody>
    ";
while($myrow = $db->fetch($machines))
    $content_page .= "
    <tr>
        <td>{$myrow['serial']}</td>
        <td>{$myrow['firmware']}</td>
        <td>{$myrow['connect_freq']}</td>
    </tr>
    ";
$content_page .= "
    </tbody>
</table>

";


$content_page .=  "
<form action=includes/act.php method=post><br>
    serial: <select type=text  name=machinesid>{$options}</select><br><br>
    firmware: <input type=text name=firmware><br><br>
    freq: <input type=text name=freq><br><br>
    <input type=submit>
</form>

";

echo $content_page;




