<?php

//load.php

session_start();
require 'database.php';
$pdo = make_database_connection();

$data = array();

$statement = $pdo->query("SELECT booking.bookingID, booking.eventID, booking.bookingTitle, booking.bookingDate, booking.startTime, booking.endTime, facility.facilityName
FROM booking
INNER JOIN facility ON booking.facilityID = facility.facilityID");

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $row)
{
 //Default color is blue
 $color = 'blue';
    
 //If its a exercise class
 if ($row["eventID"] == 3000){
     $color = '#42f4e2';
 }
    
//If its a examination
if ($row["eventID"] == 3001){
     $color = '#f46b6b';
 }
 
 $data[] = array(
  'id'   => $row["bookingID"],
  'color' => $color,
  'title'   => $row["bookingTitle"],
  'start'   => $row["bookingDate"]." ".$row["startTime"],
  'end'   => $row["bookingDate"]." ".$row["endTime"],
  'facility' => $row["facilityName"]
 );
}


//Second SQL selection

$statement = $pdo->query("SELECT block_booking.eventID, block_booking.eventName, block_booking.dateFrom, block_booking.dateTo, block_booking.timeFrom, block_booking.timeTo, facility.facilityName
FROM block_booking
INNER JOIN facility ON block_booking.facilityID = facility.facilityID");

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$color = 'blue';

foreach($result as $row)
{
    
if ($row["eventID"] == 3000){
     $color = '#42f4e2';
     //$color = '#42f4e2';
 }
    
//If its a examination
if ($row["eventID"] == 3001){
     $color = '#f46b6b';
 }
 
 $data[] = array(
  'id'   => $row["eventID"],
  'color' => $color,
  'title'   => $row["eventName"],
  'start'   => $row["dateFrom"]." ".$row["timeFrom"],
  'end'   => $row["dateTo"]." ".$row["timeTo"],
  'facility' => $row["facilityName"]
 );
}


echo json_encode($data);


?>
