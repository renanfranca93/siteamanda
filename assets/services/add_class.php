<?php 


include 'conn.php';

if($_GET['edit']){

    if($_POST['language_class']!=="ek"){

    $select_query = "UPDATE class
    SET name='".$_POST['name_class']."', 
    username='".$_POST['username_class']."',
    pass='".$_POST['pass_class']."',
    language='".$_POST['language_class']."',
    level='".$_POST['level_class']."'
    WHERE id=".$_GET['id'];
}else{
    $select_query = "UPDATE class
    SET name='".$_POST['name_class']."', 
    username='".$_POST['username_class']."',
    pass='".$_POST['pass_class']."',
    language='".$_POST['language_class']."',
    level='".$_POST['levelkid_class']."'
    WHERE id=".$_GET['id'];
}
    
    
}else{
    if($_POST['language_class']!=="ek"){
        $select_query = "INSERT INTO class (name, username, pass, language, level, status, role) 
        VALUES ('".$_POST['name_class']."','".$_POST['username_class']."','".$_POST['pass_class']."','".$_POST['language_class']."','".$_POST['level_class']."',1,0)";    
    }else{
        $select_query = "INSERT INTO class (name, username, pass, language, level, status, role) 
        VALUES ('".$_POST['name_class']."','".$_POST['username_class']."','".$_POST['pass_class']."','".$_POST['language_class']."','".$_POST['levelkid_class']."','1','0')";    
    }
}




// echo $select_query;

$result = mysqli_query($con, $select_query);

header("Location: ../../panel.php");

?>
