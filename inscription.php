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
    <form action="config.php" method="POST">
        <div class="pseudo-container">
            <label for="pseudo">Pseudo</label>
            <input type="text" autocomplete="off" name="pseudo" id="pseudo" required>
            <span></span>
        </div>
        <div class="email-container">
            <label for="email">email</label>
            <input type="text" autocomplete="off" name="email" id="email" required>
            <span>Email incorrect</span>
        </div>
        <div class="password-container">
            <label for="password">password</label>
            <input type="password" autocomplete="off" name="pass" id="password" required>
            <p id="progress-bar"></p>
            <span></span>
        </div>
        <div class="confirm-container">
            <label for="confirm">confirm</label>
            <input type="password" autocomplete="off" id="confirm" required>
            <span></span>
        </div>

        <input type="submit" value="Inscription">
        <a href="index.php">Connectez vous !</a>
    </form>

    <script src="inscription.js"></script>
</body>

</html>