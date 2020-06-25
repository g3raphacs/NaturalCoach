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

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="fas fa-bars"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>

                            <a href="index.php" class="mr-3 btn-outline-secondary btn"><span class="fas fa-sign-out-alt"></span></a>

                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right text-center">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left  ml-3 mr-3 ">
                                    <div class="widget-heading">
                                        <?php echo 'Utilisateur: '.$_SESSION['username']; ?>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <a href="index.php" class="mr-3 btn-outline-secondary btn"><span class="fas fa-sign-out-alt"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav" data-class="closed-mobile-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Gestion</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-route"></i>
                                    Excursions
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="metismenu-icon">
                                            </i>Gérer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="new-excursion.php">
                                            <i class="metismenu-icon">
                                            </i>Ajouter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon">
                                            </i>Archives
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-map-marker-alt"></i>
                                    Régions
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="regions.php">
                                            <i class="metismenu-icon">
                                            </i>Gérer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-dropdowns.html">
                                            <i class="metismenu-icon">
                                            </i>Ajouter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon">
                                            </i>Archives
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-portrait"></i>
                                    Guides
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="guides.php">
                                            <i class="metismenu-icon">
                                            </i>Gérer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="new-guide.php">
                                            <i class="metismenu-icon">
                                            </i>Ajouter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon">
                                            </i>Archives
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fas fa-hiking"></i>
                                    Randonneurs
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="randonneurs.php">
                                            <i class="metismenu-icon">
                                            </i>Gérer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="new-randonneur.php">
                                            <i class="metismenu-icon">
                                            </i>Ajouter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon">
                                            </i>Archives
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>