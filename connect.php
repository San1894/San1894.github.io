<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
if (!$db) {
    echo 'failed';
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

function postdata()
{
    global $db, $data;

    if (empty($data['cname']) || empty($data['email']) || empty($data['mobile']) || empty($data['adress'])) {
        echo json_encode((['status' => 'failed']));
    } else {
        $name = $data['cname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $adress = $data['adress'];

        $query = $db->prepare("INSERT INTO `contact` (`name`, `email`, `mobile`, `adress`) VALUES ('" . $name . "', '" . $email . "', '" . $mobile . "', '" . $adress . "')");
        $query->execute();

        echo json_encode((['status' => 'success']));
    }
}
postdata();
