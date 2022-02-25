<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
// if (!$db) {
//     echo 'failed';
// }

// header('content-type:application/json');

function getData()
{

    global $db, $file, $data;

    $stmt = $db->query('SELECT * FROM contact');
    $file = $stmt->fetchAll();
    echo json_encode($file);
    // $data = json_encode($json, true);



    // return $file;


    // echo "success query";

    // $data = json_encode($file, true);
    // return $data;
}


getData();
// echo "<pre>";
// print_r($file);
// echo "</pre>";
// $_GET = $data;
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// var_dump($data);


// $json = file_get_contents($file);
