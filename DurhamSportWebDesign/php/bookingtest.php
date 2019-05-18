<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 17:08
 */
header('Content-type:text/html;charset=utf-8');
require_once('database.php');
if(isset($_GET['operate'])&&$_GET['operate']=="logout"){
    session_start();
    session_unset();//free all session variable
    session_destroy();//free all session variable
    setcookie(session_name(),'',time()-3600);
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>bookinglisttest</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
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
            <li><a href="#.php">Weclome</a></li>
            <li> <p><a href="login.php">Login</a></p></li>
            <li><p><a href="registry.php">Registry</a></p></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
<!--    <div id="loginsection">-->
<!--        <p class="logincs"><a href="login.php">Login</a> || <a href="registry.php">Registry</a></p>-->
<!--    </div>-->
    <section class="top">
        <div class="wrapper content_header clearfix">
            <div class="duslogan">
                <p>DURHAM UNIVERSITY SPORT</p>
            </div>
            <div class="logoDU">
                <a href="https://www.teamdurham.com"><img src="../images/dulogowhite.png"  /></a>
            </div>
            <p class="title">
                <a href="index.php">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="#">How to use</a></p>
        </div>
    </section><!-- end top -->



    <!-- ----------------------Start your content from here-------------------------------------------------- -->


    <section class="wrapper">
        <div class="content">

            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="index.php">
                    <button type="button">
                        <input type="text" name="searchname" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <center><h1> Booking List test</h1></center>

            <div align="center" style="position:relative;top:10px">
                <button class="button">Booking Now</button>
            </div>

            <style>
                .button {
                    display: inline-block;
                    padding: 15px 25px;
                    font-size: 24px;
                    cursor: pointer;
                    text-align: center;
                    text-decoration: none;
                    outline: none;
                    color: #fff;
                    background-color: #9b2daf;
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 9px #999;
                }

                .button:hover {background-color: #9b2daf
                }

                .button:active {
                    background-color: #9b2daf;
                    box-shadow: 0 5px #666;
                    transform: translateY(4px);
                }
            </style>

            <table id="showinfo" width="800" border="1">
                <tr>
                    <th>Booking ID</th>
                    <th>Facility ID</th>
                    <th>Event Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Booking Title</th>
                    <th>Cancel</th>
                </tr>

                <?php
                require_once('database.php');//链接数据库
                $sql = "SELECT * FROM booking,event WHERE bookingID = '$bookingID' and event.eventID='$eventID'";
                foreach ($pdo->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>{$row['bookingID']}</td>";
                    echo "<td>{$row['facilityID']}</td>";
                    echo "<td>{$row['eventName']}</td>";
                    echo "<td>{$row['start']}</td>";
                    echo "<td>{$row['end']}</td>";
                    echo "<td>{$row['bookingTitle']}</td>";
                    echo "<td>
                            <a href='javascript:doDel({$row['bookingID']})'>Cancel</a >
                        
                            </td>";
                    echo "</tr>";
                }
                ?>
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