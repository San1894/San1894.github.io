<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
// if (!$db) {
//     echo 'failed';
// } else {
//     echo 'success';
// }

// header('content-type:application/json');
// $id = $_GET['id'];
// echo "<pre>";
// print_r($_GET['id']);
// echo "</pre>";

$id = $_GET['id'];

function deleteData()
{

    global $db, $file, $id;

    $query = $db->prepare("DELETE FROM contact WHERE id =$id");
    $query->execute(['id' => $id]);
    $file = $query->fetchAll();
    echo json_encode($file);
    // $data = json_encode($json, true);

    // $commentaire = $query->fetch();


    // return $file;


    // echo "success query";

    // $data = json_encode($file, true);
    // return $data;
}

deleteData();
