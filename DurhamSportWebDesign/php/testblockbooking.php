<?php
header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(! $_SESSION['User']){
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}

$pdo = make_database_connection();
$sql = "select * from facility";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Userhome</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <script type="text/javascript" src="../js/manager.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

    <meta charset="utf-8" />
    <title>Block Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured block booking item which can be used to block facilities." name="description" />
    <meta content="Booking" name="Chenglong Zheng" />

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../js/block-time.js"></script>


    <script type="text/javascript">
        function formReset(){
            document.getElementById("form").reset()
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
                    <p class="title">Welcome, user <?php echo $_SESSION['User']['username']; ?> </p>
                    <div class="booking-pages mt-5 mb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card">


                                        <div class="card-body p-4">
                                            <div class="text-center w-75 m-auto">
                                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Block Booking</h4>
                                            </div>
                                            <!-- Form -->
                                            <form id="form" onsubmit='return false'>
                                                <div class="form-group">
                                                    <label for="eventName">Event Name</label>
                                                    <input class="form-control" type="text" name="eventName" id="eventName" placeholder="Enter event name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="select">Facility</label>
                                                    <select class="form-control" id="facilityId2">
                                                        <?php
                                                        foreach($rows as $row)
                                                        {
                                                            $facilityName = $row['facilityName'];
                                                            $facilityId = $row['facilityID'];
                                                            echo "<option value= '$facilityId'>$facilityName</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Date From</label>
                                                    <input class="form-control" id="datefrom" type="date" name="datefrom" value="<?php echo date('Y-m-d')?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Date To</label>
                                                    <input class="form-control" id="dateto" type="date" name="dateto" value="<?php echo date('Y-m-d')?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="DayofWeek">Day of Week</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="monday" value="1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Monday</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="tuesday" value="2">
                                                        <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="wednesday" value="3">
                                                        <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="thursday" value="4">
                                                        <label class="form-check-label" for="inlineCheckbox4">Thursday</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="friday" value="5">
                                                        <label class="form-check-label" for="inlineCheckbox5">Friday</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="timefrom">Time From</label>
                                                    <input class="form-control" id="timefrom" type="time" name="timefrom" value="<?php echo date('H:00:00')?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="timeto">Time To</label>
                                                    <input class="form-control" id="timeto" type="time" name="timeto" value="<?php echo date('H:00:00')?>">
                                                </div>
                                                <div class="form-group mb-0 text-center">
                                                    <button class="btn btn-primary" id="submit2">Block booking</button>
                                                    <input class="btn btn-outline-secondary" type="button" onclick="formReset()" value="Clear formInfo">
                                                </div>
                                            </form>
                                            <!-- end form1 -->
                                        </div>
                                        <!-- end card body-->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->
                    </div>
        </div><!-- end content -->
    </section>

    <!-- App js -->
    <script src="../js/app.min.js"></script>

    <!-- ----------------------End your content to here-------------------------------------------------- -->



</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>


</body>
</html>