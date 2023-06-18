<?php
    session_start();
    include 'connect.php';
    
    $id = $_SESSION['id'];

    if(isset($_POST['cancel'])){
        header("location: ../admin/admin.php?id=".$id);
        exit();
    }

    if(isset($_POST['upload'])){
        $pic = $_FILES['image']['name'];
        $title = $_POST['title'];
        $desc = $_POST['description'];

        if(empty($pic)){
            header("location: ../admin/admin.php?id=".$id);
            exit();
        } else {
            $picture_tmp_name = $_FILES['image']['tmp_name'];
            $picFolder = '../uploads/'.$pic;
            move_uploaded_file($picture_tmp_name, $picFolder);
            mysqli_query($conn, "INSERT INTO upload (title,description,image) VALUES ('$title','$desc','$pic')");
            header('location: ../admin/admin.php?id='.$id);
        }  
    }

    