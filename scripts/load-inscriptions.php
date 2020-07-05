<?php
    // Connexion à la base de données
    require_once('connect.php');

    if(isset($_POST['id'])){
        $ID=$_POST['id'];

        $req = $base->prepare("SELECT `nom`, `nbre_max` FROM excursions WHERE excursions.ID = :ID");
        $req->execute(array('ID'=>$ID));
        $excursion = $req->fetch();
        $nbreMax = (int)$excursion['nbre_max'];
        $req -> closeCursor();

        $request =  $base->prepare("SELECT COUNT(*) FROM planning_guides WHERE excursion_id = :id");
        $request->execute(array('id'=>$ID));
        $guides = $request->fetch();
        $request -> closeCursor();

        $request =  $base->prepare("SELECT COUNT(*) FROM inscriptions WHERE excursion_id = :id");
        $request->execute(array('id'=>$ID));
        $randonneurs = $request->fetch();
        $randocount = (int)$randonneurs[0];
        $request -> closeCursor();

    }

?>



    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="main-card mb-3 ">
    <div class="card-body"><h5 class="card-title"> <span class="metismenu-icon fas fa-portrait mr-2"></span>Guides participant à l'excursion </h5>
    <a href="inscription-guide.php?id=<?php echo $ID; ?>"><button class="mr-6 ml-6 mb-2 btn-transition btn btn-primary"><strong>Inscrire un guide &nbsp;</strong>&nbsp;<span class="ml-2 metismenu-icon fas fa-portrait"><?php echo ' '.$guides[0].' '; ?></span></button></a>
            <div class="row">

                <?php

                    $req = $base->prepare("SELECT
                                            p.ID as planning_ID,
                                            guides.ID as ID,
                                            guides.nom as nom,
                                            guides.prenom as prenom,
                                            guides.tel as tel
                                        FROM planning_guides as p
                                        INNER JOIN guides ON p.guide_id = guides.ID
                                        WHERE p.excursion_id = :id
                                        ORDER BY nom");
                    $req->execute(array('id'=>$ID));

                    while ($donnees = $req->fetch()){

                ?>
                    <div class="elementBox col-lg-6 col-xl-3">
                        <div class="card mb-3 main-card">
                            <div class="card-body">
                                <div class="widget-content-left">
                                    <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$donnees['prenom']; ?></span></div>
                                    <div class="card-subtitle"><?php echo 'Tel. '.$donnees['tel']; ?></div>
                                </div>
                                <input name="id" type="hidden" value="<?php echo $donnees['ID'];?>">
                                <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Désinscrire ?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="DeleteGuide(<?php echo $ID.','.$donnees['ID'];?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
                            </div>
                        <div class="card-footer">
                            <a href="edit-guide.php?id=<?php echo $donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                            <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $donnees['ID'];?>)"><span class="fas fa-times"></span></button>
                        </div>
                    </div>
            </div>
                <?php } $req->closeCursor(); ?>

        </div>
    </div>

    <div class="main-card mb-3 ">
        <div class="card-body"><h5 class="card-title"> <span class="metismenu-icon fas fa-portrait mr-2"></span>Randonneurs participant à l'excursion </h5>
        <?php if( $randocount < $nbreMax ){?>
            <a href="inscription-randonneur.php?id=<?php echo $ID; ?>"><button class="mr-6 ml-6 mb-2 btn-transition btn btn-primary"><strong>Inscrire un randonneur &nbsp;</strong>&nbsp;<span class="ml-2 metismenu-icon fas fa-hiking"><?php echo ' '.$randocount.'/'.$nbreMax.' '; ?></span></button></a>
        <?php } else{?>
            <p class="text-danger"><strong>Groupe complet &nbsp;</strong>&nbsp;<span class="ml-2 metismenu-icon fas fa-hiking"><?php echo ' '.$randocount.'/'.$nbreMax.' '; ?></span></p>
        <?php }?>
            <div class="row">

                <?php
                    $req = $base->prepare("SELECT
                                            i.ID as inscription_ID,
                                            randonneurs.ID as ID,
                                            randonneurs.nom as nom,
                                            randonneurs.prenom as prenom,
                                            randonneurs.tel as tel,
                                            randonneurs.mail as mail,
                                            randonneurs.adresse as adresse,
                                            randonneurs.ville as ville,
                                            randonneurs.codepostal as codepostal,
                                            randonneurs.pays as pays
                                        FROM inscriptions as i
                                        INNER JOIN randonneurs ON i.randonneur_id = randonneurs.ID
                                        WHERE i.excursion_id = :id
                                        ORDER BY nom");
                    $req->execute(array('id'=>$ID));

                    while ($donnees = $req->fetch()){

                        ?>
                        <div class="elementBox col-lg-6 col-xl-3">
                            <div class="card mb-3 main-card">
                                <div class="card-body">
                                    <div class="widget-content-left">
                                        <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$donnees['prenom']; ?></span></div>
                                        <div class="card-subtitle"><?php echo 'Tel. '.$donnees['tel']; ?></div>
                                    </div>
                                    <div class="collapse" id="<?php echo 'excu-collapse'.$donnees['ID']; ?>">
                                        <p><strong>Email: </strong><span class="text-primary"><a href="mailto:<?php echo $donnees['mail']; ?>"><?php echo $donnees['mail']; ?></a></span></p>
                                        <p><strong>Adresse: </strong><span class="text-primary"><?php echo $donnees['adresse']; ?></span></p>
                                        <p><strong>Ville: </strong><span class="text-primary"><?php echo $donnees['ville']; ?></span></p>
                                        <p><strong>Code Postal: </strong><span class="text-primary"><?php echo $donnees['codepostal']; ?></span></p>
                                        <p><strong>Pays: </strong><span class="text-primary"><?php echo $donnees['pays']; ?></span></p>
                                    </div>
                                    <input name="id" type="hidden" value="<?php echo $donnees['ID'];?>">
                                    <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Désinscrire ?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="DeleteRando(<?php echo $ID.','.$donnees['ID'];?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" data-toggle="collapse" href="<?php echo '#excu-collapse'.$donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-eye"></span></button>
                                    <a href="edit-randonneur.php?id=<?php echo $donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                                    <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $donnees['ID'];?>)"><span class="fas fa-times"></span></button>
                                </div>
                            </div>
                        </div>
                    <?php } $req->closeCursor(); ?>

        </div>
    </div>


</div>