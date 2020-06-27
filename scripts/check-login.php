<?php
require_once('connect.php');

$ok = true;
$messages = array();

if (!isset($_POST['username']) || empty($_POST['username'])){
    $ok = false;
    $messages[] = "L'utilisateur ne peut pas être vide !";
}

if (!isset($_POST['password']) || empty($_POST['password'])){
    $ok = false;
    $messages[] = 'Le mot de passe ne peut pas être vide !';
}

if($ok){
    $reponse = $base->query("SELECT * FROM `passwords`");
    $success=false;

    while ($donnees = $reponse->fetch()){
        $messages=[];
        if ($_POST['username']===$donnees['user'] && $_POST['password']===$donnees['password']){
            $messages[] = 'Connecté !';
            $ok = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $donnees['user'];
        break;
        }else{
            $ok = false;
            $messages[] = 'Mauvais utilisateur/mot de passe !';
        }
    } $reponse->closeCursor();
}


echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
    );