<?php 

session_start();

$_SESSION["language"] = $_GET['lg'];

if($_SESSION['language']=="ek"){
    header("Location: ../../portalkid.php");
}else{
    header("Location: ../../portal.php");
}

?>
