<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
if (!$db) {
    echo 'failed';
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$id = $_GET['id'];
// echo "<pre>";
// print_r($_GET['id']);
// echo "</pre>";

function updatedata()
{
    global $db, $data, $id;

    if (empty($data['cname']) || empty($data['email']) || empty($data['mobile']) || empty($data['adress'])) {
        echo json_encode((['status' => 'failed']));
    } else {
        $name = $data['cname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $adress = $data['adress'];

        $query = $db->prepare("UPDATE `contact` SET `name` = '$name', `email` = '$email', `mobile` = '$mobile', `adress` = '$adress' WHERE id =$id");
        $query->execute();

        echo json_encode((['status' => 'success']));
    }
};
updatedata();
