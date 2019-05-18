<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-12
 * Time: 00:04
 */

header('Content-type:text/html;charset=utf-8');
require_once('database.php');
if (isset($_POST["submit"]) && $_POST["submit"] == "btn_login") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pdo = make_database_connection();
    $sql = "Select * from user where Email = '$email'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row == null) {
        echo 'noregistry';
        exit;
    } else {
        $getpasstime = time();
        $userid = $row['userID'];
        $firstname = $row['firstname'];
        $token = md5($userid . $row['email'] . $row['password']);
        $localhost = $_SERVER['HTTP_HOST'];
        $url = "http://" . $localhost . "/team1/php/reset.php?token=" . $token . "&email=" . $email;
        $time = date('Y-m-d H:i');
        $content = "Dear " . $firstname . "：you are in " . $time . " submit a request of reseting password. Please click the link to reset password（valid for 24 hours)." .$url." If you cannot click this link, please copy it enter your website address. If you do not submit this request,ignore this email please.";
        $result = sendMail($email, 'Reset password', $content);
        if ($result == 1) {//send email successfully
            echo '<script>alert("reset email already send successfully");</script>';
            $sql="Update user SET resetpasswordtime='$getpasstime' WHERE userID='$userid'";
            $resul= $pdo->query($sql);
            //update reset password time
//        $sql = "UPDATE user SET resetpasswordtime='$getpasstime' WHERE userID='$userid'";
//        $pdo->query($sql);
        } else {
            echo '<script>alert("reset email send fail");</script>';;
        }
    }
}


function sendMail($to, $title, $content)
{
//    require_once("PHPMailer/class.phpmailer.php");
//    require_once("PHPMailer/class.smtp.php");
    require 'recovery/PHPMailer.php';
    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'tls://smtp.gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->FromName = 'DUS-Team1';

    $mail->Username = 'iris.ibabeee@gmail.com';
    $mail->Password = 'zhwpyxhlefcmvznc';
    $mail->From = 'iris.ibabeee@gmail.com';

    $mail->isHTML(true);
    $mail->addAddress($to, 'Your Booking');

    $mail->Subject = $title;
    $mail->Body = $content;
    // $mail->addAttachment('./d.jpg','mm.jpg');

    $status = $mail->send();
        return $status;

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

    <form name='login' class="form" method='post' action='forget.php' method='post' onSubmit="return validate_form(this);">

        <p><label class="label_input">Email</label>
            <input type="text" name="email" id="email" class="text_field" required="required"/>
        </p>

        <div id="login_control">
            <button type="submit" id="btn_login" name='submit' value='btn_login'>Reset</button>
            <button type="submit" id="btn_registry" ><a href="index.php" class="cc">Back</a></button>
        </div>
    </form>
</div>
</body>
</html>

