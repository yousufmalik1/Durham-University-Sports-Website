<?php
/**
 * Created by PhpStorm.
 * User: zhangluwen
 * Date: 2019-05-13
 * Time: 14:49
 */

session_start();
require_once('database.php');//链接数据库
if(isset($_SESSION['User']) && $_SESSION['User'] != null){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BookingList</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>
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
            background: #dcd4ff;
        }
        td a {
            color: #06f;
            text-decoration: none;
        }
        td a:hover {
            color: #06f;
            text-decoration: underline;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #9b2daf;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px #999;
        }

        .button:hover {background-color: #ce70ff
        }

        .button:active {
            background-color: #9b2daf;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
    <script>
        function doDel(bookingID) {
            if (confirm("Are you sure you want to cancel?")) {
                window.location = 'cancel.php?action=del&bookingID='+bookingID;
            }
        }
    </script>
</head>
<body>
<header>
    <div class="logo">
        <a href="https://www.teamdurham.com/"><img src="../images/teamdurham.png" height="77" width="78" /></a>
    </div><!-- end logo -->
    <div id="menu_icon"></div>
    <nav>
        <ul>
            <?php  if($_SESSION ['User']['role'] == '0'){
                echo" <li><a href='user.php'>Personal Profile</a></li>";
                echo"  <li><a href='BookingList.php'>Booking List</a></li>";
            }else{
                echo"  <li><a href='adminBookingManagement.php'>Admin Dashboard</a></li>";
                echo"     <li><a href='user.php'>Personal Profile</a></li>";
                echo"  <li><a href='adminFacilityManagement.php'>Facility Management</a></li>";
                echo"   <li><a href='adminEditFacility.php'>Facility Edit</a></li>";
                echo"   <li><a href='adminBookingManagement.php'>Booking Management</a></li>";
                echo"  <li><a href='pages-booking.php'>Add Booking</a></li>";
                echo"  <li><a href='block_booking.php'>Block Booking</a></li>";
            }?>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
    <div id="loginsection">


        <p class="logincs"><button class="logoutbtn"><a href="index.php?operate=logout">logout</a></button></p>
        <?php }else{
            header('location:index.php');} ?>
    </div>
    <section class="top">
        <div class="wrapper content_header clearfix">
            <div class="duslogan">
                <p>DURHAM UNIVERSITY SPORT</p>
            </div>
            <div class="logoDU">
                <a href="https://www.teamdurham.com"><img src="../images/dulogowhite.png"  /></a>
            </div>
            <p class="title">
                <a href="userhome.php">Facilities</a> |||| <a href="calendar.php">Calendar</a> |||| <a href="contactpage.php">Contact us</a> |||| <a href="howtouse.php">How to use</a></p>
        </div>
    </section><!-- end top -->


    <!-- ----------------------Start your content from here-------------------------------------------------- -->

    <section class="wrapper">
        <div class="content">

            <p class="title">Welcome, user <?php echo $_SESSION['User']['username']; ?> </p>
            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="userhome.php">
                    <button type="button">
                        <input type="text" name="searchname" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <center><h1> Booking List </h1></center>

            <form name='form' class="form" action='' method='post'>

            <table>
                <tr>
                    <th>Booking ID</th>
                    <th>Facility ID</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Booking Title</th>
                    <th>Cancel</th>
                </tr>

                <?php

                    $pdo = make_database_connection();
                    $userID=$_SESSION['User']['userID'];
                    $sql = "select * from booking WHERE userID= '$userID'";
                    foreach ($pdo->query($sql) as $row) {
                        echo "<tr>";
                        echo "<td>{$row['bookingID']}</td>";
                        $ID= $row['bookingID'];
                        echo "<td>{$row['facilityID']}</td>";
                        echo "<td>{$row['startTime']}</td>";
                        echo "<td>{$row['endTime']}</td>";
                        echo "<td>{$row['bookingTitle']}</td>";
                        echo "<td><input type='submit' id='Cancel' class='login-button' value='Cancel' name='submit' >
                        </td>";
                        echo "</tr>";
                    }

                function del($ID){
                    $pdo = make_database_connection();
                    $sql = "DELETE FROM booking WHERE bookingID='$ID'";
                    $sql1 = "SELECT bookingID FROM booking WHERE bookingID='$ID'";
                    $result = $pdo->query($sql);
                    $result1 = $pdo->query($sql1);
                    if ($result1) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if (isset($_POST["submit"]) && $_POST["submit"] == "Cancel") {
                    $ID= $row['bookingID'];
                    $del = del($ID);
                    if ($del) {
                        echo "<script>alert('cancel successfully!');
                        window.location.href='BookingList.php'</script>";
                    }else{
                        echo "<script>alert('cancel failed'); history.go(-1);</script>";
                    } }
                ?>
            </table>
            </form>
            <div align="center" style="position:relative;top:20px">
                <button class="button"><a href="pages-booking.php">Booking Now</button>
            </div>

        </div><!-- end content -->
    </section>



    <!-- ----------------------End your content to here-------------------------------------------------- -->



</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>


</body>
</html>






