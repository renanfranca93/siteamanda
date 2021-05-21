<?php 


include 'conn.php';

$select_query = "UPDATE keys_lg
SET key_lg='".$_POST['key']."'
WHERE id=".$_POST['id'];

// echo $select_query;

$result = mysqli_query($con, $select_query);

header("Location: ../../panel.php");

?>
