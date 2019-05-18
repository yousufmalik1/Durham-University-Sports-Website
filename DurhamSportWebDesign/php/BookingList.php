
/**
 * Created by PhpStorm.
 * User: zhangluwen
 * Date: 2019-05-13
 * Time: 14:49
 */
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        table {
            width: 90%;
            background: #ccc;
            margin: 10px auto;
            border-collapse: collapse;
        }
        th,td {
            height: 25px;
            line-height: 25px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background: #eee;
            font-weight: normal;
        }
        tr {
            background: #fff;
        }
        tr:hover {
            background: #cc0;
        }
        td a {
            color: #06f;
            text-decoration: none;
        }
        td a:hover {
            color: #06f;
            text-decoration: underline;
        }
    </style>



</head>

<body>
<table>
    <tr>
        <th>Booking ID</th>
        <th>Facility ID</th>
        <th>Event Name</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Booking Title</th>
        <th>Cancel</th>
    </tr>

    <?php
    require_once('databaseLink.php');//链接数据库
    $sql = "SELECT * FROM booking,event WHERE bookingID = '$bookingID' and event.eventID='$eventID'";
    foreach ($pdo->query($sql) as $row) {
        echo "<tr>";
        echo "<td>{$row['bookingID']}</td>";
        echo "<td>{$row['facilityID']}</td>";
        echo "<td>{$row['eventName']}</td>";
        echo "<td>{$row['start']}</td>";
        echo "<td>{$row['end']}</td>";
        echo "<td>{$row['bookingTitle']}</td>";
        echo "<td>
                            <a href='javascript:doDel({$row['bookingID']})'>Cancel</a >
                        
                            </td>";
        echo "</tr>";
    }
    ?>
</table>


</body>


<style>
    .button {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #9b2daf;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button:hover {background-color: #9b2daf
    }

    .button:active {
        background-color: #9b2daf;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
</style>
</head>
<body>


<div align="center" style="position:relative;top:10px">
    <button class="button">Booking Now</button>
</div>



</body>

</html>

<script>
    function doDel(bookingID) {
        if (confirm("Are you sure you want to cancel?")) {
            window.location = 'cancel.php?action=del&bookingID='+bookingID;
        }
    }
    </script>



