<?php

session_start();

if (!$_SESSION["language"]) {

    header("Location: index.php"); 
}


$language = $_SESSION["language"];
$range = $_SESSION["range"];




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Amanda Professora de Idiomas</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" class="gradientbg">
        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="#"><img width="100px" src="assets/img/logo.png"></a>
        </nav>
         <!-- Navigation-->
         <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a class="js-scroll-trigger" href="#">Menu</a></li>
                <?php if($_SESSION['role']==1){ ?>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="panel.php">Painel</a></li>
                <?php } ?>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="index.php">Sair</a></li>
            </ul>
        </nav>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="posts.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">MURAL</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=1">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">A1</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <?php if($range>=2) { ?>
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=2">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">A2</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <?php } if($range>=3) { ?>
            </div>
            <div class="row no-gutters">
            <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=3">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">B1</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <?php } if($range>=4) { ?>
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=4">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">B2</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <?php } if($range>=5) { ?>
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=5">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">C1</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>
                    <!-- <?php// } if($range>=6) { ?>
                    <div class="col-lg-4">
                        <a class="portfolio-item" href="content.php?range=6">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">C2</div>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/level-bg<?php //echo "-".$_SESSION['language']; ?>.png" alt="..." />
                        </a>
                    </div>-->
                    <?php } ?> 
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <!-- <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
                    </li>
                </ul> -->
                <p class="whitetext small mb-0">Copyright &copy; <a href="login.php?rl=tc">Amanda Professora de Idiomas 2021</a></p>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Custom scripts for this template-->
        <script src="js/scripts.js"></script>
    </body>
</html>
