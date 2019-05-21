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

$pdo = make_database_connection();
$sql = "select * from facility";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="../js/check-time.js"></script>
        

        <script type="text/javascript">
            function formReset(){
                document.getElementById("form").reset()
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
                                <a href="BookingList.php">
                                    <span><img src="../images/dulogowhite.png" alt="" height="40"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">New Booking</h4>
                                    <p class="text-muted mb-4">Create your booking, it takes less than a minute </p>
                                </div>
                                <!-- Form -->
                                <form id="form">
                                    <div class="form-group">
                                        <label for="bookingtitle">Booking Title</label>
                                        <input class="form-control" type="text" name="bookingtitle" id="bookingtitle" placeholder="Enter your title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="select">Facility</label>
                                        <select class="form-control" id="facilityId">
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
                                        <label for="date">Date</label>
                                        <input class="form-control" id="date" type="date" name="date" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                    <div id="txtHint" class="form-group"></div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" id="submit1">Confirm booking</button>
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
        <!-- end page -->

        <footer class="footer footer-alt">
            2019 © Durham University Sports
        </footer>

        <!-- App js -->
        <script src="../js/app.min.js"></script>
    </body>
</html>
