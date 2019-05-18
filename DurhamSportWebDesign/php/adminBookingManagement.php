<?php
session_start();
require 'database.php';
if(isset($_SESSION['User']) && $_SESSION['User'] == null){
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}

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
 ?>       


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
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
            <li><a href="admin.php">Admin Dashboard</a></li>
            <li><a href="#.php">Personal Profile</a></li>
            <li><a href="adminFacilityManagement.php">Facility Management</a></li>
            <li><a href="adminBookingManagement.php">Booking Management</a></li>
        </ul>


    </nav><!-- end navigation menu -->
</header><!-- end header -->

<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><a href="../html/login.html">Login</a> || <a href="../html/registry.html">Registry</a></p>
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
                <a href="#">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="#">How to use</a></p>
        </div>
    </section><!-- end top -->




    <!-- ----------------------Start your content from here-------------------------------------------------- -->


    <section class="wrapper">
        <div class="content">
            <p class="title">Welcome, admin  </p>

            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="">
                    <button type="button">
                        <input type="text" name="facilityName" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <center><h1> Booking Management </h1></center>
            <div id="showinfo">
            <a href="pages-booking.php"> Add a Booking</a>

            </div>

        <table id="showinfo" width="800" border="1">
        <tr bgcolor="#dddddd">
        <th>Booking ID</th>
        <th>User ID</th>
        <th>Facility ID</th>
        <th>Event ID</th>
        <th>Booking Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>People</th>
        <th>Booking Title</th>
        <th>Notes</th>
        <th colspan="2">Action</th>
        </tr>

        <?php
        $select = $pdo->prepare("SELECT * FROM booking");
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
        echo "<td>" . $row['people'] ."</td>";
        echo "<td>" . $row['bookingTitle'] ."</td>";
        echo "<td>" . $row['notes'] ."</td>";
        ?>
        <td><a href="admindeletebooking.php?del_id=<?php echo $row['bookingID']; ?>" onclick="return confirm('Are you sure you want to delete the Facility?')">Delete</a></td>
        <?php echo "</tr>"; }?>

        </table>



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
