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


        $req =  $base->prepare("SELECT COUNT(*) FROM inscriptions WHERE excursion_id = :excursion AND randonneur_id = :randonneur");
        $req->execute(array(
            'randonneur'=> $_POST['id-randonneur'],
            'excursion'=> $_POST['id-excursion'],
            ));
            $lignes = $req->fetch();
            $ligneCount = (int)$lignes[0];
            $req -> closeCursor();
            $message='Ce randonneur est déja inscrit';

        if($ligneCount==0){
            $req = $base->prepare("INSERT INTO `inscriptions` (`ID`, `randonneur_id`, `excursion_id`) VALUES (NULL, :randonneur, :excursion)");
            $req->execute(array(
            'randonneur'=> $_POST['id-randonneur'],
            'excursion'=> $_POST['id-excursion'],
            ));
            $req -> closeCursor();
            $message='Randonneur inscrit';
        }

    }




echo json_encode(
    array(
        'message' => $message,
        )
    );

