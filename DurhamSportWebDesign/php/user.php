<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 19:27
 */


header("Content-Type:text/html;charset=utf-8");
require('database.php');
session_start();
if(isset($_SESSION['User']) && $_SESSION['User'] != null){
    
if (isset($_POST["submit"]) && $_POST["submit"] == "update") {
    $userID=$_SESSION['User']['userID'];
    $username = $_SESSION['User']['username'];
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $pattern = '/^[a-z0-9]+([._-][a-z0-9]+)*@([0-9a-z]+\.[a-z]{2,14}(\.[a-z]{2})?)$/i';
    if (preg_match($pattern,$Email)) {
    } else {
        echo "<script>alert('email format error！');history.go(-1);</script>";
        die();
    }
    $checkemail = update_email($userID,$Email);
    if ($checkemail) {
        echo "<script>alert('email already register！');history.go(-1);</script>";
        die();
    } else {
        $salt = "some_made_up_string";
        $password_hash = $password . $username . $salt;
        $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);

            $update = update_user($username,$password_hash,$Email,$firstname,$lastname);
            if ($update) {
                echo "<script>alert('update success！'); window.location.href='userhome.php'</script>";
            } else {
                echo "<script>alert('update no success！');
            history.go(-1);</script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>UserUpdateDetail</title>
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
            <li><a href="user.php">Personal Profile</a></li>
            <li><a href="BookingList.php">Booking List</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><button class="logoutbtn"><a href="index.php?operate=logout">logout</a></button></p>
        <?php }else{
            header('location:index.php');} ?>
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
            <center><h1> Personal Detail </h1></center>

            <center><div>
                <p>Update your personal details here.</p>
                <form name='form' class="form" action='' method='post'  onsubmit="return validate_userform(this)">

                    <p><label class="label_input">First Name</label>
                        <input type="text" class="text_field" name='firstname' value='<?php echo $_SESSION['User']['firstname'] ?>' required="required"/>
                    </p>
                    <p><label class="label_input">Last Name</label>
                        <input type="text" class="text_field" name='lastname' value='<?php echo $_SESSION['User']['lastname'] ?>'required="required"/>
                    </p>
                    <p><label class="label_input">Email</label>
                        <input type="text"  class="text_field" name='email' value='<?php echo $_SESSION['User']['email'] ?>'/>
                    </p>
                    <p><label class="label_input">Password</label>
                        <input type="password" id="password" class="text_field" name='password' required="required" />
                    </p>
                    <input type="submit" id="update" class="login-button" value='update' name='submit' >
                    <button type="submit" id="login-button" ><a href="userhome.php" class="cc">Back</a></button>
                </form>
            </div></center>

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