<?php


        $user;
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $user=$_SESSION['username'];
            require_once('connect.php');
        } else {
            header('Location: index.php');
        }

$req;
$message='';
$edit=false;



    if(isset($_POST['excursion'])&&isset($_POST['randonneur'])){
        $req = $base->prepare("DELETE FROM `inscriptions` WHERE `randonneur_id` = :randonneur AND `excursion_id` = :excursion");
        $req->execute(array(
        'excursion'=> $_POST['excursion'],
        'randonneur'=> $_POST['randonneur']
        ));
        $req -> closeCursor();
        $message='Randonneur désinscrit';
    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

