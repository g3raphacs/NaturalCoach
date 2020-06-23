<?php
require_once('connect.php');

$ok = true;
$messages = array();

if (!isset($_POST['username']) || empty($_POST['username'])){
    $ok = false;
    $messages[] = 'Username cannot be empty!';
}

if (!isset($_POST['password']) || empty($_POST['password'])){
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}

if($ok){
    $reponse = $base->query("SELECT * FROM `passwords`");
    $success=false;

    while ($donnees = $reponse->fetch()){
        $messages=[];
        if ($_POST['username']===$donnees['user'] && $_POST['password']===$donnees['password']){
            $messages[] = 'Successful login!';
        break;
        }else{
            $ok = false;
            $messages[] = 'Incorrect username/password!';
        }
    } $reponse->closeCursor();
}


echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
    );