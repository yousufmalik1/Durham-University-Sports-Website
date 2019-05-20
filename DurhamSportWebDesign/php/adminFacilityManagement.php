<?php
session_start();
require 'database.php';
if(isset($_SESSION['User']) && $_SESSION['User'] == null && $_SESSION ['User']['role'] == '1'){
    echo "<script>alert('Login please！'); window.location.href='login.php'</script>";
}

try{
    $pdo = new PDO('mysql:host=localhost;dbname=xdurhamsports','root','');
    
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connected successfully";
}   
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

    $facilityID = "";
    $facilityName = "";
    $price = "";
    $priceStu = "";
    $capacity = "";
    $info = "";
    $timeOpen = "";
    $timeClose = "";

    function getPosts(){
        $posts = array();

        //$posts[0] = $_POST['facilityID'];
        $posts[1] = $_POST['facilityName'];
        $posts[2] = $_POST['price'];
        $posts[3] = $_POST['priceStu'];
        $posts[4] = $_POST['capacity'];
        $posts[5] = $_POST['info'];
        $posts[6] = $_POST['timeOpen'];
        $posts[7] = $_POST['timeClose'];

        return $posts;
    }

    //Add new Facility
    if(isset($_POST['addFacility'])){
        $data = getPosts();
        if(empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || empty($data[5]) || empty($data[6]) || empty($data[7]))
        {echo 'Enter Facility Data';
    }else{
        $insert = $pdo->prepare('INSERT INTO facility(facilityName,price,priceStu,capacity,info,timeOpen,timeClose) 
        VALUES(:facilityName,:price,:priceStu,:capacity,:info,:timeOpen,:timeClose)');
        $insert->execute(array(
        ':facilityName'=>$data[1],
        ':price'=>$data[2],
        ':priceStu'=>$data[3],
        ':capacity'=>$data[4],
        ':info'=>$data[5],
        ':timeOpen'=>$data[6],
        ':timeClose' =>$data[7],
        ));

    if($insert){
        echo 'Facility Added';
    }
}}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminFacilityManagement</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/manager.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

    <style>
        img {
        margin-right: 1em;
        object-fit: none;
        }

        #object-position-1 {
        width:200px;
        height:200px;
        margin-left: 65px;
        }

        table{
            border-spacing: 15px;
            text-align: center;
            padding: 5px;
        }

    </style>

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
            <p class="title">Welcome, admin <?php echo $_SESSION['User']['username']; ?> </p>
            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="userhome.php">
                    <button type="button">
                        <input type="text" name="searchname" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <div class="card-body p-4">
            <div class="text-center w-75 m-auto">
                <h1 class="text-dark-50 text-center mt-0 font-weight-bold">Facility Management</h1>
                <p class="text-muted mb-4">Create, Edit or Delete a Facility </p>

            <div id="showinfo">

            <!--showfacilities()-->

            <?php $select = $pdo->query("select * from facility ");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();

            while($row = $select->fetch()){
                
                echo '<div class="cell">';
                echo '<div class="image"><img src="../images/' . $row['facilityName'] . '.jpg" width="200" height="200" ></a></div>';
                echo '<div align="center"><table><tr>
                        <th style="font-size: 1.8em">' . $row['facilityName'] . '</th>
                        </tr>
                        <tr>
                        <td style="font-size: 1.2em">' . $row['info'] . '</td>
                        </tr></table></div>';
    
                echo '</div>';
                
            }?>


               <form action="adminFacilityManagement.php" method = "post">
                    <input class="form-control" type="text" name="facilityName" placeholder="Facility Name" value="<?php echo $facilityName;?>" /><br><br>
                    <input class="form-control" type="number" step= "0.01" name="price" placeholder="Price" value="<?php echo $price;?>" /><br><br>
                    <input class="form-control" type="number" step= "0.01" name="priceStu" placeholder="Student Price" value="<?php echo $priceSTU;?>" /><br><br>
                    <input class="form-control" type="number" step= "0.01" name="capacity" placeholder="Capacity" value="<?php echo $capacity;?>" /><br><br>
                    <input class="form-control"type="text" name="info" placeholder="Info" value="<?php echo $info;?>" /><br><br>
                    <input class="form-control" type="time" name="timeOpen" placeholder="Start Time" value="<?php echo $timeOpen;?>" /><br><br>
                    <input class="form-control" type="time" name="timeClose" placeholder="Finish Time" value="<?php echo $timeClose;?>" /><br><br>
                    
                    <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" id="submit" name="addFacility" value="Add">Add Facility</button>
                    </div>
                </form>

            <!--<?php $uploaddir = '../images/';
                $uploadfile = $uploaddir . basename($_FILES['file']);

                echo '<pre>';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                } else {
                    echo "Possible file upload attack!\n";
                }
                ?>-->
            </div>

            <H2><center>Facilities Available</center></H2>
            <table id="showinfo" width="800" border="1">
                <tr bgcolor="#dddddd">
                    <th>Facility ID</th>
                    <th>Facility Name</th>
                    <th>Price</th>
                    <th>Student Price</th>
                    <th>Capacity</th>
                    <th>Info</th>
                    <th>Start Time</th>
                    <th>Finish Time</th>
                    <th colspan="2">Action</th>
                </tr>
                
            <?php 

                $select = $pdo->prepare("SELECT * FROM facility");
                $select->setFetchMode(PDO::FETCH_ASSOC);
                $select->execute();

                while ($row = $select->fetch())
                {
                    echo "<tr>";
                    echo "<td>" . $row['facilityID'] ."</td>";
                    echo "<td>" . $row['facilityName'] ."</td>";
                    echo "<td>" . $row['price'] ."</td>";
                    echo "<td>" . $row['priceStu'] ."</td>";
                    echo "<td>" . $row['capacity'] ."</td>";
                    echo "<td>" . $row['info'] ."</td>";
                    echo "<td>" . $row['timeOpen'] ."</td>";
                    echo "<td>" . $row['timeClose'] ."</td>";
                ?>
                <td><a href="adminEditFacility.php?edit_id=<?php echo $row['facilityID']; ?>">Edit</a></td>
                
                <td><a href="adminDeleteFacility.php?del_id=<?php echo $row['facilityID']; ?>" onclick="return confirm('Are you sure you want to delete the Facility?')">Delete</a></td>
                <?php echo "</tr>"; }?>

                </table>
            <script>
            function confirmSubmit() {
            if (confirm("Are you sure you want to delete the Facility?")) {
                document.getElementById("del_id").submit();
            }
            return false;
            }
            </script>
            

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
