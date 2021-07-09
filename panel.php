<?php
include 'assets/services/conn.php';
session_start();

if ($_SESSION["role"]!=1) {
    header("Location: index.php"); 
}


$language = $_SESSION["language"];
$range = $_SESSION["range"];

//TEACHER KEY
// $teacher_sql = "SELECT id, key_lg FROM keys_lg WHERE reference = 'teacher'";
// $teacher_exec = mysqli_query($con, $teacher_sql);
// $teacher = mysqli_fetch_array($teacher_exec, MYSQLI_ASSOC);


//INGLES KEYS
// $a1_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'a1' AND language = 'en'";
// $a1_en_exec = mysqli_query($con, $a1_en_sql);
// $a1_en = mysqli_fetch_array($a1_en_exec, MYSQLI_ASSOC);

// $a2_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'a2' AND language = 'en'";
// $a2_en_exec = mysqli_query($con, $a2_en_sql);
// $a2_en = mysqli_fetch_array($a2_en_exec, MYSQLI_ASSOC);

// $b1_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'b1' AND language = 'en'";
// $b1_en_exec = mysqli_query($con, $b1_en_sql);
// $b1_en = mysqli_fetch_array($b1_en_exec, MYSQLI_ASSOC);

// $b2_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'b2' AND language = 'en'";
// $b2_en_exec = mysqli_query($con, $b2_en_sql);
// $b2_en = mysqli_fetch_array($b2_en_exec, MYSQLI_ASSOC);

// $c1_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'c1' AND language = 'en'";
// $c1_en_exec = mysqli_query($con, $c1_en_sql);
// $c1_en = mysqli_fetch_array($c1_en_exec, MYSQLI_ASSOC);

// $c2_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'c2' AND language = 'en'";
// $c2_en_exec = mysqli_query($con, $c2_en_sql);
// $c2_en = mysqli_fetch_array($c2_en_exec, MYSQLI_ASSOC);


//CHINES KEYS
// $a1_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'a1' AND language = 'cn'";
// $a1_cn_exec = mysqli_query($con, $a1_cn_sql);
// $a1_cn = mysqli_fetch_array($a1_cn_exec, MYSQLI_ASSOC);

// $a2_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'a2' AND language = 'cn'";
// $a2_cn_exec = mysqli_query($con, $a2_cn_sql);
// $a2_cn = mysqli_fetch_array($a2_cn_exec, MYSQLI_ASSOC);

// $b1_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'b1' AND language = 'cn'";
// $b1_cn_exec = mysqli_query($con, $b1_cn_sql);
// $b1_cn = mysqli_fetch_array($b1_cn_exec, MYSQLI_ASSOC);

// $b2_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'b2' AND language = 'cn'";
// $b2_cn_exec = mysqli_query($con, $b2_cn_sql);
// $b2_cn = mysqli_fetch_array($b2_cn_exec, MYSQLI_ASSOC);

// $c1_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'c1' AND language = 'cn'";
// $c1_cn_exec = mysqli_query($con, $c1_cn_sql);
// $c1_cn = mysqli_fetch_array($c1_cn_exec, MYSQLI_ASSOC);

// $c2_cn_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'c2' AND language = 'cn'";
// $c2_cn_exec = mysqli_query($con, $c2_cn_sql);
// $c2_cn = mysqli_fetch_array($c2_cn_exec, MYSQLI_ASSOC);


//YL KEYS
// $kids_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'kids' AND language = 'ek'";
// $kids_en_exec = mysqli_query($con, $kids_en_sql);
// $kids_en = mysqli_fetch_array($kids_en_exec, MYSQLI_ASSOC);

// $teens_en_sql = "SELECT id, key_lg FROM keys_lg WHERE level = 'teens' AND language = 'ek'";
// $teens_en_exec = mysqli_query($con, $teens_en_sql);
// $teens_en = mysqli_fetch_array($teens_en_exec, MYSQLI_ASSOC);

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
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="assets/services/set_language.php?lg=en">Inglês</a></li>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="assets/services/set_language.php?lg=ek">Inglês YL</a></li>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="assets/services/set_language.php?lg=cn">Chinês</a></li>
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="index.php">Sair</a></li>
            </ul>
        </nav>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container">
                <div class="row no-gutters contentFinal">
                    <div class="col-lg-6 panel-item">
                    <h4>Subir arquivo</h4>
                    </br>
                    <form action="assets/services/save_file.php" method="POST"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome</label>
                            <input type="text" class="form-control" name="name_file" placeholder="Nome da aula/arquivo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Idioma</label>
                            <select class="form-control" id="language" name="language" onchange=selectLevel()>
                            <option value="en">Inglês</option>
                            <option value="ek">Inglês YL</option>
                            <option value="cn">Chinês</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" id="levellabel">Nível</label>
                            <select class="form-control" name="level" id="level">
                            <option value="1">A1</option>
                            <option value="2">A2</option>
                            <option value="3">B1</option>
                            <option value="4">B2</option>
                            <option value="5">C1</option>
                            <option value="6">C2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" id="levelkidlabel" class="hidefield">Nível</label>
                            <select class="form-control hidefield" name="levelkid" id="levelkid">
                            <option value="1">Kids</option>
                            <option value="2">Teens</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Arquivo da aula</label>
                            <input type="file" class="form-control-file" name="my_file" id="my_file">
                        </div>
                        <div >
                        <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                        </div>
                        </form>
                        </br>
                        <h4>Chave de segurança Teacher</h4>
                        </br>
                        <!-- <form class="form-inline" action="assets/services/update_key.php" method="POST">

                        <div class="form-group col-2">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Teacher">
                            </div>
                            <div class="form-group col-8">
                                <input type="hidden" name="id" value=<?php echo $teacher['id']; ?>> 
                                <input type="text" class="form-control" name="key" value=<?php echo $teacher['key_lg']; ?>>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                        </form> -->
                    </div>
                    <div class="col-lg-6 panel-item">
                        <h4>Postar no mural</h4>
                        </br>
                        <form action="assets/services/save_post.php" method="POST"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="hidden" name="date" value='<?php echo date("Y-m-d") ?>' >
                            <label for="exampleFormControlInput1">Texto (Digite // para pular de linha)</label>
                            <!-- <input type="text" class="form-control" name="text" placeholder="Fale algo..."> -->
                            <textarea class="form-control" name="text" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Youtube link</label>
                            <input type="text" class="form-control" name="link" placeholder="Link do vídeo do YouTube">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Classe</label>
                            <select class="form-control" id="class" name="class" required>
                            <option value="">Selecione</option>
                            <?php
                                        
                                $sql_classes = "SELECT id, name FROM class where role =0"; 
                                $result_classes = mysqli_query($con, $sql_classes);
                                while ($row_classes = mysqli_fetch_array($result_classes, MYSQLI_ASSOC)) 
                                    {  
                                        echo "<option value=".$row_classes['id'].">".$row_classes['name']."</option>";
                                }

                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome do arquivo</label>
                            <input type="text" class="form-control" name="file_name" placeholder="Nome do arquivo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Arquivo</label>
                            <input type="file" class="form-control-file" name="my_file" id="my_file">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagem</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Áudio</label>
                            <input type="file" class="form-control-file" name="audio" id="audio">
                        </div>

                        <div >
                        <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                        </div>

                        
                        </form>


                        
                            </br>
                            </br>

                            <h4>Chaves de segurança CH</h4>
                        </br>

                        
</br>
                        <h4>Chaves de segurança YL</h4>
                        </br>

                        

    
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

        <script>
         function selectLevel(){
             
             if(document.getElementById('language').value=='ek'){
                document.getElementById('level').className  = "form-control hidefield"
                document.getElementById('levellabel').className  = "hidefield"

                document.getElementById('levelkid').className  = "form-control"
                document.getElementById('levelkidlabel').className  = ""
             }else{
                document.getElementById('level').className  = "form-control"
                document.getElementById('levellabel').className  = ""

                document.getElementById('levelkid').className  = "form-control hidefield"
                document.getElementById('levelkidlabel').className  = "hidefield"
             }

         }
        </script>
    </body>
</html>
