<?php 


include 'conn.php';

// echo "name: ".$_POST['name_file']."</br>";
// echo "name: ".$_POST['language']."</br>";
// echo "name: ".$_POST['level']."</br>";


if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
if($_POST['language']=="en"){
    $target_dir = "files/ingles/";
}else{
    $target_dir = "files/ingles/";
}
 $file = $_FILES['my_file']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'].date("Ymdhis");
 $ext = $path['extension'];
 $temp_name = $_FILES['my_file']['tmp_name'];
 $path_filename_ext = "../../".$target_dir.$filename.".".$ext;
//  echo $path_filename_ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
//  echo "Sorry, file already exists.";
    header("Location: panel.php"); 
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
//  echo "Congratulations! File Uploaded Successfully.";
 }
}

if($_POST['language']!=="ek"){
    $select_query = "INSERT INTO files (name, language, range_lg, file) 
VALUES ('".$_POST['name_file']."','".$_POST['language']."','".$_POST['level']."', '".$target_dir.$filename.".".$ext."')";    
}else{
    $select_query = "INSERT INTO files (name, language, range_lg, file) 
VALUES ('".$_POST['name_file']."','".$_POST['language']."','".$_POST['levelkid']."', '".$target_dir.$filename.".".$ext."')";
}


// echo $select_query;

$result = mysqli_query($con, $select_query);

header("Location: ../../panel.php");

?>
