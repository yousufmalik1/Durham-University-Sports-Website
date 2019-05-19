<?php
session_start();
require 'database.php';
/*/if($_SESSION['username'] !== 'Admin')
{
header("location:index.php");
}*/

try{
    $pdo = new PDO('mysql:host=localhost;dbname=xdurhamsports', 'root', '');
    
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connected successfully";
}   
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

$del_id = $_GET['del_id'];

$delete = $pdo->prepare("DELETE FROM facility where facilityID='$del_id'");
$delete->execute();
header("location:adminFacilityManagement.php");
echo "Facility was deleted successfully";

?>