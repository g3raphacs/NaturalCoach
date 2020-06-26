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
                                    <span class="icon-gradient bg-success fas fa-portrait"></span>
                                </div>
                                <div>
                                    Gestion des guides
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->

                    <!-- Search Bar<<________________________________________  -->
                    <div class="tab-content">
                        <form class="">
                            <div class="position-relative form-group"><input name="address" id="search" placeholder="&#xF002; Rechercher" style="font-family:Arial, Font Awesome\ 5 Free" type="text"class="form-control"></div>
                        </form>
                    </div>
                    <!-- Search Bar>>________________________________________  -->


                    <div class="">
                        <div class="row">

                                    <?php

                                        $req = $base->query("SELECT *
                                                            FROM guides ORDER BY nom");

                                        while ($donnees = $req->fetch()){
                                            $id=$donnees['ID'];

                                    ?>
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card mb-3 main-card">
                                                <div class="card-body">
                                                    <div class="widget-content-left">
                                                        <div class="card-title"><?php echo $donnees['nom']; ?><span class="text-primary"><?php echo ' '.$donnees['prenom']; ?></span></div>
                                                        <div class="card-subtitle"><?php echo 'Tel. '.$donnees['tel']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="edit-guide.php?id=<?php echo $donnees['ID']; ?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
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
