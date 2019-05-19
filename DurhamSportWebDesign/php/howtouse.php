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
            <li><a href="user.php">Personal Profile</a></li>
            <li><a href="BookingList.php">Booking List</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->

<section class="main clearfix">
    <div id="loginsection">
        <?php
        require('database.php');
        session_start();
        if(isset($_SESSION['User']) && $_SESSION['User'] != null){
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
                <a href="userhome.php">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="howtouse.php">How to use</a></p>
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

            <center><h1> How to use our website </h1></center>

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

                <p>The calendar can show all existing booking on each day，according to the day,the week,the month.</p>

                <h3>Personal Profile</h3>

                <p>Users can modify their own information,including fisrtname|lastname|email|password</p>

                <h3>Booking List</h3>

                <p>Allow user to view and cancel their all bookings ,and there is a booking button to enter the booking page.</p>

                <h3>Booking Page</h3>



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