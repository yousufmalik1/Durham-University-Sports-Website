<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */
session_start();
header("Content-Type: application/json;charset=utf-8");
require('database.php');
$pdo = make_database_connection();

$eventName = $_POST['eventName'];
$facilityId = $_POST['facilityId'];
$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];
$timefrom = $_POST['timefrom'];
$timeto = $_POST['timeto'];
$dow = $_POST['dow'];

$sql = "INSERT INTO `block_booking`(`eventName`, `facilityID`,`dateFrom`, `dateTo`, `timeFrom`, `timeTo`, `dow`) VALUES ('$eventName','$facilityId','$datefrom','$dateto','$timefrom','$timeto','$dow')";
$result = $pdo->query($sql);
if($pdo->lastInsertId()!=null){
    echo "true";
}else{
    echo "false";
}

$pdo = null;
?>