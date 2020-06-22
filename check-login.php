<?php
$ok = true;
$messages = array();
$username='Jeremy';
$password='lejee';

if (!isset($_POST['username']) || empty($_POST['username'])){
    $ok = false;
    $messages[] = 'Username cannot be empty!';
}

if (!isset($_POST['password']) || empty($_POST['password'])){
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}

if($ok){
    if ($_POST['username']===$username && $_POST['password']===$password){
        $messages[] = 'Successful login!';
    }else{
        $ok = false;
        $messages[] = 'Incorrect username/password!';
    }
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
    );