<?php
session_start();
header ("Content-Type:text/html;charset=utf-8");
require ('database.php');
$pdo = make_database_connection();
if(isset($_SESSION['User']) && $_SESSION['User'] != null &&  $_SESSION ['User']['role'] == '1'){


} else{
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adminbooking</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <script type="text/javascript" src="../js/manager.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</head>
<body class="authentication-bg">
<header>
    <div class="logo">
        <a href="https://www.teamdurham.com/"><img src="../images/teamdurham.png" height="77" width="78" /></a>
    </div><!-- end logo -->
    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="adminBookingManagement.php">Admin Dashboard</a></li>
            <li><a href="user.php">Personal Profile</a></li>
            <li><a href="adminFacilityManagement.php">Facility Management</a></li>
            <li><a href="adminEditFacility.php">Facility Edit</a></li>
            <li><a href="adminBookingManagement.php">Booking Management</a></li>
            <li><a href="pages-booking.php">Add Booking</a></li>
            <li><a href="block_booking.php">Block Booking</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->

<section class="main clearfix">
    <div id="loginsection">
        <?php
        if(isset($_SESSION['User']) && $_SESSION['User'] != null){
            echo  "<p class='logincs'><button class='logoutbtn'><a href='index.php?operate=logout'>logout</a></button></p>";
        }
        else{
            echo  "<p class='logincs'><a href='login.php'>Login</a> || <a href='registry.php'>Registry</a></p> ";}?>
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

            <p class="title">Welcome, <?php echo $_SESSION['User']['username']; ?> </p>
            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="userhome.php">
                    <button type="button">
                        <input type="text" name="searchname" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <center><h1> Booking Management </h1></center>
            <br><br>

            <table id="showinfo" border="1">
                <tr bgcolor="#dddddd">
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Facility ID</th>
                    <th>Event ID</th>
                    <th>Booking Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Booking Title</th>

                    <th colspan="2">Action</th>
                </tr>

                <?php
                try{
                    $pdo = make_database_connection();
                    $select = $pdo->prepare("SELECT * FROM booking ");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while ($row = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $row['bookingID'] ."</td>";
                        echo "<td>" . $row['userID'] ."</td>";
                        echo "<td>" . $row['facilityID'] ."</td>";
                        echo "<td>" . $row['eventID'] ."</td>";
                        echo "<td>" . $row['bookingDate'] ."</td>";
                        echo "<td>" . $row['startTime'] ."</td>";
                        echo "<td>" . $row['endTime'] ."</td>";
                        echo "<td>" . $row['bookingTitle'] ."</td>";

                        ?>
                        <td><a href="admineditbooking.php?edit_id=<?php echo $row['bookingID']; ?>">Edit</a></td>
                        <td><a href="admindeletebooking.php?del_id=<?php echo $row['bookingID']; ?>" onclick="return confirm('Are you sure you want to delete the Facility?')">Delete</a></td>

                        <?php echo "</tr>";
                    }?>
            </table>
            <?php
                }
                catch (PDOException $e)
                {
                    echo "error: " . $e->getMessage();
                }
                ?>

            <style type="text/css">
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    margin: 15px;
                    font-size: 15px;
                    cursor: pointer;
                    text-align: center;
                    text-decoration: none;
                    outline: none;
                    color: #fff;
                    background-color: #b22fc6;
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 8px #999;
                }
                .button:hover {background-color: #ce70ff
                }
                .button:active {
                    background-color: #b22fc6;
                    box-shadow: 0 5px #666;
                    transform: translateY(4px);
                }
            </style>

            <div align="center" style="position:relative;top:20px">
                <button class="button"><a href="pages-booking.php">Add a Booking</a></button>
                <button class="button"><a href="block_booking.php">Block Booking</a></button>
                <br><br><br><br>
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