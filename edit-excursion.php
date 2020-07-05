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

    <style>
    .app-main__inner{background-color: rgb(60,185,160);}
    .app-theme-white .app-page-title{background-color: rgb(250,250,250);}
    </style>
</head>

<body>

            <!-- Include  -->
            <?php
            require_once('scripts/functions.php');
            require_once('nav.php');
            ?>

            <!-- Req Regions  -->
            <?php
                if (isset($_GET['id'])) {
                    $ID=(int)$_GET['id'];
                } else {
                    header('Location: dashboard.php');
                }

                $req = $base->query("SELECT * FROM region ORDER BY Nom");
                $regions = $req->fetchAll();
                $req -> closeCursor();

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
                                    WHERE e.ID = :ID;
                                    ");
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
                                    <span class="icon-gradient bg-success fas fa-route"></span>
                                </div>
                                <div>
                                    Modifier une excursion
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
                                                <div class="position-relative form-group"><label for="nom" class="">Nom</label><input value="<?php echo $donnees['nom'];?>" name="nom" id="nom" placeholder="Entrez un nom" type="text" class="form-control"></div>
                                                <div id="msg1" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="date_debut" class="">Date de début</label><input value="<?php echo $donnees['date_debut'];?>" name="date_debut" id="date_debut" type="date" class="form-control"></div>
                                                        <div id="msg2" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="date_fin" class="">Date de fin</label><input value="<?php echo $donnees['date_fin'];?>" name="date_fin" id="date_fin" type="date" class="form-control"></div>
                                                        <div id="msg3" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="lieu_depart" class="">Point de départ</label>
                                                            <select name="lieu_depart" id="lieu_depart" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                                <?php
                                                                echo '<option>'.$donnees['depart'].'</option>';
                                                                foreach ($regions as $region) {
                                                                    if($region['Nom']!=$donnees['depart']){
                                                                        echo '<option>'.$region['Nom'].'</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div id="msg4" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="lieu_arrivee" class="">Point d'arrivée'</label>
                                                            <select name="lieu_arrivee" id="lieu_arrivee" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                                <?php
                                                                echo '<option>'.$donnees['arrivee'].'</option>';
                                                                foreach ($regions as $region) {
                                                                    if($region['Nom']!=$donnees['arrivee']){
                                                                        echo '<option>'.$region['Nom'].'</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div id="msg5" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="nbre_max" class="">Maximum de Randonneurs</label><input value="<?php echo $donnees['nbre_max'];?>" name="nbre_max" id="nbre_max" type="number" class="form-control"></div>
                                                        <div id="msg6" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="prix" class="">Prix (euros)</label><input value="<?php echo $donnees['prix'];?>" name="prix" id="prix" type="number" step="0.1" class="form-control"></div>
                                                        <div id="msg7" class="alert alert-danger" role="alert" style="display:none;">Message</div>
                                                    </div>
                                                </div>
                                            <button class="mt-2 btn btn-primary float-right">Mettre à jour</button>
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
    <script type="text/javascript" src="scripts/new-excursion.js"></script>
</body>
</html>
