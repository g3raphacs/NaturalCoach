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
                                    <span class="icon-gradient bg-success fas fa-hiking"></span>
                                </div>
                                <div>
                                    Ajouter un randonneur
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->

                    <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Nouveau randonneur</h5>
                                        <form class="">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="nom" class="">Nom</label><input name="nom" id="nom" type="text" placeholder="Entrez un nom" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="prenom" class="">Prénom</label><input name="prenom" id="prenom" type="text" placeholder="Entrez un prénom" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="mail" class="">Email</label><input name="mail" id="mail" type="email" placeholder="Entrez une adresse mail" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="tel" class="">Téléphone</label><input name="tel" id="tel" type="phone" placeholder="+33 6 00 00 00 00" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group"><label for="adresse" class="">Adresse</label><input name="adresse" id="adresse" type="text" placeholder="Entrez une adresse" class="form-control"></div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="ville" class="">Ville</label><input name="ville" id="ville" type="text" placeholder="Entrez une ville" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="cp" class="">Code postal</label><input name="cp" id="cp" type="text" placeholder="Entrez un code postal" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="pays" class="">Pays</label><input name="pays" id="pays" type="text" placeholder="Entrez un pays" class="form-control"></div>
                                                    </div>
                                                </div>
                                            <button class="mt-2 btn btn-primary">Ajouter</button>
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
</body>
</html>
