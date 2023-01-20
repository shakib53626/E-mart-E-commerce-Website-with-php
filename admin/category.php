




<?php include 'inc/header.php'?>
        <?php include 'inc/side_menu.php'?>

        <div class="body">
            <div class="body-header">
                <h3>Dashboard</h3>
                <ul>
                    <li><a href="index.php">Home /</a></li>
                    <li><a href="">Products /</a></li>
                    <li><a href="add_products.php" class="active">Add Product</a></li>
                </ul>
                <hr>
            </div>
            <div class="body-main">
                <!-- Body main section here -->
                <div class="category">
                    <div class="pupup-category" id="add-category">
                        <div class="add-category">
                            <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('add-category').style.display='none'"></i></button>
                            <h3 class="text-center mb-4">Add New Category</h3>


                            <form action="core/insert.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="mb-2">Category Name</label>
                                        <input type="text" placeholder="Enter category name..." name="cat_name" required>
                                        
                                        <div class="panel">
                                            <div class="button_outer">
                                                <div class="btn_upload">
                                                    <input type="file" id="upload_file" name="choose_file">
                                                    Upload Image
                                                </div>
                                                <div class="processing_bar"></div>
                                                <div class="success_box"></div>
                                            </div>
                                            <h5>Upload Category Image</h5>
                                        </div>
                                        <div class="error_msg"></div>
                                        <div class="uploaded_file_view" id="uploaded_view">
                                            <span class="file_remove">X</span>
                                        </div>

                                    </div><!--Coll-md-6 End-->


                                    <div class="col-md-6">
                                        <label for="" class="mb-2 d-block">Choose Your Parent Category</label>
                                        <select name="is_parent" id="">
                                            <option value="">Choose Category......</option>
                                            <?php
                                            $cat_info_sql = "SELECT * FROM mart_category WHERE is_parent='0' ORDER BY cat_name ASC";
                                            $cat_info_res = mysqli_query($db,$cat_info_sql);
                                            $serial = 0;
                                            
                                            while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                                $cat_id     = $cat_info_row['ID'];
                                                $cat_name   = $cat_info_row['cat_name'];
                                                $cat_img    = $cat_info_row['cat_img'];
                                                $is_parent  = $cat_info_row['is_parent'];
                                                $cat_status = $cat_info_row['cat_status'];
                                                ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                            
                                            }

                                            ?>
                
                                        </select>

                                        <div class="cat-status mt-4">
                                            <label for="" class="mb-2 d-block">Choose Category Status</label>
                                            <select name="cat_status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="cat-add-btn text-end mt-5">
                                            <button type="submit" name="add_category">Add Category</button>
                                        </div>
                                    </div><!--Coll-md-6 End-->
                                </div>
                            </form><!--Add Category Form code End-->
                        </div><!--Add-category code End-->
                    </div>
                </div><!-- Category section here -->
                <div class="category-info">
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <div class="cat-info-search">
                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="add-cat-button text-end mb-3">
                                <a type="button" class="add_new_category" id="add_cat_btn" onclick="clcAddNew();"><i class="fa-solid fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="cat-all-info mt-4">
                        <div class="cat-info-table">
                            <h5 class="mb-4 ms-3">All Category Information</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Sub-Cat-Image</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Sub-Category Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                        $cat_info_sql = "SELECT * FROM mart_category WHERE is_parent='0'";
                                        $cat_info_res = mysqli_query($db,$cat_info_sql);
                                        $serial = 0;
                                        
                                        while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                            $cat_id     = $cat_info_row['ID'];
                                            $cat_name   = $cat_info_row['cat_name'];
                                            $cat_img    = $cat_info_row['cat_img'];
                                            $sub_cname  = $cat_info_row['sub_cname'];
                                            $is_parent  = $cat_info_row['is_parent'];
                                            $cat_status = $cat_info_row['cat_status'];
                                            $serial++;

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $serial;?></th>
                                                    <td><img src="assets/img/products/<?php echo $cat_img;?>" alt="" width="40"></td>
                                                    <td><img src="assets/img/products/<?php echo '';?>" alt="" width="40"></td>
                                                    <td><?php echo $cat_name;?></td>
                                                    <td><?php echo $sub_cname;?></td>
                                                    <td>
                                                        <?php if($cat_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="category.php?edit_id=<?php echo $cat_id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                        <!-- Edit Modal Code here -->



                                                        <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $cat_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                            <!-- modal Code -->
                                                                <div class="modal fade delet_modal" id="del_id<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-footer  p-4">
                                                                                <div class="confirmition-mg">
                                                                                    <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                                </div>
                                                                                <div class="modal-btn">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                    <a type="button" class="btn btn-success" href="category.php?del_id=<?php echo $cat_id;?>">Confirm</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- Delete modal Code End -->
                                                    </td>
                                                </tr>

                                            <?php

                                            // Sub-Category Code Here*******************
                                            Show_Sub_Category($cat_id);


                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div><!-- cat-info-table -->
                    </div><!-- Cat-all-info End -->
                </div>
            </div>
                    


        </div>




<!-- ------------------------------------------------------
-----------------------------------------------------------
            Delete Php code here
----------------------------------------------------------
--------------------------------------------------------- -->

<?php

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];

    $cat_del_res = mysqli_query($db,"DELETE FROM mart_category WHERE ID='$del_id'");
    if($cat_del_res){
        header('location: category.php');
    }else{
        die('Category Delete Error!'.mysqli_error($db));
    }
}

?>
<!-- ------------------------------------------------------
-----------------------------------------------------------
            Delete Php code End
----------------------------------------------------------
--------------------------------------------------------- -->



<!-- ------------------------------------------------------
-----------------------------------------------------------
            Edit Category Code here
----------------------------------------------------------
--------------------------------------------------------- -->
<?php

if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];

    $cat_info_sql = "SELECT * FROM mart_category WHERE ID='$edit_id'";
    $cat_info_res = mysqli_query($db,$cat_info_sql);
    $serial = 0;
    
    while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
        $edit_cat_name   = $cat_info_row['cat_name'];
        $edit_cat_img    = $cat_info_row['cat_img'];
        $edit_sub_cname  = $cat_info_row['sub_cname'];
        $edit_is_parent  = $cat_info_row['is_parent'];
        $edit_cat_status = $cat_info_row['cat_status'];
    }

    
    ?>
    <div class="edit_category" id="edit_category">
        <div class="edit_cat">
                <div class="add-category">
                    <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('edit_category').style.display='none'"></i></button>
                    <h3 class="text-center mb-4">Edite Category</h3>


                    <form action="core/update.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mb-2">Category Name</label>
                                <input type="text" value="<?php echo $edit_cat_name;?>" placeholder="Enter category name..." name="cat_name" required>
                                
                                <div class="panel">
                                    <?php
                                        if(empty($edit_cat_img)){
                                            echo '<p class="alert alert-danger">No Image Found</p>';
                                        }else{
                                            ?>
                                            <div class="mb-3"><img src="assets/img/products/<?php echo $edit_cat_img;?>" alt="" width="100"></div>
                                            <?php
                                        }
                                    
                                    ?>
                                    <div class="button_outer button_outer_edit">
                                        <div class="btn_upload">
                                            <input type="file" id="edit_upload_file" name="choose_file">
                                            Upload Image
                                        </div>
                                        <div class="processing_bar"></div>
                                        <div class="success_box"></div>
                                    </div>
                                </div>
                                <div class="error_msg edit_error_msg"></div>
                                <div class="uploaded_file_view" id="edit_uploaded_view">
                                    <span class="file_remove">X</span>
                                </div>

                            </div><!--Coll-md-6 End-->


                            <div class="col-md-6">
                                <label for="" class="mb-2 d-block">Parent Category</label>
                                <select name="is_parent" id="">
                                    <option value="">Choose Category......</option>
                                    <?php
                                    $cat_info_sql = "SELECT * FROM mart_category WHERE is_parent='0' ORDER BY cat_name ASC";
                                    $cat_info_res = mysqli_query($db,$cat_info_sql);
                                    $serial = 0;
                                    
                                    while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                        $cat_id     = $cat_info_row['ID'];
                                        $cat_name   = $cat_info_row['cat_name'];
                                        $cat_img    = $cat_info_row['cat_img'];
                                        $is_parent  = $cat_info_row['is_parent'];
                                        $cat_status = $cat_info_row['cat_status'];
                                        ?><option value="<?php echo $cat_id;?>" <?php if($edit_is_parent == $cat_id)echo 'selected';?>><?php echo $cat_name;?></option><?php
                                    
                                    }

                                    ?>
        
                                </select>

                                <div class="cat-status mt-4">
                                    <label for="" class="mb-2 d-block">Category Status</label>
                                    <select name="cat_status" id="">
                                        <option value="1" <?php if($edit_cat_status == 1)echo 'selected';?>>Active</option>
                                        <option value="0" <?php if($edit_cat_status == 0)echo 'selected';?>>Deactive</option>
                                    </select>
                                </div>
                                <div class="cat-add-btn text-end mt-5">
                                    <input type="hidden" name="editid" value="<?php echo $edit_id;?>">
                                    <button type="submit" name="update_category">Update Category</button>
                                </div>
                            </div><!--Coll-md-6 End-->
                        </div>
                    </form><!--Add Category Form code End-->
                </div><!--Add-category code End-->
            
        </div><!--Edit Cat Code End -->
    </div>
    
    
    <?php

}

?>
<?php include('inc/footer.php')?>
