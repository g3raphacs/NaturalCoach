<?php
    // Connexion à la base de données
    $dsn = 'mysql:dbname=projet_rando;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $base = new PDO($dsn, $user, $password);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        header('Location: errorbdd.php');
    }



    if(isset($_POST['search'])){

            $search= str_replace('"', '',$_POST['search']);
            $search = "%" . $search . "%";
            $req = $base->prepare("SELECT COUNT(*)
                                    FROM guides
                                    WHERE nom LIKE :search OR prenom LIKE :search");
            $req->execute(array('search'=>$search));
            $request = $req->fetch();
            $count = $request['0'];

    }
echo json_encode(array('count'=>$count));