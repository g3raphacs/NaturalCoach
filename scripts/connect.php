<?php
    // Connexion à la base de données
    $dsn = 'mysql:dbname=projet_rando;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $base = new PDO($dsn, $user, $password);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        header('Location: errorbdd.php');
    }

    ?>