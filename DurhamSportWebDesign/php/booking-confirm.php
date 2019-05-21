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
require_once("./functions.php");
$pdo = make_database_connection();

$bookingtitle = $_POST['bookingtitle'];
$facilityId = $_POST['facilityId'];
$bookingDate = $_POST['date'];
$startTime = $_POST['time'].":00:00";
$endTime = ($_POST['time']+1).":00:00";

$username=$_SESSION['username'];

//userID
$sql2 = "select * from user where username = '$username'";
$result2 = $pdo->query($sql2);
$row2 = $result2->fetch(PDO::FETCH_ASSOC);
$userID = $row2['userID'];
$email = $row2['email'];
//Insert booking
$sql4 = "INSERT INTO `booking`(`userID`, `facilityID`, `bookingDate`, `startTime`, `endTime`, `bookingTitle`) VALUES ('$userID','$facilityId','$bookingDate','$startTime','$endTime','$bookingtitle')";
$result4 = $pdo->query($sql4);
if($pdo->lastInsertId()!=null){
    echo "true";
}else{
    echo "false";
}

$sql5="select * from facility where facilityID = '$facilityId'";
$result5 = $pdo->query($sql5);
$rows5 = $result5->fetch(PDO::FETCH_ASSOC);
$price = $rows5['price'];
$pricestu = $rows5['priceStu'];

$pdo = null;
//Send email
sendMail($email,'Booking Confirmation for DUS-Team 1',"Dear, Your booking has been confirmed.The price is $price If you are student,the price is $pricestu. Plesase take you student card to the DUS reception and pay the money!");

?>