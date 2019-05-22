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
 $color = '#47e5f7';
    
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

$statement = $pdo->query("SELECT block_booking.eventID, block_booking.eventName, block_booking.dateFrom, block_booking.dateTo, block_booking.timeFrom, block_booking.timeTo, block_booking.dow, facility.facilityName
FROM block_booking
INNER JOIN facility ON block_booking.facilityID = facility.facilityID");
 
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$color = '#47e5f7';

foreach($result as $row)
{
    
    if ($row["eventName"] == "Exams"){
         $color = '#f46b6b';

     }

    //If its a examination
    if ($row["eventName"] == "Exercise Class"){
         $color = '#63f9b1';
     }

    if ($row["eventName"] == "Non-Exercise Class"){
        $color = '#f5ff72';
    }

    //Get the dow
    $dow = $row["dow"];
    $dow_array = array_map('intval', str_split($dow));
    
    $begin_str = $row["dateFrom"]." ". $row["timeFrom"];
    $end_str = $row["dateTo"]." ". $row["timeTo"];
    
    $begin_date = new DateTime($begin_str);
    $end_date = new DateTime($end_str);
    
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin_date, $interval, $end_date);
    
    foreach ($period as $dt) {
        
        $check_date = $dt->format("Y-m-d");
        $day_num = $dt->format("N");
        

        if (in_array($day_num, $dow_array)){
            $data[] = array(
              'id'   => $row["eventID"],
              'color' => $color,
              'title'   => $row["eventName"],
              'start'   => $check_date. " ".$row["timeFrom"],
              'end'   => $check_date. " ".$row["timeTo"],
              'facility' => $row["facilityName"]
            );
        }
    }
    
        /*
     $data[] = array(
      'id'   => $row["eventID"],
      'color' => $color,
      'title'   => $row["eventName"],
      'start'   => $row["dateFrom"]." ".$row["timeFrom"],
      'end'   => $row["dateTo"]." ".$row["timeTo"],
      'facility' => $row["facilityName"]
      
     );
     
     */
}


echo json_encode($data);


?>
