<?php
session_start();
require 'database.php';
$pdo = make_database_connection();


$del_id = $_GET['del_id'];

$delete = $pdo->prepare("DELETE FROM facility where facilityID='$del_id'");
$delete->execute();
header("location:adminFacilityManagement.php");
echo "Facility was deleted successfully";

?>
