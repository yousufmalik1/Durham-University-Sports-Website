<?php
header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(isset($_GET['operate'])&&$_GET['operate']=="logout"){
    session_start();
    session_unset();//free all session variable
    session_destroy();//free all session variable
    setcookie(session_name(),'',time()-3600);
    header('location:index.php');
}

if (isset($_SESSION['User']) && $_SESSION['User'] != null) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <meta charset="utf-8">
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
            <li><a href="#.php">Personal Profile</a></li>
            <li><a href="#.php">Booking List</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><button class="logoutbtn"><a href="OperateUser.php?operate=logout">logout</a></button></p>
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
                <a href="#">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="#">How to use</a></p>
        </div>
    </section><!-- end top -->




    <!-- ----------------------Start your content from here-------------------------------------------------- -->


    <section class="wrapper">
        <div class="content">
            <p class="title">Welcome, user <?php echo" ".$username;?> </p>

            <div align="right">
                <h4>Search the facility</h4>
                <form name="search" method="post" action="">
                    <button type="button">
                        <input type="text" name="facilityName" placeholder="input facility name"/>
                        <input type="submit" name="searchbtn" VALUE="Search">
                    </button>
                </form>
            </div>

            <center><h1> Manager Dashboard </h1></center>
            <div id="showinfo">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>

            </div>

            <H2><center>Lorem IpsumLorem IpsumLorem Ipsum</center></H2>
            <table id="showinfo" width="800" border="1">
                <tr bgcolor="#dddddd">
                    <th>Date</th>
                    <th>Lorem Ipsum per day</th>
                </tr>

            </table>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>

        </div><!-- end content -->
    </section>



    <!-- ----------------------End your content to here-------------------------------------------------- -->



</section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>
<?php
} ?>
</body>
</html>