<?php

include('../connection.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql_check_username = "SELECT * FROM users WHERE username = '$username'";
$result_check_user =  $connect->query($sql_check_username);
if ($result_check_user->num_rows > 0) {
    echo json_encode(array(
        "success" => false,
        "message" => "username"
    ));
} else {
    $sql = "INSERT INTO users SET
            username = '$username',
            password = '$password',
            image = 'default_user_image.jpg'";
    $result = $connect->query($sql);

    if ($result) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
}
