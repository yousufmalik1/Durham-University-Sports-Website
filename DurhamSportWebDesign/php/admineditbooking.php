<?php
session_start();
header ("Content-Type:text/html;charset=utf-8");
require ('database.php');
$pdo = make_database_connection();
if(isset($_SESSION['User']) && $_SESSION['User'] != null &&  $_SESSION ['User']['role'] == '1'){


} else{
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}
//Edit Booking
$edit_id = $_GET['edit_id'];

$select = $pdo->prepare("SELECT * FROM booking where bookingID='$edit_id' ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();

if(isset($_POST['done']))
{


    $userID = $_POST['userID'];
    $facilityID = $_POST['facilityID'];
    $eventID = $_POST['eventID'];
    $bookingDate = $_POST['bookingDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $bookingTitle = $_POST['bookingTitle'];



    $update = $pdo->prepare("UPDATE booking SET userID=:userID ,facilityID=:facilityID ,eventID=:eventID, 
    bookingDate=:bookingDate, startTime=:startTime, endTime=:endTime,  bookingTitle=:bookingTitle WHERE bookingID='$edit_id'");

    $update->bindParam(':userID', $userID);
    $update->bindParam(':facilityID', $facilityID);
    $update->bindParam(':eventID', $eventID);
    $update->bindParam(':bookingDate', $bookingDate);
    $update->bindParam(':startTime', $startTime);
    $update->bindParam(':endTime', $endTime);
    $update->bindParam(':bookingTitle', $bookingTitle);
    $update->execute();
    header("location:adminBookingManagement.php");
    if($update){
        echo 'Booking Updated';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminEditBooking</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <script type="text/javascript" src="../js/manager.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

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

    <section class="wrapper">
        <div class="content">
            <p class="title">Welcome, admin <?php echo $_SESSION['User']['username']; ?> </p>

            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="">
                    <button type="button">
                        <input type="text" name="facilityName" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <div class="text-center w-75 m-auto">
                <h2 class="text-dark-50 text-center mt-0 font-weight-bold">Edit Booking</h2>
                <p class="text-muted mb-4">Enter the Booking information to update </p>

                <form method="post" >
                    Edit the User ID<br><br>
                    <input class="form-control" type="int" name="userID" placeholder="User ID"
                           value="<?php echo $data['userID'] ?>"><br><br>

                    Edit the Facility ID<br><br>
                    <input class="form-control" type="int" name="facilityID" placeholder="Facility ID"
                           value="<?php echo $data['facilityID'] ?>"><br><br>

                    Edit the Event ID<br><br>
                    <input class="form-control"  type="int" name="eventID" placeholder="Event ID"
                           value="<?php echo $data['eventID'] ?>"><br><br>

                    Edit the Date of the Booking<br><br>
                    <input class="form-control" type="date" name="bookingDate" placeholder="Booking Date"
                           value="<?php echo $data['bookingDate'] ?>"><br><br>

                    Edit the Start Time of the Booking<br><br>
                    <input class="form-control" type="time" name="startTime" placeholder="Start Time"
                           value="<?php echo $data['startTime'] ?>"><br><br>

                    Edit the Finish Time of the Booking<br><br>
                    <input class="form-control" type="time" name="endTime" placeholder="Finish Time"
                           value="<?php echo $data['endTime'] ?>"><br><br>

                    Edit the Booking Title
                    <input class="form-control" type="text" name="bookingTitle" placeholder="Booking Title"
                           value="<?php echo $data['bookingTitle'] ?>"><br><br>

                Edit the Finish Time of the Booking<br><br>
                <input class="form-control" type="time" name="endTime" placeholder="Finish Time"
                value="<?php echo $data['endTime'] ?>"><br><br>

                Edit the Booking Title
                <input class="form-control" type="text" name="bookingTitle" placeholder="Booking Title"
                value="<?php echo $data['bookingTitle'] ?>"><br><br>

                    <button class="btn btn-primary" id="submit" name="done"> Edit Booking</button>
                </form>

            </div>
        </div>
    </section>


    <script type="text/javascript">
        $(function() {
            $('#leftNavigation').ssdVerticalNavigation();
        });
    </script>
    <script src="../js/app.min.js"></script>
</body>

</html>