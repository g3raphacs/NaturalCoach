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

    function dateFR($date){
        $date = explode('-',$date);
        return ($date[2].'/'.$date[1].'/'.$date[0]);
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


    if(isset($_POST['search']) && isset($_POST['page']) && isset($_POST['maxBricks'])){
        $maxBricks=(int)$_POST['maxBricks'];
        $page=(int)$_POST['page'];
        $pageStart=($page-1)*$maxBricks;
            $search = "%" . $_POST['search'] . "%";
            $req = $base->prepare("SELECT
                            e.ID,
                            e.nom,
                            e.date_debut,
                            e.date_fin,
                            e.nbre_max,
                            e.prix,
                            region1.Nom as depart,
                            region2.Nom as arrivee
                        FROM excursions as e
                        INNER JOIN region region1 ON e.lieu_debut = region1.ID
                        INNER JOIN region region2 ON e.lieu_fin = region2.ID
                        WHERE e.nom LIKE :search
                        ORDER BY nom
                        LIMIT :maxBricks OFFSET :pageStart ");
            $req->bindValue('maxBricks', $maxBricks, PDO::PARAM_INT);
            $req->bindValue('pageStart', $pageStart, PDO::PARAM_INT);
            $req->bindValue('search', $search, PDO::PARAM_STR);
            $req->execute();

    }

    while ($donnees = $req->fetch()){
        $id=$donnees['ID'];


        $request =  $base->prepare("SELECT COUNT(*) FROM planning_guides WHERE excursion_id = :id");
        $request->execute(array('id'=>$id));
        $guides = $request->fetch();
        $request -> closeCursor();

        $request =  $base->prepare("SELECT COUNT(*) FROM inscriptions WHERE excursion_id = :id");
        $request->execute(array('id'=>$id));
        $randonneurs = $request->fetch();
        $request -> closeCursor();
?>
    <div class="elementBox col-lg-6 col-xl-3">
        <div class="card mb-3 main-card">
            <div class="card-body">
                <div class="widget-content-left">
                    <div class="card-title"><?php echo $donnees['nom']; ?></div>
                    <div class="card-subtitle"><?php echo 'du '.dateFR($donnees['date_debut']).' au '.dateFR($donnees['date_fin']); ?></div>
                    <a href="inscription.php?id=<?php echo $donnees['ID']; ?>"><button class="mr-6 ml-6 mb-2 btn-transition btn btn-primary"><strong>Inscriptions &nbsp;</strong><span class="ml-2 metismenu-icon fas fa-hiking"><?php echo ' '.$randonneurs[0].'/'.$donnees['nbre_max'].' '; ?></span>&nbsp;<span class="ml-2 metismenu-icon fas fa-portrait"><?php echo ' '.$guides[0].' '; ?></span></button></a>
                </div>
                <div class="collapse" id="<?php echo 'excu-collapse'.$donnees['ID']; ?>">
                    <p><strong>Depart: </strong><span class="text-primary"><?php echo $donnees['depart']; ?></span></p>
                    <p><strong>Arrivée: </strong><span class="text-primary"><?php echo $donnees['arrivee']; ?></span></p>
                    <p><strong>Prix: </strong><span class="text-primary"><?php echo $donnees['prix'].' euros'; ?></span></p>
                </div>
                <input name="id" type="hidden" value="<?php echo $id;?>">
                <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Supprimer?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="Delete(<?php echo $id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
            </div>
            <div class="card-footer">
                <button type="button" data-toggle="collapse" href="<?php echo '#excu-collapse'.$donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-eye"></span></button>
                <a href="edit-excursion.php?id=<?php echo $donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $id;?>)"><span class="fas fa-times-circle"></span></button>
            </div>
        </div>
    </div>
<?php } $req->closeCursor(); ?>