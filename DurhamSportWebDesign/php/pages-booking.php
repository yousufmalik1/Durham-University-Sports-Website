<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */
header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(! $_SESSION['User']){
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>New Booking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured booking item which can be used to book facilities." name="description" />
        <meta content="Booking" name="Chenglong Zheng" />

        <!-- App css -->        
        <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/app.min.css" rel="stylesheet" type="text/css" />

        <script src="../js/check-time.js"></script>

        <script type="text/javascript">
        function formReset(){
            document.getElementById("form2").reset()
        }
        </script>

    </head>

    <body class="authentication-bg">

        <div class="booking-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">                            
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="../index.html">
                                    <span><img src="../images/dulogowhite.png" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">New Booking</h4>
                                    <p class="text-muted mb-4">Create your booking, it takes less than a minute </p>
                                </div>
                                <!-- Form1 -->
                                <form id="form1" onsubmit="return false" action="#" method="post">
                                    <div class="form-group">
                                        <label for="select">Facility</label>
                                        <select class="form-control" id="facilityName">
                                            <option value="Squash Courts">Squash Courts</option>
                                            <option value="Aerobics Room">Aerobics Room</option>
                                            <option value="Tennis">Tennis</option>
                                            <option value="Athletics Track sole use">Athletics Track sole use</option>
                                            <option value="Athletics Track">Athletics Track</option>
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input class="form-control" id="date" type="date" name="date" value="2019-05-12">
                                    </div>
                            
                                    <button class="btn btn-outline-secondary" id="submit1" >Check avaliable</button>
                                        <p><div id="txtHint"><b>Available time.</b></div></p>
                                </form>
                                <!-- end form1 -->
                            
                                <!-- Form2 -->
                                <form form id="form2" action="booking-confirm.php" method="post">
                                    <div class="form-group">
                                        <label for="bookingtitle">Booking Title</label>
                                        <input class="form-control" type="text" name="bookingtitle" id="bookingtitle" placeholder="Enter your title" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="select">Facility</label>
                                        <select class="form-control" name="facilityName" id="facilityName">
                                            <option value="Squash Courts">Squash Courts</option>
                                            <option value="Aerobics Room">Aerobics Room</option>
                                            <option value="Tennis">Tennis</option>
                                            <option value="Athletics Track sole use">Athletics Track sole use</option>
                                            <option value="Athletics Track">Athletics Track</option>
                                        </select>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input class="form-control" id="date" type="date" name="date" value="2019-05-12">
                                    </div>
                                
                                    <div class="form-group mb-3">
                                        <label for="time">From</label>
                                        <input class="form-control" id="timefrom" type="time" name="timefrom" value="17-00">
                                        <label for="time">To</label>
                                        <input class="form-control" id="timeto" type="time" name="timeto" value="18-00">
                                    </div>
                                
                                    <div class="form-group mb-3">
                                        <label>People</label>
                                        <input data-toggle="touchspin" data-bts-max="20" name="people" id="people" value="1" data-btn-vertical="true" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="select">Event</label>
                                        <select class="form-control" name="eventName" id="eventName">
                                            <option value="Exercise class">Exercise class</option>
                                            <option value="Exams">Exams</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea data-toggle="maxlength" class="form-control" name="notes" id="notes" maxlength="225" rows="3"
                                        placeholder="Any further information."></textarea>
                                    </div>
                                
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" id="submit2">Confirm booking</button>
                                        <input class="btn btn-outline-secondary" type="button" onclick="formReset()" value="Clear formInfo">
                                    </div>
                                </form>
                                <!-- end form2 -->
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
        <!-- end page -->

        <footer class="footer footer-alt">
            2019 © Durham University Sports
        </footer>

        <!-- App js -->
        <script src="../js/app.min.js"></script>
    </body>
</html>
