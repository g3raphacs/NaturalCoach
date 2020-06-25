<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Natural Coach - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Natural Coach - Panneau de controle pour la gestion des excursions">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="./assets/images/favicon.png" />
    <link rel="stylesheet" href="./main.css">
    <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
</head>

<body>
            <!-- Include  -->
            <?php
            require_once('scripts/functions.php');
            require_once('nav.php');
            ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <!-- Titre<<________________________________________  -->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <span class="icon-gradient bg-success fas fa-route"></span>
                                </div>
                                <div>
                                    Gestion des excursions
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->

                    <!-- Search Bar<<________________________________________  -->
                    <div class="tab-content">
                        <form class="">
                            <div class="position-relative form-group"><input name="address" id="search" placeholder="&#xF002; Search" style="font-family:Arial, Font Awesome\ 5 Free" type="text"class="form-control"></div>
                        </form>
                    </div>
                    <!-- Search Bar>>________________________________________  -->


                    <div class="">
                        <div class="row">

                                    <?php
                                        $req = $base->query("SELECT * FROM region");
                                        $regions = $req->fetchAll();
                                        $req -> closeCursor();


                                        $req = $base->query("SELECT
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
                                                            INNER JOIN region region2 ON e.lieu_fin = region2.ID");

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
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card mb-3 main-card">
                                                <div class="card-body">
                                                    <div class="widget-content-left">
                                                        <div class="card-title"><?php echo $donnees['nom']; ?></div>
                                                        <div class="card-subtitle"><?php echo 'du '.dateFR($donnees['date_debut']).' au '.dateFR($donnees['date_fin']); ?></div>
                                                        <button class="mr-2 mb-2 btn-transition btn btn-outline-primary">Inscriptions <?php echo ' '.$randonneurs[0].'/'.$donnees['nbre_max'].' '; ?><span class="metismenu-icon fas fa-hiking"></button>
                                                    </div>
                                                    <div class="collapse" id="<?php echo 'excu-collapse'.$donnees['ID']; ?>">
                                                        <p><strong>Depart: </strong><span class="text-primary"><?php echo $donnees['depart']; ?></span></p>
                                                        <p><strong>Arrivée: </strong><span class="text-primary"><?php echo $donnees['arrivee']; ?></span></p>
                                                        <p><strong>Guides: </strong><span class="text-primary"><?php echo $guides[0]; ?></span></p>
                                                        <p><strong>Prix: </strong><span class="text-primary"><?php echo $donnees['prix'].' euros'; ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" data-toggle="collapse" href="<?php echo '#excu-collapse'.$donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-eye"></span></button>
                                                    <button class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></button>
                                                    <button class="mr-2 btn border-0 btn-outline-danger"><span class="fas fa-minus-circle"></span></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } $req->closeCursor(); ?>


                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
