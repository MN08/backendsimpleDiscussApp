<?php

include('../connection.php');


$sql = "SELECT * FROM topics";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($get_row = $result->fetch_assoc()) {

        $id_user = $get_row["id_user"];
        $sql_user = "SELECT * FROM users WHERE id = $id_user";
        $result_user = $connect->query($sql_user);
        $users = array();
        while ($row_user = $result_user->fetch_assoc()) {
            $users[] = $row_user;
        }

        $get_row["users"] = $users[0];
        $data[] = $get_row;
    }
    echo json_encode(array(
        "success" => true,
        "data" => $data,
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "data" => [],
    ));
}
