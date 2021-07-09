<?php
include 'assets/services/conn.php';
session_start();

if (!$_SESSION["language"]) {

    header("Location: index.php"); 
}


$class = $_SESSION["class"];



$select_query = "SELECT * FROM mural WHERE class = ".$class." ORDER BY ID DESC";
// echo $select_query;

    $executed = mysqli_query($con, $select_query);

    // $result = mysqli_fetch_array($executed, MYSQLI_ASSOC);


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
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="portal.php">Níveis</a></li>
                <?php if($_SESSION['reference']=='teacher'){ ?>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="panel.php">Painel</a></li>
                <?php } ?>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="index.php">Sair</a></li>
            </ul>
        </nav>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container">
                <div class="row no-gutters contentFinal">
                
                <ul>
                <h3>Mural</h3>

                <?php 
                    while ($row = mysqli_fetch_array($executed, MYSQLI_ASSOC)) {
                        // if($_SESSION['role']==1){
                        //     echo "<li><a target='new' href='".$row['text']."'>".$row['name']."</a> - <a onClick=\"javascript: return confirm('Confirma a exclusão?');\" href='assets/services/delete_file.php?id=".$row['id']."'>Excluir</a></li>";    
                        // }else{
                        //     echo "<li><a target='new' href='".$row['text']."'>".$row['name']."</a> </li>";
                        // }

                        $link = str_replace("youtu.be","youtube.com/embed",$row['link']);
                        $text = str_replace("//","</br>",$row['text']);

                        echo "<strong> Post ".date("d/m/Y", strtotime($row['date']))." </strong>";
                        echo "</br>";
                        echo $text;
                        if(!empty($row['link'])){
                            echo "</br></br>";
                            echo "<iframe width='560' height='315' src='".$link."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                        }
                        if(!empty($row['audio'])){
                            echo "</br></br> Áudio:</br>";
                            echo "<audio controls><source src='".$row['audio']."' type='audio/mpeg'></audio>";
                        }
                        if(!empty($row['image'])){
                        echo "</br></br>";
                        echo "<img src='".$row['image']."' width='560px'>";
                        }
                        if(!empty($row['file'])){
                        echo "</br></br>";
                        echo "<a href='".$row['file']."'>Baixar ".$row['file_name']."</a>";
                        }
                        echo "<hr>";
                        
                    }
                
                ?>
                </ul>
                </div>
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
