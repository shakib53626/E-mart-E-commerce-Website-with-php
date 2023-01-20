<?php
include('../inc/connection.php');


// Category Form insert Code here--------------
if(isset($_POST['add_category'])){
    $cat_name   = $_POST['cat_name'];
    $is_parent  = $_POST['is_parent'];
    $cat_status = $_POST['cat_status'];
    $file_name  = $_FILES['choose_file']['name'];
    $tmp_name  = $_FILES['choose_file']['tmp_name'];
    $file_size  = $_FILES['choose_file']['size'];

    $mb_file_size = $file_size/(1024*1024);

    if($mb_file_size > 1){
        echo 'Warning! Maximum File Size 1MB';
    }


    $extn = explode('.', $file_name);
    $file_extn = strtolower(end($extn));

    $extensions = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/'.$update_name);
            $cat_insert = "INSERT INTO mart_category (cat_name,cat_img,is_parent,cat_status) VALUES ('$cat_name','$update_name', '$is_parent', '$cat_status')";
            $cat_insert_res = mysqli_query($db,$cat_insert);
    
            if($cat_insert_res){
                header('location: ../category.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_category (cat_name,is_parent,cat_status) VALUES ('$cat_name', '$is_parent', '$cat_status')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../category.php');
        }else{
            die('Category Insert Error!'.mysqli_error($db));
        }
    }
}

// insert Add Brand .....************************************

if(isset($_POST['add_brand'])){
    $brand_name     = $_POST['brand_name'];
    $Brand_Category = $_POST['is_parent'];
    $brand_status   = $_POST['brand_status'];
    $file_name      = $_FILES['choose_file']['name'];
    $tmp_name       = $_FILES['choose_file']['tmp_name'];
    $file_size      = $_FILES['choose_file']['size'];

    $mb_file_size = $file_size/(1024*1024);

    if($mb_file_size > 1){
        echo 'Warning! Maximum File Size 1MB';
    }


    $extn = explode('.', $file_name);
    $file_extn = strtolower(end($extn));

    $extensions = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/brands/'.$update_name);
            $cat_insert = "INSERT INTO mart_brand (Brand_Name,Brand_Image,Brand_Category,Brand_Status) VALUES ('$brand_name','$update_name', '$Brand_Category', '$brand_status')";
            $cat_insert_res = mysqli_query($db,$cat_insert);
    
            if($cat_insert_res){
                header('location: ../brand.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_brand (Brand_Name,Brand_Category,Brand_Status) VALUES ('$brand_name', '$Brand_Category', '$brand_status')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../brand.php');
        }else{
            die('Category Insert Error!'.mysqli_error($db));
        }
    }
}