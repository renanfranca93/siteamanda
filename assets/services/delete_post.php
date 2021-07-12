<?php 

session_start();

include 'conn.php';

$select_query = "DELETE FROM mural
WHERE id=".$_GET['id'];


$result = mysqli_query($con, $select_query);

    header("Location: ../../posts.php");

?>
