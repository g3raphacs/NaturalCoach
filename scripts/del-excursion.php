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



    if(isset($_POST['id'])){
        $req = $base->prepare("DELETE FROM `excursions` WHERE `excursions`.`ID` = :id");
        $req->execute(array(
        'id'=> $_POST['id'],
        ));
        $req -> closeCursor();
        $message='Excursion supprimée';
    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

