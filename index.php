<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php session_start();
    // deconnection du dashboard lors du chargement 
    if(isset($_SESSION['loggedin'])){
        unset($_SESSION['loggedin']);
    }
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
    }
    ?>
    <div class="form">
        <h1>CONNECT</h1>
        <form id="connect">
            <div>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" spellcheck="false">
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
            </div>

            <ul id="form-messages"></ul>

            <button id="btn-submit" type="submit">LOGIN</button>
        </form>
    </div>
    <script src="scripts/login.js"></script>
</body>
</html>