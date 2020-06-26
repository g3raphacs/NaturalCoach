<?php


        $user;
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $user=$_SESSION['username'];
            require_once('connect.php');
        } else {
            header('Location: index.php');
        }


$ok=false;

$req = $base->prepare("INSERT INTO `guides` (`ID`, `prenom`, `nom`, `tel`) VALUES (NULL, :prenom, :nom, :tel)");
$req->execute(array(
    'prenom'=> $_POST['prenom'],
    'nom'=> $_POST['nom'],
    'tel'=> $_POST['tel'],
));

if($req){
    echo json_encode(
        array('message' => 'success',)
        );
}else{
    echo json_encode(
        array('message' => 'error',)
        );
}
