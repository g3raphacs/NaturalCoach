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
$ok=false;
$message='';
$msg1='';
$edit=false;

if($_POST['nom']==''){
    $msg1='Vous devez entrer un nom de région';
}


if($msg1==''){
    $ok=true;
}

if($ok){
    if(isset($_POST['id'])){
        $req = $base->prepare("UPDATE `region` SET `Nom` = :nom WHERE `region`.`ID` = :id");
        $req->execute(array(
        'id'=> $_POST['id'],
        'nom'=> $_POST['nom'],
        ));
        $req -> closeCursor();
        $message='Informations mises à jour';
        $edit=true;
    }
    else{
        $req = $base->prepare("INSERT INTO `region` (`ID`, `Nom`) VALUES (NULL, :nom)");
        $req->execute(array(
        'nom'=> $_POST['nom'],
        ));
        $req -> closeCursor();
        $message='Nouvelle region ajoutée';
    }
}



echo json_encode(
    array(
        'ok' => $ok,
        'editMode' => $edit,
        'message' => $message,
        'msg1' => $msg1,
        )
    );

