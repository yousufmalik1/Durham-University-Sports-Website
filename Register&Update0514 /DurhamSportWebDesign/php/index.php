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
    <title>User</title>
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

            <center><h1> Facility </h1></center>

            <?php
            $facilityname = filter_input(INPUT_POST, 'searchname', FILTER_SANITIZE_STRING);
            if (isset($_POST["searchbtn"]) && $_POST["searchbtn"] == "Search" && $facilityname!="") {
                $pdo = make_database_connection();
    $sql = "SELECT * FROM facility WHERE facilityName LIKE '%$facilityname%'";
    $statement = $pdo->query($sql);
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($row) {
        foreach ($row as $r) {
            echo '<div class="cell">';
            echo '<div class="image"><img src="../images/' . $r['facilityName'] . '.jpg"></a></div>';
            echo '<div align="center"><table style="width: 220px;text-align: center"><tr>
                    <th style="font-size: 1.8em">' . $r['facilityName'] . '</th>
                    </tr>
                    <tr>
                    <td style="font-size: 1.2em">' . $r['info'] . '</td>
                    </tr></table></div>';
            echo '</div>';
        }
    } else {
        echo 'This facility is no exist!';
    }
}else{ ?>
            <div id="showinfo">
                <div class="show">
                    <p> <?php showfacilities() ?></p>
                    <div class="cell">
                        <div class="image"><img src="../images/other facility.jpg" width="200" height="200"></a></div>
                        <div align="center">
                            <table style="width: 220px;text-align: center"><tr>
                                    <th style="font-size: 1.8em">Other facility</th>
                                </tr>
                                <tr>
                                    <td style="font-size: 1.2em">We have more other facility</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            <?php  } ?>

                </div>

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