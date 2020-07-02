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
                } else {
                    header('Location: dashboard.php');
                }

                $req = $base->prepare("SELECT `nom`, `nbre_max` FROM excursions WHERE excursions.ID = :ID");
                $req->execute(array('ID'=>$ID));
                $excursion = $req->fetch();
                $titre = $excursion['nom'];
                $req -> closeCursor();
            ?>
            <input id="mainID" name="mainID" type="hidden" value="<?php echo $ID;?>">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <!-- Titre<<________________________________________  -->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <span class="icon-gradient bg-success fas fa-pencil-alt"></span>
                                </div>
                                <div>
                                    <?php echo 'Inscriptions à <strong>'.$titre.'</strong>'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->
                        <div id="message" class="alert alert-success" role="alert" style="display:none;">Message</div>
                        <div id="contentBox" class="tab-content">

                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script type="text/javascript" src="scripts/load-inscriptions.js"></script>
</body>
</html>
