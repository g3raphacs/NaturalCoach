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

    <?php
        $user;
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $user=$_SESSION['username'];
            require_once('scripts/connect.php');
        } else {
            header('Location: index.php');
        }
    ?>

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
                                    <i class="icon-gradient bg-success fas fa-route"></i>
                                </div>
                                <div>Gestion des excursions
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->

                    <div class="">
                        <div class="row">

                                    <?php
                                        $req = $base->query("SELECT * FROM region");
                                        $regions = $req->fetchAll();
                                        $req -> closeCursor();


                                        $req = $base->query("SELECT * FROM `excursions` ORDER BY `date_debut`");
                                        while ($donnees = $req->fetch()){
                                            $id=$donnees['ID'];
                                            $id_debut=$donnees['lieu_debut'];
                                            $id_fin=$donnees['lieu_fin'];
                                            foreach ($regions as $region) {
                                                if($region['ID']==$id_debut){
                                                    $lieu_debut=$region['Nom'];
                                                }
                                                if($region['ID']==$id_fin){
                                                    $lieu_fin=$region['Nom'];
                                                }
                                            }

                                            $request =  $base->query("SELECT COUNT(*) FROM planning_guides WHERE excursion_id = $id");
                                            $guides = $request->fetch();
                                            $request -> closeCursor();

                                            $request =  $base->query("SELECT COUNT(*) FROM inscriptions WHERE excursion_id = $id");
                                            $randonneurs = $request->fetch();
                                            $request -> closeCursor();
                                    ?>
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card mb-3 main-card">
                                                <div class="card-body">
                                                    <div class="widget-content-left">
                                                        <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$randonneurs[0].'/'.$donnees['nbre_max'].' '; ?><i class="metismenu-icon fas fa-hiking"></i></span></div>
                                                        <div class="card-subtitle"><?php echo 'du '.dateFR($donnees['date_debut']).' au '.dateFR($donnees['date_fin']); ?></div>
                                                    </div>
                                                    <div class="collapse" id="<?php echo 'excu-collapse'.$donnees['ID']; ?>">
                                                        <p><strong>Depart: </strong><span class="text-primary"><?php echo $lieu_debut; ?></span></p>
                                                        <p><strong>Arrivée: </strong><span class="text-primary"><?php echo $lieu_fin; ?></span></p>
                                                        <p><strong>Guides: </strong><span class="text-primary"><?php echo $guides[0]; ?></span></p>
                                                        <p><strong>Prix: </strong><span class="text-primary"><?php echo $donnees['prix'].' euros'; ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" data-toggle="collapse" href="<?php echo '#excu-collapse'.$donnees['ID']; ?>" class="mr-2 btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                    <button class="mr-2 btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                    <button class="mr-2 btn btn-outline-danger"><i class="fas fa-minus-circle"></i></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } $req->closeCursor(); ?>

                                    <!-- <div class="card-body">
                                        <div class="widget-content-left">
                                            <div class="card-title">Randonnée du test <span class="text-primary">3/8</span></div>
                                            <div class="card-subtitle">du 20/06/2020 au 26/06/2020</div>
                                        </div>
                                        <div class="collapse" id="collapseExample121">
                                            <p><strong>Depart: </strong><span class="text-primary">placeholder</span></p>
                                            <p><strong>Arrivée: </strong><span class="text-primary">placeholder</span></p>
                                            <p><strong>Guides: </strong><span class="text-primary">placeholder</span></p>
                                            <p><strong>Prix: </strong><span class="text-primary">placeholder</span></p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" data-toggle="collapse" href="#collapseExample121" class="mr-2 btnbtn-outline-success"><i class="fas fa-eye"></i></button>
                                        <button class="mr-2 btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                        <button class="mr-2 btn btn-outline-danger"><i class="fas fa-minus-circle"></i></i></button>
                                    </div> -->
                                
                            

                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
