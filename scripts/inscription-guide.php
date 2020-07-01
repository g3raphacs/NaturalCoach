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



    if(isset($_POST['id-excursion']) && isset($_POST['id-guide'])){
        $req = $base->prepare("INSERT INTO `planning_guides` (`ID`, `guide_id`, `excursion_id`) VALUES (NULL, :guide, :excursion)");
        $req->execute(array(
        'guide'=> $_POST['id-guide'],
        'excursion'=> $_POST['id-excursion'],
        ));
        $req -> closeCursor();
        $message='Guide inscrit';
    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

