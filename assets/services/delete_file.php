<?php 

session_start();

include 'conn.php';

$select_query = "DELETE FROM files
WHERE id=".$_GET['id'];


$result = mysqli_query($con, $select_query);


if ($_SESSION["language"]=="ek") {

    header("Location: ../../portalkid.php");
}else{
    header("Location: ../../portal.php");
}


?>
