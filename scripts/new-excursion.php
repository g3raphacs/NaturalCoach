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
$msg4='';
$msg5='';
$msg6='';
$msg7='';
$edit=false;

if($_POST['nom']==''){
    $msg1="Vous devez entrer un nom d'excursion";
}
if($_POST['date_debut']==''){
    $msg2='Vous devez entrer une date de début';
}
if($_POST['date_fin']==''){
    $msg3='Vous devez entrer une date de fin';
}
if($_POST['lieu_depart']==''){
    $msg4='Vous devez entrer un lieu de départ';
}
if($_POST['lieu_arrivee']==''){
    $msg5="Vous devez entrer un lieu d'arrivée";
}
if($_POST['nbre_max']==''){
    $msg6='Vous devez un nombre de randonneurs maximum';
}
if($_POST['prix']==''){
    $msg7='Vous devez entrer un prix';
}

$msgConcat=$msg1.$msg2.$msg3.$msg4.$msg5.$msg6.$msg7;

if($msgConcat==''){
    $ok=true;
}

if($ok){

    $req = $base->prepare("SELECT `ID` FROM `region` WHERE Nom = :lieu_depart");
    $req ->execute(array('lieu_depart' => $_POST['lieu_depart']));
    $depart = $req->fetch();
    $depart=(int)$depart[0];
    $req -> closeCursor();

    $req = $base->prepare("SELECT `ID` FROM `region` WHERE Nom = :lieu_arrivee");
    $req ->execute(array('lieu_arrivee' => $_POST['lieu_arrivee']));
    $arrivee = $req->fetch();
    $arrivee=(int)$arrivee[0];
    $req -> closeCursor();


    if(isset($_POST['id'])){
        $req = $base->prepare("UPDATE `excursions`
                            SET
                            `nom` = :nom,
                            `date_debut` = :date_debut,
                            `date_fin` = :date_fin,
                            `nbre_max` = :nbre_max,
                            `prix` = :prix,
                            `lieu_debut` = :lieu_debut,
                            `lieu_fin` = :lieu_fin
                             WHERE `excursions`.`ID` = :id");
        $req->execute(array(
            'id'=> $_POST['id'],
            'nom'=> $_POST['nom'],
            'date_debut'=> $_POST['date_debut'],
            'date_fin'=> $_POST['date_fin'],
            'nbre_max'=> $_POST['nbre_max'],
            'prix'=> $_POST['prix'],
            'lieu_debut'=> $depart,
            'lieu_fin'=> $arrivee,
        ));
        $req -> closeCursor();
        $message='Informations mises à jour';
        $edit=true;
    }
    else{
        $req = $base->prepare("INSERT INTO `excursions` (`ID`, `nom`, `date_debut`, `date_fin`, `nbre_max`, `prix`, `lieu_debut`, `lieu_fin`)
                            VALUES (NULL, :nom, :date_debut, :date_fin, :nbre_max, :prix, :lieu_debut, :lieu_fin)");
        $req->execute(array(
            'nom'=> $_POST['nom'],
            'date_debut'=> $_POST['date_debut'],
            'date_fin'=> $_POST['date_fin'],
            'nbre_max'=> $_POST['nbre_max'],
            'prix'=> $_POST['prix'],
            'lieu_debut'=> $depart,
            'lieu_fin'=> $arrivee
        ));
        $req -> closeCursor();
        $message='Nouvelle excursion ajoutée';
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
        'msg4' => $msg4,
        'msg5' => $msg5,
        'msg6' => $msg6,
        'msg7' => $msg7,
        )
    );

