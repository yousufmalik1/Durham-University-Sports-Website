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

$facilityId = $_POST['facilityId'];
$date = $_POST['date'];

$sql = "select * from booking where facilityID = '$facilityId' AND bookingDate = '$date'";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

$sql1 = "select * from facility where facilityID = '$facilityId'";
$result1 = $pdo->query($sql1);
$rows1 = $result1->fetch(PDO::FETCH_ASSOC);

$openTime = $rows1['timeOpen'];
$closeTime = $rows1['timeClose'];
$capacity = $rows1['capacity'];

$duration = array();  

foreach($rows as $row){
    $time = $row['startTime'];
    if(array_key_exists($time, $duration)){
        $duration[$time] ++;
    }else{
        $duration[$time] =1;
    }
}

$openTimeNum = explode(":",$openTime)[0];
$closeTimeNum = explode(":",$closeTime)[0];

echo "<label for='select'>Time</label>
    <select class='form-control' id='time'>";

for($i=$openTimeNum;$i<$closeTimeNum;$i++){
    $str = $i.":00:00";
    if(!array_key_exists($str, $duration) || $duration[$str]<$capacity){
        $j = $i+1;
        echo "<option value= '$i'>$i:00-$j:00</option>";
     }
}

echo "</select>";

?>