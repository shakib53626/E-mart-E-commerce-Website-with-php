<?php
include '../inc/connection.php';
//  update Category code
if(isset($_POST['update_category'])){
    $update_cat_name    = $_POST['cat_name'];
    $update_is_parent   = $_POST['is_parent'];
    $update_cat_status  = $_POST['cat_status'];
    $editid  = $_POST['editid'];

    
    if(!empty($_FILES['choose_file']['name'])){
        $file_name = $_FILES['choose_file']['name'];
        $tmp_name = $_FILES['choose_file']['tmp_name'];

        $extn = explode('.', $file_name);
        $file_extn = strtolower(end($extn));

        $extensions = array('png', 'jpg', 'jpeg');
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/'.$update_name);
            $cat_update_sql = "UPDATE mart_category SET cat_name='$update_cat_name', cat_img='$update_name', is_parent='$update_is_parent', cat_status='$update_cat_status' WHERE ID='$editid'";
            $cat_update_res = mysqli_query($db,$cat_update_sql);
            if($cat_update_res){
                header('location: ../category.php');
            }else{
                die('Category Update Error!'.mysqli_error($db));
            }
        }else{
            echo 'Please Upload and Image File';
        }

    }else{
        $cat_update_sql = "UPDATE mart_category SET cat_name='$update_cat_name', is_parent='$update_is_parent', cat_status='$update_cat_status' WHERE ID='$editid'";
        $cat_update_res = mysqli_query($db,$cat_update_sql);
        if($cat_update_res){
            header('location: ../category.php');
        }else{
            die('Category Update Error!'.mysqli_error($db));
        }
    }

}


//  update Brand code
if(isset($_POST['update_brand'])){
    $update_brand_name    = $_POST['brand_name'];
    $update_is_parent   = $_POST['is_parent'];
    $update_brand_status  = $_POST['brand_status'];
    $beditid  = $_POST['beditid'];

    
    if(!empty($_FILES['choose_file']['name'])){
        $file_name = $_FILES['choose_file']['name'];
        $tmp_name = $_FILES['choose_file']['tmp_name'];

        $extn = explode('.', $file_name);
        $file_extn = strtolower(end($extn));

        $extensions = array('png', 'jpg', 'jpeg');
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/brands/'.$update_name);
            $brand_update_sql = "UPDATE mart_brand SET Brand_Name='$update_brand_name', Brand_Image='$update_name', is_parent='$update_is_parent', Brand_Status='$update_brand_status' WHERE ID='$beditid'";
            $brand_update_res = mysqli_query($db,$brand_update_sql);
            if($brand_update_res){
                header('location: ../brand.php');
            }else{
                die('Brand Update Error!'.mysqli_error($db));
            }
        }else{
            echo 'Please Upload and Image File';
        }

    }else{
        $cat_update_sql = "UPDATE mart_brand SET Brand_Name='$update_brand_name', is_parent='$update_is_parent', Brand_Status='$update_brand_status' WHERE ID='$beditid'";
        $cat_update_res = mysqli_query($db,$cat_update_sql);
        if($cat_update_res){
            header('location: ../brand.php');
        }else{
            die('Brand Update Error!'.mysqli_error($db));
        }
    }

}