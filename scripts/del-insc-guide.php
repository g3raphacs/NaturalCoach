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



    if(isset($_POST['excursion'])&&isset($_POST['guide'])){
        $req = $base->prepare("DELETE FROM `planning_guides` WHERE `guide_id` = :guide AND `excursion_id` = :excursion");
        $req->execute(array(
        'excursion'=> $_POST['excursion'],
        'guide'=> $_POST['guide']
        ));
        $req -> closeCursor();
        $message='Guide désinscrit';
    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

