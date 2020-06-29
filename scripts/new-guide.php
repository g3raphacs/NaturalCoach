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
$msg2='';
$msg3='';
$edit=false;

if($_POST['nom']==''){
    $msg1='Vous devez entrer un nom';
}
if($_POST['prenom']==''){
    $msg2='Vous devez entrer un prénom';
}
if($_POST['tel']==''){
    $msg3='Vous devez entrer un numero de téléphone';
}

$msgConcat=$msg1.$msg2.$msg3;

if($msgConcat==''){
    $ok=true;
}

if($ok){
    if(isset($_POST['id'])){
        $req = $base->prepare("UPDATE `guides` SET `prenom` = :prenom, `nom` = :nom, `tel` = :tel WHERE `guides`.`ID` = :id");
        $req->execute(array(
        'id'=> $_POST['id'],
        'prenom'=> $_POST['prenom'],
        'nom'=> $_POST['nom'],
        'tel'=> $_POST['tel'],
        ));
        $req -> closeCursor();
        $message='Informations mises à jour';
        $edit=true;
    }
    else{
        $req = $base->prepare("INSERT INTO `guides` (`ID`, `prenom`, `nom`, `tel`) VALUES (NULL, :prenom, :nom, :tel)");
        $req->execute(array(
        'prenom'=> $_POST['prenom'],
        'nom'=> $_POST['nom'],
        'tel'=> $_POST['tel'],
        ));
        $req -> closeCursor();
        $message='Nouveau guide ajouté';
    }
}



echo json_encode(
    array(
        'ok' => $ok,
        'editMode' => $edit,
        'message' => $message,
        'msg1' => $msg1,
        'msg2' => $msg2,
        'msg3' => $msg3,
        )
    );

