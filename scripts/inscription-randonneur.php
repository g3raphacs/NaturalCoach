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



    if(isset($_POST['id-excursion']) && isset($_POST['id-randonneur'])){
        $req = $base->prepare("INSERT INTO `inscriptions` (`ID`, `randonneur_id`, `excursion_id`) VALUES (NULL, :randonneur, :excursion)");
        $req->execute(array(
        'randonneur'=> $_POST['id-randonneur'],
        'excursion'=> $_POST['id-excursion'],
        ));
        $req -> closeCursor();
        $message='Randonneur inscrit';
    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

