<?php
    // Connexion à la base de données
    require_once('connect.php');



    if(isset($_POST['search'])){

        $search= str_replace('"', '',$_POST['search']);
        $search = "%" . $search . "%";
        $req = $base->prepare("SELECT COUNT(*)
                                FROM excursions
                                WHERE nom LIKE :search");
        $req->execute(array('search'=>$search));
        $request = $req->fetch();
        $count = $request['0'];

}
echo json_encode(array('count'=>$count));