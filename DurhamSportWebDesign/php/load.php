<?php

//load.php


$data = array();

//$pdo = new PDO('mysql:host=mysql.dur.ac.uk;dbname=Iqjhq34_mock-facilities', 'qjhq34', 'memory84');
$pdo = new PDO('mysql:host=localhost;dbname=xdurhamsports', 'root', '');
$statement = $pdo->query("SELECT booking.bookingID, booking.eventID, booking.bookingTitle, booking.bookingDate booking.startTime, booking.endTime, facility.facilityName
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
  'title'   => $row["facilityName"].": ".$row["bookingTitle"],
  'start'   => $row["bookingDate"]." ".$row["startTime"],
  'end'   => $row["bookingDate"]." ".$row["endTime"],
  'facility' => $row["facilityName"]
 );
}

echo json_encode($data);

?>
