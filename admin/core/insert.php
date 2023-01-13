<?php
ob_start();
include('../inc/connection.php');

// Category Insert

if(isset($_POST['add_category'])){
    $name       = $_POST['cat_name'];
    $is_parent  = $_POST['is_parent'];
    $file_name  = $_FILES['myFile']['name'];
    $tmp_name  = $_FILES['myFile']['tmp_name'];
    $file_size  = $_FILES['myFile']['size'];

    $mb_file_size = $file_size/(1024*1024);

    if($mb_file_size > 10){
        echo 'Maximum File Size is 1 MB';
    }

    $splited_files = explode('.', $file_name);
    $extn = strtolower(end($splited_files));
    $extension = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($extn,$extension) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/'.$update_name);
            $cat_insert = "INSERT INTO mart_category (e_name,e_image,is_parent,c_status) VALUE ('$name','$update_name', '$is_parent', '1')";
            $cat_insert_res = mysqli_query($db,$cat_insert);

            if($cat_insert_res){
                header('location: ../category.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'warning ! Please upload an image file (jpg, png, jpeg)';
        }
    }else{
        $cat_insert = "INSERT INTO mart_category (e_name,is_parent,c_status) VALUE ('$name', '$is_parent', '1')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../category.php');
        }else{
            die('Category Insert Error!'.mysqli_error($db));
        }
    }
    
    
}


if(isset($_GET['id'])){
    $del_id = $_GET['id'];

    $cat_del = "DELETE FROM mart_category WHERE id='$del_id'";
    $cat_del_res = mysqli_query($db,$cat_del);

    if($cat_del_res){
        header('location: category.php');
    }else{
        echo 'Delete Error!';
    }
}



ob_end_flush();