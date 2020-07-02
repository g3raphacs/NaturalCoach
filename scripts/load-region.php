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


    $req = $base->query("SELECT * FROM region");
    $regions = $req->fetchAll();
    $req -> closeCursor();

    $req = $base->prepare("UPDATE `excursions` SET `lieu_debut` = :region WHERE `excursions`.`lieu_debut` IS NULL");
        $req->execute(array(
        'region'=> $regions[0]['ID']
        ));

    $req = $base->prepare("UPDATE `excursions` SET `lieu_fin` = :region WHERE `excursions`.`lieu_fin` IS NULL");
        $req->execute(array(
        'region'=> $regions[0]['ID']
        ));


    if(isset($_POST['search'])){

            $search = "%" . $_POST['search'] . "%";
            $req = $base->prepare("SELECT *
                                    FROM region
                                    WHERE nom LIKE :search
                                    ORDER BY nom");
            $req->execute(array('search'=>$search));

    }

    while ($donnees = $req->fetch()){
        $id=$donnees['ID'];
?>
        <div class="elementBox col-lg-6 col-xl-3">
            <div class="card mb-3 main-card">
                <div class="card-body">
                    <div class="widget-content-left">
                        <div class="card-title"><?php echo $donnees['Nom'];?></span></div>
                        <input name="id" type="hidden" value="<?php echo $id;?>">
                        <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Supprimer?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="Delete(<?php echo $id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="edit-region.php?id=<?php echo $id;?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                    <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $id;?>)"><span class="fas fa-times-circle"></span></button>
                </div>
            </div>
        </div>
<?php } $req->closeCursor(); ?>