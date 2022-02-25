<?php
session_start();
if (isset($_SESSION['log'])) {
    header('location: contact.php');
    exit();
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="dist/css/login.css">
</head>

<body>
    <form action="connexion.php" method="POST">
        <div class="pseudo-container">
            <label for="pseudo">Pseudo</label>
            <input type="text" autocomplete="off" id="pseudo" required>
            <span></span>
        </div>
        <!-- <div class="email-container">
            <label for="email">email</label>
            <input type="text" autocomplete="off" id="email" required>
            <span>Email incorrect</span>
        </div> -->
        <div class="password-container">
            <label for="password">password</label>
            <input type="password" autocomplete="off" id="password" required>
            <p id="progress-bar"></p>
            <span></span>
        </div>
        <!-- <div class="confirm-container">
            <label for="confirm">confirm</label>
            <input type="password" autocomplete="off" id="confirm">
            <span></span>
        </div> -->

        <input type="submit" value="Connexion">
        <!-- <a href="inscription.php">Inscrivez vous !</a> -->
    </form>

    <script src="connexion.js"></script>
</body>

</html>