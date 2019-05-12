<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 17:04
 */
//header('Content-type:text/html;charset=utf-8');
require_once('database.php');
if (isset($_POST["submit"]) && $_POST["submit"] == "registry") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    if (verifyEmail($Email)) {
    } else {
        echo "<script>alert('email format error！');history.go(-1);</script>";
        die();
    }
    $checkemail = check_email($Email);
    if ($checkemail) {
        echo "<script>alert('email already register！');history.go(-1);</script>";
        die();
    } else {
        $salt = "some_made_up_string";
        $password_hash = $password . $username . $salt;
        $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
        $checkUser = check_user($username);
        if ($checkUser) {
            echo "<script>alert('username already register！');history.go(-1);</script>";
        } else {
            $insert = insert_user($username, $password_hash, $Email, $firstname, $lastname);
            if ($insert) {
                echo "<script>alert('registry success！'); window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('registry no success！');
            history.go(-1);</script>";
            }
        }
    }

}
function verifyEmail($str){
        // $pattern = '/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/';
 //@前面的字符可以是英文字母和._- ，._-不能放在开头和结尾，且不能连续出现
  $pattern = '/^[a-z0-9]+([._-][a-z0-9]+)*@([0-9a-z]+\.[a-z]{2,14}(\.[a-z]{2})?)$/i';
 if(preg_match($pattern,$str)){
      return true;
  }else{
           return false;
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
    <title>Registry</title>

    <link rel="stylesheet" type="text/css" href="../css/registry.css"/>
    <script type="text/javascript" src="../js/registry.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>

</head>
<body>

<div id="registry_frame">
    <p id="image_logo1"><img src="../images/Durhamlogo.png" height="65" width="140"></p>

    <form name='form' class="form" action='' method='post'  onsubmit="return validate_form(this)">

        <p><label class="label_input">First Name</label>
            <input type="text" class="text_field" name='firstname' required="required"/>
        </p>
        <p><label class="label_input">Last Name</label>
            <input type="text" class="text_field" name='lastname' required="required"/>
        </p>
        <p><label class="label_input">Email</label>
            <input type="text"  class="text_field" name='email'/>
        </p>
        <p><label class="label_input">Username</label>
            <input type="text" id="username" class="text_field" name='username' required="required" onchange="check_usr()"/>
        </p>
        <p><label class="label_input">Password</label>
            <input type="password" id="password" class="text_field" name='password' required="required" />
        </p>
        <p><label class="label_input">Reconfirm</label>
            <input type="password" placeholder="Reconfirm Your Password" class="text_field" name='password2' required="required" onchange="check_same()"/>
        </p>
        <button type="submit" id="registry" class="login-button" value='registry' name='submit' >Register</button>
        <button type="submit" id="login-button" ><a href="index.php" class="cc">Back</a></button>
    </form>
    <p id ="welcome">Already have an account?</p><button type="submit" id="login-button" ><a href="login.php" class="cc">Login</a></button>

</div>
</div>
</body>
</html>
