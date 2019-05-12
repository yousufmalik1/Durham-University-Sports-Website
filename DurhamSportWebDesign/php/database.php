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
    $db_name = 'dbname=XDurhamSports';
    $db_user = 'root';
    $db_pass = '';
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

//insert new user into database
function insert_user($username, $password, $Email, $firstname, $lastname)
{
    $pdo = make_database_connection();
    $sql = "INSERT INTO user(username,password,email,firstname,lastname) VALUES ('$username','$password','$Email','$firstname','$lastname')";
    $result = $pdo->query($sql);
   if($pdo->lastInsertId()!=0){
       return true;}
   return false;
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