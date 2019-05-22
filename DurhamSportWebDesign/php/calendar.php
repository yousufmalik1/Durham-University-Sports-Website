<?php

header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(isset($_SESSION['User']) && $_SESSION['User'] != null){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>CalendarUser</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!--Xuantong files --> 
    <script type="text/javascript" src="../js/manager.js"></script>
    <!--<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script> --> 
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <!--<script type="text/javascript" src="../js/jquery.js"></script> -->
    <script type="text/javascript" src="../js/main.js"></script>
    
    <script>
     $(document).ready(function() {
         var calendar = $('#calendar').fullCalendar({
             editable:true,
             header:{
                 left:'prev,next today',
                 center:'title',
                 right:'month,agendaWeek,agendaDay'
             },
             //Onload, it calls load.php to make a call to a database to get the info we need.
             events: 'load.php',
             eventRender: function eventRender( event, element, view ) {
                 return ['all', event.facility].indexOf($('#facility_selector').val()) >= 0
             },
             eventClick: function(info){
                 window.alert("Title: "  + info.title + ". Facility: " + info.facility);
             },
         });

         $('#facility_selector').on('change',function(){
             $('#calendar').fullCalendar('rerenderEvents');
         })
     });
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
            echo "<script>alert('Login please！'); window.location.href='login.php'</script>";} ?>
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


    <section class="wrapper">
        <div class="content">
            <p class="title">Welcome, user <?php echo $_SESSION['User']['username']; ?> </p>
            <br>
            <p> Filter (Select facility to view)</p>
            <select id="facility_selector">
                <option value="all">All</option>
                <option value="Athletics Track">Athletics Track</option>
                <option value="Aerobics Room">Aerobics Room</option>
                <option value="Tennis">Tennis</option>
                <option value="Squash Courts">Squash Courts</option>
            </select>

            <h2 align="center"> User Calendar </h2>
            <br />
            <div class="container">
                <div id="calendar"></div>
            </div>

        </div>

</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>
</body>
</html>
