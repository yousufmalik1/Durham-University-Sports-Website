<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */

header("Content-Type: application/json;charset=utf-8");
require('database.php');
$pdo = make_database_connection();
/*try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=xdurhamsports', 'root', '');
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}*/

if (!isset($_POST["facilityName"]) || empty($_POST["facilityName"])
|| !isset($_POST["date"]) || empty($_POST["date"])) {
    echo '{"success":false,"msg":"para is empty"}';
    return;
}

$facilityName=$_POST["facilityName"];
$bookingDate=$_POST["date"];

//TODO
$sql1 = "select * from facility where facilityName = '$facilityName'";
$result1 = $pdo->query($sql1);
$row1 = $result1->fetch(PDO::FETCH_ASSOC);

$FOT=$row1['timeOpen'];
$FCT=$row1['timeClose'];
$FID=$row1['facilityID'];
$FC=$row1['capacity'];

for($i=$FOT; $i<$FCT;$i++){
    $sql2 = "select * from booking where facilityID = '$FID' AND bookingDate = '$bookingDate' AND startTime <= $FOT AND endTime >= $FOT ";
    $result2 = $pdo->query($sql2);
    $row2 = $result2->fetch(PDO::FETCH_ASSOC);
    $sum=0;
    for($x=0; $x<$row2; $x++){
        $sum=$sum+$row2['people'];
    }
    if($sum<$FC){
        $spaceLeft = $FC-$sum;
        echo '{"success":true,"msg":"From '.$FOT.' to '.$FOT+1.' '.$spaceLeft.' space left."}';
    }else{
        echo '{"success":false,"msg":"From '.$FOT.' to '.$FOT+1.' '.$spaceLeft.' space not avaliable!"}';
    }
}
$pdo = null;
?>