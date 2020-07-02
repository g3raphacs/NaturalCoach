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

            $search = "%" . $_POST['search'] . "%";
            $req = $base->prepare("SELECT *
                                    FROM guides
                                    WHERE nom LIKE :search OR prenom LIKE :search
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
                        <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$donnees['prenom']; ?></span></div>
                        <div class="card-subtitle"><?php echo 'Tel. '.$donnees['tel']; ?></div>
                    </div>
                    <input name="id" type="hidden" value="<?php echo $id;?>">
                    <div class="msgInsc alert alert-secondary" role="alert" style="display:none"><strong>Inscrire ?</strong><button class="ml-5 mb-1 btn border-0 btn-success font-weight-bold" onclick="Inscription(<?php echo $ID.','.$id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideInscMsg()">NON</a></div>
                </div>
                <div class="card-footer">
                    <button class="mr-2 btn border-0 btn-outline-success" onclick="clickInscription(<?php echo $id;?>)"><span class="fas fa-user-plus mr-2"></span><strong>Inscrire</strong></button>
                </div>
            </div>
        </div>
<?php } $req->closeCursor(); ?>