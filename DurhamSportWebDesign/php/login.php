<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 17:49
 */
header('Content-type:text/html;charset=utf-8');
require_once('database.php');
if (isset($_POST["submit"]) && $_POST["submit"] == "btn_login") {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $salt = "some_made_up_string";
    $password_hash = $password . $username . $salt;
    if ($username == "" || $password == "") {
        echo "<script>alert('Please fill all the information!'); history.go(-1);</script>";
    } else {
        $user = select_user_alldetail($username);
        $flag=password_verify($password_hash,$user['password']);
        if(!empty($_POST['username'])) {
            //login form sent, check the database
            //if you get a row, start session
            //redirect them if it was wrong
            if($flag==false){
                echo "<script>alert('username or password error！');
                       history.go(-1)</script>";
                die();
            }else {
                $pdo = make_database_connection();
                $sql = "select username,password,role from user where username = '$_POST[username]'";
                $result  = $pdo->query("$sql");
                $row = $result->fetch(PDO::FETCH_NUM);
                if($row)
                {
                    $is_admin = (string)$row[2];
                    session_start();
                    if((integer)$is_admin == 0)
                    {
                        $_SESSION['username'] = $row[0];
                        echo "<script>alert('".$is_admin."');</script>";
                        echo "<script>alert('login success！');</script>";
                        session_start();
                        $_SESSION["User"] =$user;
                        header('location:userhome.php');
                    }
                    else if($is_admin == 1)
                    {
                        $_SESSION['username']=$row[0];
                        echo "<script>alert('login success！');</script>";
                        session_start();
                        $_SESSION["User"] =$user;
                        header('location:admin.php');
                    }
                }
            }
        } else if(isset($_SESSION['User'])) {
            //maybe they logged in already and we stored a session?
            session_start();
            if (empty($_SESSION['User'])) {
                //nope, redirect them...
                header('Location: index.php');
                die();
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>

    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script type="text/javascript" src="../js/login.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>
</head>

<body>
<div id="login_frame">

    <p id="image_logo"><img src="../images/Durhamlogo.png" height="65" width="140"></p>

    <form name='login' class="form" method='post' action='login.php' method='post' onSubmit="return validate_form(this);">

        <p><label class="label_input">username</label>
            <input type="text" name="username" id="username" class="text_field" required="required" onchange="check()"/>
        </p>
        <p><label class="label_input">password</label>
            <input type="password" name="password" id="password" class="text_field" required="required" onchange="check()"/>
        </p>

        <div id="login_control">
            <button type="submit" id="btn_login" name='submit' value='btn_login'>Login</button>
            <button type="submit" id="btn_registry" ><a href="index.php" class="cc">Back</a></button>
        </div>
        <br>
        <br>
        No account? <a href="registry.php" class="cc">Register</a> / <a href="forget.php">forget password</a>?
    </form>
</div>
</body>
</html>

