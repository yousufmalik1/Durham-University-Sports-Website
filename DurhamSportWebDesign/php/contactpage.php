
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
            <li><a href="#.php">Personal Profile</a></li>
            <li><a href="#.php">Booking List</a></li>
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
                <a href="userhome.php">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="#">How to use</a></p>
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

            <center><h1> Contact Us </h1></center>

            <div class="contentblock" id="content38978">
                <p>For prices, bookings, membership enquiries or general enquiries, please contact us:</p>
                <p><strong>Tel:</strong> 0191 334 2178
                <br><span>For multi-bookings or events please contact:</span>
                <br><strong>Tel:</strong><span> 0191 334 7216</span>
                <br><strong>Email:</strong> teamdurham.bookings@durham.ac.uk</p>
                <p><strong>Durham University Sport</strong> <br>The Graham Sports Centre,<br>Durham University<br>Stockton Road<br>DH1 3SE</p>
            </div>

            <div class="contentblock" id="content72345">
                <h3>Parking</h3>
                <p>Parking is available onsite at the main car park.</p>
            </div>

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