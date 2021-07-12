<?php 

session_start();

include 'conn.php';


$select_query = "UPDATE class
    SET status=0
    WHERE id=".$_GET['id'];


$result = mysqli_query($con, $select_query);


    header("Location: ../../panel.php");


?>
