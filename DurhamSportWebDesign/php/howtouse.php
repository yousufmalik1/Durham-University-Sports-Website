<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>

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
                echo"  <li><a href='admineditbooking.php'>Booking Edit</a></li>";
            }?>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->

<section class="main clearfix">
    <div id="loginsection">
        <?php
        require('database.php');
        session_start();
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
            <?php
            if(isset($_SESSION['User']) && $_SESSION['User'] != null){
            }
            else{
                echo  " <p class='title'>Welcome, Please <a href='login.php'>login</a> </p> ";}?>

            <br>
            <center><h1> How to use our website </h1></center>
            <br>
            <div class="contentblock" id="content38978">
                <h3>Registry</h3>

                <p>Visitors need to register first, including firstname|lastname|email|usename|password.</p>

                <h3>Reset password</h3>

                <p>If you forget the password, users can change the password thorough the email link.</p>

                <h3>Login</h3>

                <p>After registry, users can login by username and password.</p>

                <h3>Facility page</h3>

                <p>Both users and visitors can see the facilities, but having the booking can only after the user logs in.</p>

                <p>Click the booking button to enter the booking page.</p>

                <h3>Calendar page</h3>

                <p>The calendar shows all existing bookings and classes on each day，according to the day,the week,the month.</p>

                <p>The calendar shows the time which is blocked by exams, which means they are not bookable by anyone.</p>

                <h3>Personal Profile</h3>

                <p>Users can modify their own information,including fisrtname|lastname|email|password</p>

                <h3>Booking List</h3>

                <p>Allow user to view and cancel their all bookings ,and there is a booking button to enter the booking page.</p>

                <h3>Booking Page</h3>

                <p>Users can check the availability of facilities before booking. Then choose the booking date, time and people number.</p>


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