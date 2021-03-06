<!doctype html>
<html lang="en">
<!-- test -->
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

                    <!-- Search Bar et Pagination<<________________________________________  -->
                    <div class="row">
                                <div id="searchBox" class="col-lg-10 tab-content">
                                    <form class="">
                                        <div class="position-relative form-group"><input name="address" id="search" placeholder="&#xF002; Rechercher" style="font-family:Arial, Font Awesome\ 5 Free" type="text"class="form-control"></div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <nav class="" aria-label="Page navigation example">
                                        <ul id="pages" class="pagination flex-wrap">
                                            <!-- Pagination ici  -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                    <!-- Search Bar et Pagination>>________________________________________  -->


                    <div class="">
                    <div id="message" class="alert alert-success" role="alert" style="display:none;">Message</div>
                        <div id="contentBox" class="row">

                        <!-- CONTENU ICI  -->

                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script type="text/javascript" src="scripts/load-guide.js"></script>
</body>
</html>
