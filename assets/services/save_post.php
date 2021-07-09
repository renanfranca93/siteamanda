<?php 


include 'conn.php';

// echo "name: ".$_POST['name_file']."</br>";
// echo "name: ".$_POST['language']."</br>";
// echo "name: ".$_POST['level']."</br>";


if (($_FILES['my_file']['name']!="")){

 $target_dir = "files/posts/";
 $file = $_FILES['my_file']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'].date("Ymdhis");
 $ext = $path['extension'];
 $temp_name = $_FILES['my_file']['tmp_name'];
 $path_filename_ext = "../../".$target_dir.$filename.".".$ext;
 $finalpath_file = $target_dir.$filename.".".$ext;
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

if (($_FILES['image']['name']!="")){

    $target_dir_image = "files/posts/";
    $file_image = $_FILES['image']['name'];
    $path_image = pathinfo($file_image);
    $filename_image = $path_image['filename'].date("Ymdhis");
    $ext_image = $path_image['extension'];
    $temp_name_image = $_FILES['image']['tmp_name'];
    $path_filename_ext_image = "../../".$target_dir_image.$filename_image.".".$ext_image;
    $finalpath_image = $target_dir_image.$filename_image.".".$ext_image;
    echo $path_filename_ext_image;
    
   // Check if file already exists
   if (file_exists($path_filename_ext_image)) {
   //  echo "Sorry, file already exists.";
       header("Location: panel.php"); 
    }else{
    move_uploaded_file($temp_name_image,$path_filename_ext_image);
   //  echo "Congratulations! File Uploaded Successfully.";
    }
   }


   if (($_FILES['audio']['name']!="")){

    $target_dir_audio = "files/posts/";
    $file_audio = $_FILES['audio']['name'];
    $path_audio = pathinfo($file_audio);
    $filename_audio = $path_audio['filename'].date("Ymdhis");
    $ext_audio = $path_audio['extension'];
    $temp_name_audio = $_FILES['audio']['tmp_name'];
    $path_filename_ext_audio = "../../".$target_dir_audio.$filename_audio.".".$ext_audio;
    $finalpath_audio = $target_dir_audio.$filename_audio.".".$ext_audio;
   //  echo $path_filename_ext;
    
   // Check if file already exists
   if (file_exists($path_filename_ext_audio)) {
   //  echo "Sorry, file already exists.";
       header("Location: panel.php"); 
    }else{
    move_uploaded_file($temp_name_audio,$path_filename_ext_audio);
   //  echo "Congratulations! File Uploaded Successfully.";
    }
   }




    $select_query = "INSERT INTO mural (class, date, text, link, file_name, file, image, audio) 
VALUES ('".$_POST['class']."','".$_POST['date']."','".$_POST['text']."','".$_POST['link']."','".$_POST['file_name']."', '".$finalpath_file."', '".$finalpath_image."', '".$finalpath_audio."')";


// echo $select_query;

$result = mysqli_query($con, $select_query);

header("Location: ../../panel.php");

?>
