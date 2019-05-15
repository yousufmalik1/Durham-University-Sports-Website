<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */

header("Content-Type: application/json;charset=utf-8");
require('database.php');
require_once("./functions.php");
$pdo = make_database_connection();

//Form2
$bookingTitle=$_POST["bookingtitle"];
$facilityName=$_POST["facilityName"];
$bookingDate=$_POST["date"];
$startTime=$_POST["timefrom"];
$endTime=$_POST["timeto"];
$people=$_POST["people"];
$notes=$_POST["notes"];
$eventName=$_POST["eventName"];
$username=$_SESSION['User']['username'];

//facilityID
$sql1 = "select * from facility where facilityName = '$facilityName'";
$result1 = $pdo->query($sql1);
$row1 = $result1->fetch(PDO::FETCH_ASSOC);
$facilityID = $row1['facilityID'];

//userID
$sql2 = "select * from user where username = '$username'";
$result2 = $pdo->query($sql2);
$row2 = $result2->fetch(PDO::FETCH_ASSOC);
$userID = $row2['userID'];
$email = $row2['email']

//eventID
$sql3 = "select eventID from event where eventName = '$eventName'";
$result3 = $pdo->query($sql3);
$row3 = $result3->fetch(PDO::FETCH_ASSOC);
$eventID = $row3['eventID'];

//Insert booking
$sql4 = "INSERT INTO `booking`(`userID`, `facilityID`, `eventID`, `bookingDate`, `startTime`, `endTime`, `people`, `bookingTitle`, `notes`) VALUES ('$userID','$facilityID','$eventID','$bookingDate','$startTime','$endTime','$people','$bookingTitle','$notes')";
$result4 = $pdo->query($sql4);
if($pdo->lastInsertId()!=null){
    return true;
}else{
    return false;
}
$pdo = null;

//Send email
$flag = sendMail($email,'Booking Confirmation for DUS-Team 1','Dear, Your booking has been confirmed.');
if($flag){
    echo "<script>window.location.href='../html/pages-confirm-mail.html';</script>";
}else{
    echo "Send email failure！";
}

?>