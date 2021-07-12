<?php
include 'assets/services/conn.php';
session_start();

if ($_SESSION["role"]!=1) {
    header("Location: index.php"); 
}


$language = $_SESSION["language"];
$range = $_SESSION["range"];


$resTeacher = mysqli_query($con,"SELECT * FROM class WHERE role = 1");
$rowTeacher = mysqli_fetch_array($resTeacher, MYSQLI_ASSOC);

$teacherPass = $rowTeacher['pass'];


if(isset($_GET['edit'])){

    $resEdit = mysqli_query($con,"SELECT * FROM class WHERE id = ".$_GET['edit']);
    $rowEdit = mysqli_fetch_array($resEdit, MYSQLI_ASSOC);

    $className = $rowEdit['name'];
    $classUsername = $rowEdit['username'];
    $classPass = $rowEdit['pass'];
    $classLanguage = $rowEdit['language'];
    $classLevel = $rowEdit['level'];
    $edit=true;
    $idEdit=$rowEdit['id'];


}else {
    $edit=false;
    $idEdit = 0;
}



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
                <li class="sidebar-nav-item"><a class="js-scroll-trigger" href="posts.php">Mural</a></li>
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
                    <div class="col-lg-6 panel-item ">
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
                        <div class="form-group ">
                            <label for="exampleFormControlFile1">Arquivo da aula</label>
                            <input type="file" class="form-control-file" name="my_file" id="my_file">
                        </div>
                        <div >
                        <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                        </div>
                        </form>
                        </br>
                        </div>
                        <div class="col-lg-6 panel-item ">
                        <h4>Postar no mural</h4>
                        </br>
                        <form action="assets/services/save_post.php" method="POST"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data</label>
                            <input class="form-control" type="date" name="date" value='<?php echo date("Y-m-d") ?>' >
                        </div>
                        <div class="form-group">
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
                                        
                                $sql_classes = "SELECT id, name FROM class where role =0 and status=1"; 
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

                    </div>
                        <div class="col-lg-6 panel-item ">

                        <?php if($edit){
                            echo "<h4>Editar classe</h4>";
                        }else{
                            echo "<h4>Nova classe</h4>";
                        } ?>
                        


                        <form action="assets/services/add_class.php?id=<?php echo $idEdit; ?>&edit=<?php echo $edit; ?>" method="POST"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome</label>
                            <input type="text" class="form-control" name="name_class" <?php if(isset($_GET['edit']))echo "value='".$className."'"; ?> placeholder="Nome da classe">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Username</label>
                            <input type="text" class="form-control" name="username_class" <?php if(isset($_GET['edit']))echo "value='".$classUsername."'"; ?> placeholder="Nome de usuário">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Senha</label>
                            <input type="text" class="form-control" name="pass_class" <?php if(isset($_GET['edit']))echo "value='".$classPass."'"; ?> placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Idioma</label>
                            <select class="form-control" id="language_class" name="language_class" onchange=selectLevelClass()>
                            <option value="en" <?php if(isset($_GET['edit']) && $classLanguage=='en')echo "selected"; ?>>Inglês</option>
                            <option value="ek" <?php if(isset($_GET['edit']) && $classLanguage=='ek')echo "selected"; ?>>Inglês YL</option>
                            <option value="cn" <?php if(isset($_GET['edit']) && $classLanguage=='cn')echo "selected"; ?>>Chinês</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" id="levellabel_class">Nível</label>
                            <select class="form-control" name="level_class" id="level_class">
                            <option value="1" <?php if(isset($_GET['edit']) && $classLevel==1)echo "selected"; ?>>A1</option>
                            <option value="2" <?php if(isset($_GET['edit']) && $classLevel==2)echo "selected"; ?>>A2</option>
                            <option value="3" <?php if(isset($_GET['edit']) && $classLevel==3)echo "selected"; ?>>B1</option>
                            <option value="4" <?php if(isset($_GET['edit']) && $classLevel==4)echo "selected"; ?>>B2</option>
                            <option value="5" <?php if(isset($_GET['edit']) && $classLevel==5)echo "selected"; ?>>C1</option>
                            <option value="6" <?php if(isset($_GET['edit']) && $classLevel==6)echo "selected"; ?>>C2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" id="levelkidlabel_class" class="hidefield">Nível</label>
                            <select class="form-control hidefield" name="levelkid_class" id="levelkid_class">
                            <option value="1" <?php if(isset($_GET['edit']) && $classLevel==1)echo "selected"; ?>>Kids</option>
                            <option value="2" <?php if(isset($_GET['edit']) && $classLevel==2)echo "selected"; ?>>Teens</option>
                            </select>
                        </div>
                        <?php if(isset($_GET['edit']) && $classLanguage=='ek')echo "<script>
                        function execIf(){
                            document.getElementById('level_class').className  = 'form-control hidefield';
                            document.getElementById('levellabel_class').className  = 'hidefield';
                            document.getElementById('levelkid_class').className  = 'form-control';
                            document.getElementById('levelkidlabel_class').className  = '';
                            }
                            
                            execIf();
                        </script>"; ?>
                        <div >
                        <a href="panel.php"><button type="button" class="btn btn-danger btn-sm col-2">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                        </div>
                        </form>


                        </br>
                        </div>
                        <div class="col-lg-6 panel-item ">

                        <h4>Lista de classes</h4>
                        <table class='table'>

                        <?php
                                        
                                $sql_classes = "SELECT id, name FROM class where role =0 and status=1"; 
                                $result_classes = mysqli_query($con, $sql_classes);
                                while ($row_classes = mysqli_fetch_array($result_classes, MYSQLI_ASSOC)) 
                                    {  
                                        echo "<tr><td>".$row_classes['name']."</td><td><a href='panel.php?edit=".$row_classes['id']."'> <i class='fa fa-pencil-alt' aria-hidden='true'></i></a></td><td><a onClick=\"javascript: return confirm('Confirma a exclusão?');\" href='assets/services/delete_class.php?id=".$row_classes['id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                }

                            ?>

                        </table>
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
                    
                    <div class="col-lg-6 panel-item ">
                    <h4>Mudar senha mestre</h4>
                    </br>
                    <form action="assets/services/update_pass.php" method="POST"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="password_teacher" value="<?php echo $teacherPass; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm col-2">Salvar</button>
                    </div>

                        

    
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

         function selectLevelClass(){
             
             if(document.getElementById('language_class').value=='ek'){
                document.getElementById('level_class').className  = "form-control hidefield"
                document.getElementById('levellabel_class').className  = "hidefield"

                document.getElementById('levelkid_class').className  = "form-control"
                document.getElementById('levelkidlabel_class').className  = ""
             }else{
                document.getElementById('level_class').className  = "form-control"
                document.getElementById('levellabel_class').className  = ""

                document.getElementById('levelkid_class').className  = "form-control hidefield"
                document.getElementById('levelkidlabel_class').className  = "hidefield"
             }

         }
        </script>
    </body>
</html>
