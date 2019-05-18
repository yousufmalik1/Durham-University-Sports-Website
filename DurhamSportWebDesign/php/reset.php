<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-12
 * Time: 00:04
 */
require_once("database.php");
header('Content-type:text/html;charset=utf-8');
$token = trim($_GET['token']);
$email = trim($_GET['email']);
$pdo = make_database_connection();
$sql = "Select * from user where email = '$email'";
$query = $pdo->query($sql);
$row = $query->fetch(PDO::FETCH_ASSOC);
$username = $row['username'];
if ($row) {
    $mt = md5($row['userID'] . $row['email'] . $row['password']);
    if ($mt == $token) {
        if (time() - $row['resetpasswordtime'] > 60 * 60 * 24) {
            echo 'This is expired.';
        } else {
            echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>

    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script type="text/javascript" src="../js/registry.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>
</head>

<body>
<div id="login_frame">

    <p id="image_logo"><img src="../images/Durhamlogo.png" height="65" width="140"></p>


        <form name="form" class="form" action="" method="post" onsubmit="return validate_form(this)">

            <p><label class="label_input">Password</label>
                <input type="password" id="password" class="text_field" name="password" required="required">
            </p>
            <p><label class="label_input">Reconfirm</label>
                <input type="password" placeholder="Reconfirm Your Password" class="text_field" name="password2" required="required" onchange="check_same()"/>
            </p>
            <button type="submit" id="registry" class="login-button" value="reset" name="submit">Reset</button>
            <button type="submit" id="login-button" ><a href="login.php" class="cc">Back to login</a></button>

        </form>
    </div>
</div>
</body>
</html>';
        }
    } else {
        echo 'invalid link' . $mt . ' ' . $token;
    }
} else {
    echo 'wrong link!';
}

if (isset($_POST["submit"]) && $_POST["submit"] == "reset") {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
    if (trim('$password') == "") {
        ?>
        <script>
            window.alert("Enter Password");
            history.go(-1);</script>

        <?php
        die();
    } elseif ($password != $confirm) {
        ?>
        <script>
            window.alert("Not same Password");
            history.go(-1);</script>
        <?php die();
    }
    $salt = "some_made_up_string";
    $password_hash = $password . $username . $salt;
    $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
    $update_password = "Update user set password='$password_hash' where username='$username'";
    $pdo->query($update_password);
    echo "<script>alert('update success！'); window.location.href='login.php'</script>";
}

?>
