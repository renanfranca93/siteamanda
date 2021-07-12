<?php 


include 'conn.php';

$select_query = "UPDATE class
SET pass='".$_POST['password_teacher']."'
WHERE role=1";

// echo $select_query;

$result = mysqli_query($con, $select_query);

header("Location: ../../panel.php");

?>
