<?php
session_start();
require 'database.php';
$pdo = make_database_connection();

$del_id = $_GET['del_id'];

$delete = $pdo->prepare("DELETE FROM booking where bookingID='$del_id'");
$delete->execute();
header("location:adminBookingManagement.php");
echo "Facility was deleted successfully";

?>
