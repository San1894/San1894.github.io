<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
// if ($db) {
//     die('connecter');
// } else {
//     die('erreur');
// }



// if (array_key_exists("task", $_GET)) {
//     $task = $_GET['task'];
// }

// if ($task == "write") {
//     postData();
// } else {
//     getData();
// }

// function getData()
// {
//     global $db;

//     $resultats = $db->query("SELECT * FROM users ORDER BY id DESC");
//     $users = $resultats->fetchAll();
//     echo json_encode($users);
// }
$json = file_get_contents("php://input");
$data = json_decode($json, true);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

function postData()
{

    global $data;
    global $db;

    // foreach ( function ($data) {

    // echo "<pre>";
    // print_r($data['pseudo']);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($data['email']);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($data['pass']);
    // echo "</pre>";


    if (empty($data['pseudo']) || empty($data['pass'])) {
        echo json_encode(["status" => "error", "message" => "field have not sent"]);
        return false;
    } else {
        $pseudo = $data['pseudo'];
        $pass = $data['pass'];


        $check = $db->prepare("SELECT id FROM users WHERE pseudo = '$pseudo' AND pass = '$pass'");

        $check->execute(
            [
                'pseudo' => $pseudo,
                'pass' => $pass
            ]

        );

        $resultat = $check->rowCount();
        if ($resultat > 0) {
            $_SESSION['log'] = '1';
            $_SESSION['pseudo'] = $pseudo;

            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed"]);
            // echo json_encode(["status" => "failed"]);
        }
    }
    // }
}

postData();

// $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

// if ($contentType === "application/json") {
//     //Receive the RAW post data.
//     $content = trim(file_get_contents("php://input"));

//     $decoded = json_decode($content, true);

//     //If json_decode failed, the JSON is invalid.
//     if (!is_array($decoded)) {
//     } else {
//         // Send error back to user.
//     }
// }
