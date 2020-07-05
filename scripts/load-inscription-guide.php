<?php
    // Connexion à la base de données
    require_once('connect.php');


    if(isset($_POST['search']) && isset($_POST['page']) && isset($_POST['maxBricks']) && isset($_POST['mainID'])){
        $ID=$_POST['mainID'];
        $maxBricks=(int)$_POST['maxBricks'];
        $page=(int)$_POST['page'];
        $pageStart=($page-1)*$maxBricks;
        $search = "%" . $_POST['search'] . "%";

        $req = $base->prepare("SELECT
                p.excursion_id as excursion_id,
                g.ID as ID,
                g.nom as nom,
                g.prenom as prenom,
                g.tel as tel
                FROM guides as g
                LEFT JOIN planning_guides as p ON p.guide_id = g.ID
                WHERE nom LIKE :search OR prenom LIKE :search
                ORDER BY nom
                LIMIT :maxBricks OFFSET :pageStart ");
        $req->bindValue('id', $ID, PDO::PARAM_INT);
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
                    <div class="msgInsc alert alert-secondary" role="alert" style="display:none"><strong>Inscrire ?</strong><button class="ml-5 mb-1 btn border-0 btn-success font-weight-bold" onclick="Inscription(<?php echo $ID.','.$id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideInscMsg()">NON</a></div>
                </div>
                <div class="card-footer">
                <?php if($donnees['excursion_id'] === $ID){ ?>
                    <p class="text-secondary m-0"><strong>Déja Inscrit</strong></p>
                    <?php }else{ ?>
                        <button class="mr-2 btn border-0 btn-outline-success" onclick="clickInscription(<?php echo $id;?>)"><span class="fas fa-user-plus mr-2"></span><strong>Inscrire</strong></button>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php } $req->closeCursor(); ?>