<?php
session_start();
header ("Content-Type:text/html;charset=utf-8");
require ('database.php');
$pdo = new PDO('mysql:host=localhost;dbname=xdurhamsports','root','');

//if(isset($_SESSION['user']) && $_SESSION['user'] == null && $_SESSION ['User']['role'] == '0'){
    //echo "<script>alert('Login please！'); window.location.href='login.php'</script>";}
    //else{header('location:index.php');}



        
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
<body>
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
            <li><a href="admineditbooking.php">Booking Edit</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->

<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><button class="logoutbtn"><a href="index.php?operate=logout">logout</a></button></p>
        <?php //}else{
            //header('location:index.php');} ?>
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

            <p class="title">Welcome, <?php //echo $_SESSION['User']['username']; ?> </p>
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
            <div id="showinfo">
                <p><a href="pages-booking.php"> Add a Booking</a></p>
            </div>

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
        </body>
    </html>
        <?php
                try{
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
                    <td><a href="admineditbooking.php?edit_id=<?php echo $row['facilityID']; ?>">Edit</a></td>
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
        

        </div><!-- end content -->
    </section>

    <!-- ----------------------End your content to here-------------------------------------------------- -->


</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>


</html>
