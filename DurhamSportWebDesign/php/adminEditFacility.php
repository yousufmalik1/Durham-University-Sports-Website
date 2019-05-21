<?php
session_start();
require 'database.php';
$pdo = make_database_connection();
if(isset($_SESSION['User']) && $_SESSION['User'] == null || $_SESSION ['User']['role'] == '0'){
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}

//Edit Facility
if(isset($_POST['done']))
{

    $edit_id = $_GET['edit_id'];
    
    $facilityName = $_POST['facilityName'];
    $price = $_POST['price'];
    $priceStu = $_POST['priceStu'];
    $capacity = $_POST['capacity'];
    $info = $_POST['info'];
    $timeOpen = $_POST['timeOpen'];
    $timeClose = $_POST['timeClose'];

    $update = $pdo->prepare("UPDATE facility SET facilityName=:facilityName ,price=:price ,priceStu=:priceStu, 
    capacity=:capacity ,info=:info ,timeOpen=:timeOpen ,timeClose=:timeClose WHERE facilityID='$edit_id'"); 
    $update->bindParam(':facilityName', $facilityName);
    $update->bindParam(':price', $price);
    $update->bindParam(':priceStu', $priceStu);
    $update->bindParam(':capacity', $capacity);
    $update->bindParam(':info', $info);
    $update->bindParam(':timeOpen', $timeOpen);
    $update->bindParam(':timeClose', $timeClose);
    $update->execute();
    header("location:adminFacilityManagement.php");
if($update){
    echo 'Facility Updated';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminEditFacility</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <?php
        if(isset($_SESSION['User']) && $_SESSION['User'] != null){
            echo  "<p class='logincs'><button class='logoutbtn'><a href='index.php?operate=logout'>logout</a></button></p>";
        }
        else{
            echo "<script>alert('Login please！'); window.location.href='login.php'</script>";}?>
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
                <h2 class="text-dark-50 text-center mt-0 font-weight-bold">Edit Facility Information</h2>
                <p class="text-muted mb-4">Enter the Facility information to update </p>

                <form action="adminFacilityManagement.php" method="post" >
                    Edit the Facility Name<br><br>
                <input class="form-control"  type="text" name="facilityName" placeholder="Facility Name"><br><br>
                    Edit the Facility Price<br><br>
                <input class="form-control"  type="number" step= "0.01" name="price" placeholder="Price"><br><br>
                    Edit the Student Price<br><br>
                <input class="form-control"  type="number" step= "0.01" name="priceStu" placeholder="Student Price"><br><br>
                    Edit the Facility Capacity<br><br>
                <input class="form-control" type="number" step= "0.01" name="capacity" placeholder="Capacity"><br><br>
                    Edit the Facility Info<br><br>
                <input class="form-control" type="text" name="info" placeholder="Info"><br><br>
                    Edit the Start Time of the Facility<br><br>
                <input class="form-control" type="time" name="timeOpen" placeholder="Start Time"><br><br>
                    Edit the Finish Time of the Facility<br><br>
                <input class="form-control" type="time" name="timeClose" placeholder="Finish Time"><br><br>

                <input class="form-control" type="file" name="file"><br><br>
                <button class="btn btn-primary" id="submit" name="uploading">Upload Image</button><br><br>

                <button class="btn btn-primary" id="submit" name="done"> Edit Facility</button>
                </form>

            </div>
        </div>
    </section>

    
    <script type="text/javascript">
        $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
        });
    </script>
    </body>

</html>
