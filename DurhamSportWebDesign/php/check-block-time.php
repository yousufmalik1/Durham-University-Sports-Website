<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */
header("Content-Type:text/html;charset=utf-8");
require('database.php');

$sql = "select * from booking";
$result = $pdo->query($sql);
$rows = $result->fetch(PDO::FETCH_ASSOC);

$sql1 = "select * from block_booking";
$result1 = $pdo->query($sql1);
$rows1 = $result1->fetch(PDO::FETCH_ASSOC);

$bookingDate = $rows['bookingDate'];
$startTime = $rows['startTime'];
$endTime = $rows['endTime'];

$dateFrom = $rows1['dateFrom'];
$dateTo = $rows1['dateTo'];
$timeFrom = $rows1['timeFrom'];
$timeTo = $rows1['timeTo'];

if($bookingDate>$dateFrom||$bookingDate<$dateTo
    ||$startTime>=$timeFrom||$endTime<=$timeTo){
        echo "This time has been blocked!";
}
?>