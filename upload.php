<?php
 include "conf.php";
            if (isset($_POST['submit'])) {
            @$file = $_FILE['file']['name'];
            $picture_filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $so = basename($_FILES["file"]["name"]);
            $sql = "INSERT INTO `exam1`(`src`) VALUES ('$so')";
            $sql2 = "SELECT    `src` FROM `exam1` order by id desc limit 1";
            $query = mysqli_query($conn, $sql);
            $query2 = mysqli_query($conn, $sql2);
            
            if ($query) {
                header("Location:show.php");
            }else{
                echo "query islemir";
            }
        }
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
	move_uploaded_file($_FILES["file"]["tmp_name"] , $target_file);
	header('Location:show.php');
} 
?>