<?php

//load.php


$data = array();

//$pdo = new PDO('mysql:host=mysql.dur.ac.uk;dbname=Iqjhq34_mock-facilities', 'qjhq34', 'memory84');
$pdo = new PDO('mysql:host=localhost;dbname=xdurhamsports', 'root', '');
$statement = $pdo->query("SELECT booking.bookingID, booking.bookingTitle, booking.start, booking.end, facility.facilityName
FROM booking
INNER JOIN facility ON booking.facilityID = facility.facilityID");

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["bookingID"],
  'title'   => $row["facilityName"].": ".$row["bookingTitle"],
  'start'   => $row["start"],
  'end'   => $row["end"],
  'facility' => $row["facilityName"]
 );
}

echo json_encode($data);

?>
