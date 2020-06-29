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
$msg8='';
$edit=false;

if($_POST['nom']==''){
    $msg1='Vous devez entrer un nom';
}
if($_POST['prenom']==''){
    $msg2='Vous devez entrer un prénom';
}
if($_POST['mail']==''){
    $msg3='Vous devez entrer une adresse mail';
}
if($_POST['tel']==''){
    $msg4='Vous devez entrer un numero de téléphone';
}
if($_POST['adresse']==''){
    $msg5='Vous devez entrer une adresse';
}
if($_POST['ville']==''){
    $msg6='Vous devez entrer une ville';
}
if($_POST['cp']==''){
    $msg7='Vous devez entrer un code postal';
}
if($_POST['pays']==''){
    $msg8='Vous devez entrer un pays';
}

$msgConcat=$msg1.$msg2.$msg3.$msg4.$msg5.$msg6.$msg7.$msg8;

if($msgConcat==''){
    $ok=true;
}

if($ok){
    if(isset($_POST['id'])){
        $req = $base->prepare("UPDATE `randonneurs`
                            SET
                            `prenom` = :prenom,
                            `nom` = :nom,
                            `tel` = :tel,
                            `mail` = :mail,
                            `adresse` = :adresse,
                            `ville` = :ville,
                            `codepostal` = :codepostal,
                            `pays` = :pays
                             WHERE `randonneurs`.`ID` = :id");
        $req->execute(array(
            'id'=> $_POST['id'],
            'prenom'=> $_POST['prenom'],
            'nom'=> $_POST['nom'],
            'tel'=> $_POST['tel'],
            'mail'=> $_POST['mail'],
            'adresse'=> $_POST['adresse'],
            'ville'=> $_POST['ville'],
            'codepostal'=> $_POST['cp'],
            'pays'=> $_POST['pays'],
        ));
        $req -> closeCursor();
        $message='Informations mises à jour';
        $edit=true;
    }
    else{
        $req = $base->prepare("INSERT INTO `randonneurs` (`ID`, `prenom`, `nom`, `tel`, `mail`, `adresse`, `ville`, `codepostal`, `pays` )
                            VALUES (NULL, :prenom, :nom, :tel, :mail, :adresse, :ville, :codepostal, :pays)");
        $req->execute(array(
            'prenom'=> $_POST['prenom'],
            'nom'=> $_POST['nom'],
            'tel'=> $_POST['tel'],
            'mail'=> $_POST['mail'],
            'adresse'=> $_POST['adresse'],
            'ville'=> $_POST['ville'],
            'codepostal'=> $_POST['cp'],
            'pays'=> $_POST['pays'],
        ));
        $req -> closeCursor();
        $message='Nouveau randonneur ajouté';
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
        'msg8' => $msg8,
        )
    );

