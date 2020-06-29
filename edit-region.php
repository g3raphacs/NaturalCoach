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
</head>

<body>

            <!-- Include  -->
            <?php
            require_once('scripts/functions.php');
            require_once('nav.php');
            ?>

            <?php
                if (isset($_GET['id'])) {
                    $ID=(int)$_GET['id'];
                    var_dump($ID);
                } else {
                    header('Location: regions.php');
                }

                $req = $base->prepare("SELECT * FROM region as g WHERE g.ID = :ID");
                $req->execute(array('ID'=>$ID));
                $donnees = $req->fetch();
                $req -> closeCursor();
            ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <!-- Titre<<________________________________________  -->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <span class="icon-gradient bg-success fas fa-map-marker-alt"></span>
                                </div>
                                <div>
                                    Modifier une région
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->
                    <div id="message" class="alert alert-success" role="alert" style="display:none;">Message</div>
                    <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Editer</h5>
                                        <form id="form" class="">
                                            <input name="id" type="hidden" value="<?php echo $ID;?>">
                                            <div class="position-relative form-group"><label for="nom" class="">Nom</label><input value="<?php echo $donnees['Nom'];?>" name="nom" id="nom" type="text" placeholder="Entrez un nom" class="form-control"></div>
                                            <div id="msg1" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                            <button class="mt-2 btn btn-primary">Mettre à jour</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>






                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script type="text/javascript" src="scripts/new-region.js"></script>
</body>
</html>
