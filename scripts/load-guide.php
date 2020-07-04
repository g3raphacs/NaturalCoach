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


    if(isset($_POST['search']) && isset($_POST['page']) && isset($_POST['maxBricks'])){
        $maxBricks=(int)$_POST['maxBricks'];
        $page=(int)$_POST['page'];
        $pageStart=($page-1)*$maxBricks;

        $search = "%" . $_POST['search'] . "%";
        $req = $base->prepare("SELECT *
                                FROM guides
                                WHERE nom LIKE :search OR prenom LIKE :search
                                ORDER BY nom
                                LIMIT :maxBricks OFFSET :pageStart ");
        $req->bindValue('maxBricks', $maxBricks, PDO::PARAM_INT);
        $req->bindValue('pageStart', $pageStart, PDO::PARAM_INT);
        $req->bindValue('search', $search, PDO::PARAM_STR);

        $req->execute();


}

    while ($donnees = $req->fetch()){
        $id=$donnees['ID'];
?>
        <div class="elementBox col-lg-6 col-xl-3">
                <div class="card mb-3 main-card">
                    <div class="card-body">
                        <div class="widget-content-left">
                            <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$donnees['prenom']; ?></span></div>
                            <div class="card-subtitle"><?php echo 'Tel. '.$donnees['tel']; ?></div>
                        </div>
                        <input name="id" type="hidden" value="<?php echo $id;?>">
                        <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Supprimer?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="Delete(<?php echo $id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
                    </div>
                    <div class="card-footer">
                        <a href="edit-guide.php?id=<?php echo $donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                        <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $id;?>)"><span class="fas fa-minus-circle"></span></button>
                    </div>
                </div>
            </div>
<?php } $req->closeCursor(); ?>