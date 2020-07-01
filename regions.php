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
                                    Gestion des regions
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Titre>>________________________________________  -->

                    <!-- Search Bar et Pagination<<________________________________________  -->
                    <div class="row">
                                <div class="col-lg-10 tab-content">
                                    <form class="">
                                        <div class="position-relative form-group"><input name="address" id="search" placeholder="&#xF002; Rechercher" style="font-family:Arial, Font Awesome\ 5 Free" type="text"class="form-control"></div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <nav class="" aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                            <li class="page-item active"><a href="javascript:void(0);" class="page-link">1</a></li>
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link">2</a></li>
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link">3</a></li>
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link">4</a></li>
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link">5</a></li>
                                            <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                    <!-- Search Bar et Pagination>>________________________________________  -->


                    <div class="">
                    <div id="message" class="alert alert-success" role="alert" style="display:none;">Message</div>
                        <div class="row">
                                <?php
                                    $req = $base->query("SELECT *
                                                        FROM region ORDER BY nom");
                                    while ($donnees = $req->fetch()){
                                        $id=$donnees['ID'];
                                ?>
                                    <div class="elementBox col-lg-6 col-xl-3">
                                        <div class="card mb-3 main-card">
                                            <div class="card-body">
                                                <div class="widget-content-left">
                                                    <div class="card-title"><?php echo $donnees['Nom'];?></span></div>
                                                        <input name="id" type="hidden" value="<?php echo $id;?>">
                                                        <div class="msgDel alert alert-secondary" role="alert" style="display:none"><strong>Supprimer?</strong><button class="ml-5 mb-1 btn border-0 btn-danger font-weight-bold" onclick="Delete(<?php echo $id;?>)">OUI</button><a href="#" class="ml-2 mb-1 btn border-0 btn-secondary font-weight-bold" onclick="hideDelMsg()">NON</a></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="edit-region.php?id=<?php echo $id;?>" class="mr-2 btn border-0 btn-outline-secondary"><span class="fas fa-edit"></span></a>
                                                <button class="mr-2 btn border-0 btn-outline-danger" onclick="clickDelete(<?php echo $id;?>)"><span class="fas fa-minus-circle"></span></button>
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
    <script type="text/javascript" src="scripts/del-region.js"></script>
</body>
</html>
