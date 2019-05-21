<?php
/**
 * Created by PhpStorm.
 * User: FEI
 * Date: 2019-05-10
 * Time: 17:20
 */


//make database connect
function make_database_connection()
{
    $db_host = 'mysql:host=localhost';
    $db_name = 'dbname=dus_team1';
    $db_user = 'root';
    $db_pass = 'root';
    $pdo = new PDO($db_host . ';' . $db_name, $db_user, $db_pass, array(PDO::ATTR_PERSISTENT => true));
    return $pdo;
}
//check user whether is exist
function check_user($username)
{
    $pdo = make_database_connection();
    $sql = "Select * from user where username = '$username'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_NUM);
    if ($row != 0) {
        return true;
    }
    return false;
}

//check email whether is exist
function check_email($Email)
{
    $pdo = make_database_connection();
    $sql = "Select * from user where email = '$Email'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_NUM);
    if ($row != 0) {
        return true;
    }
    return false;
}

function update_email($userID,$Email)
{
    $pdo = make_database_connection();
    $sql = "SELECT * FROM user WHERE userID!='$userID' AND email='$Email'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_NUM);
    if ($row != 0) {
        return true;
    }
    return false;
}


//insert new user into database
function insert_user($username, $password, $Email, $firstname, $lastname)
{
    $pdo = make_database_connection();
    $sql = "INSERT INTO `user`(`username`, `password`, `email`, `firstname`, `lastname`, `role`) VALUES ('$username','$password','$Email','$firstname','$lastname','0')";
    $result = $pdo->query($sql);
   if($pdo->lastInsertId()!=null){
       return true;
   }else{
       return false;
   }
}
//update user into database
function update_user($username,$password_hash, $Email, $firstname, $lastname){
    $pdo = make_database_connection();
    $sql = "UPDATE user SET `password`='$password_hash',`email`='$Email',`firstname`='$firstname',`lastname`='$lastname' WHERE `username`='$username'";
    $result = $pdo->query($sql);
    if($result){
     return true;
 }else{
     return false;
 }
}

//select all user information from database
function select_user_alldetail($username)
{
    $pdo = make_database_connection();
    $sql = "select * from user where username = '$username'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}

//select all facility information from database
function select_facility_alldetail()
{
    $pdo = make_database_connection();
    $sql = "select * from facility";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}

//show userhome game list
function showfacilities()
{
    $pdo = make_database_connection();
    $sql = "select * from facility ";
    $facility = $pdo->query($sql);
    while ($row = $facility->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="cell">';
        echo '<div class="image"><img src="../images/' . $row['facilityName'] . '.jpg"></a></div>';
        echo '<div align="center"><table style="width: 220px;text-align: center"><tr>
                    <th style="font-size: 1.8em">' . $row['facilityName'] . '</th>
                    </tr>
                    <tr>
                    <td style="font-size: 1.2em">' . $row['info'] . '</td>
                    </tr></table></div>';

        echo '</div>';
    }
}
?>