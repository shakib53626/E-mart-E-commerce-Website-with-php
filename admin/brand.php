<?php include 'inc/header.php'?>
        <?php include 'inc/side_menu.php'?>

        <div class="body">
            <div class="body-header">
                <h3>Dashboard</h3>
                <ul>
                    <li><a href="index.php">Home /</a></li>
                    <li><a href="index.php">Products /</a></li>
                    <li><a href="template.php" class="active">Brands</a></li>
                    <hr>
                </ul>
            </div>
            <!-- Body main section here -->
            <div class="brand-info-table">
                <div class="add_brand_code">
                    <div class="popup-Brand" id="add-category">
                        <div class="add-brand">
                            <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('add-category').style.display='none'"></i></button>
                            <h3 class="text-center mb-4">Add New Brand</h3>


                            <form action="core/insert.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="mb-2">Brand Name</label>
                                        <input type="text" placeholder="Enter Brand name..." name="brand_name" required>
                                        
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
                                        <label for="" class="mb-2 d-block">Choose Brand Category</label>
                                        <select name="is_parent" id="">
                                            <option value="">Choose Brand Category......</option>
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
                                                ?><option value="<?php echo $cat_id;?>" name="brand_cat_name"><?php echo $cat_name;?></option><?php
                                            
                                            }

                                            ?>
                
                                        </select>
                                        <div class="cat-status mt-4">
                                            <label for="" class="mb-2 d-block">Choose Brand Status</label>
                                            <select name="brand_status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="cat-add-btn text-end mt-5">
                                            <button type="submit" name="add_brand">Add Brand</button>
                                        </div>
                                    </div><!--Coll-md-6 End-->
                                </div>
                            </form><!--Add brand Form code End-->
                        </div><!--Add-brand code End-->
                    </div>
                </div><!--Add Brand Code End here-->
                <div class="brand_info_code">
                    <div class="row mb-5">
                        <div class="col-md-6 text-start">
                            <div class="cat-info-search">
                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="add-cat-button text-end mb-3">
                                <a type="button" class="add_new_cat" id="add_brand_btn" onclick="clcAddNew();"><i class="fa-solid fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Icon</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Category</th>
                                <th scope="col">Brand Sub-Category</th>
                                <th scope="col">Brand Status</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $brand_info_sql = "SELECT * FROM mart_brand";
                                $brand_info_res = mysqli_query($db,$brand_info_sql);
                                $serial = 0;
                                
                                while($brand_info_row = mysqli_fetch_assoc($brand_info_res)){
                                    $brand_id     = $brand_info_row['ID'];
                                    $brand_name   = $brand_info_row['Brand_Name'];
                                    $Brand_Category   = $brand_info_row['Brand_Category'];
                                    $brand_img    = $brand_info_row['Brand_Image'];
                                    $is_parent    = $brand_info_row['Is_Parent'];
                                    $brand_status = $brand_info_row['Brand_Status'];
                                    $serial++;


                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $serial;?></th>
                                        <td><img src="assets/img/brands/<?php echo $brand_img;?>" alt="" width="40"></td>
                                        <td><?php echo $brand_name;?></td>
                                        <td ><?php echo $Brand_Category;?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php if($brand_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?></td>
                                        <td class="text-end">
                                            <a href="brand.php?bedit_id=<?php echo $brand_id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            <!-- Edit Modal Code here -->



                                            <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#bdel_id<?php echo $brand_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                <!-- modal Code -->
                                                    <div class="modal fade delet_modal" id="bdel_id<?php echo $brand_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-footer  p-4">
                                                                    <div class="confirmition-mg">
                                                                        <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                    </div>
                                                                    <div class="modal-btn">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <a type="button" class="btn btn-success" href="brand.php?bdel_id=<?php echo $brand_id;?>">Confirm</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- Delete modal Code End -->
                                        </td>
                                    </tr>
                                    
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div><!--brand Info table code End-->
        </div>
<!-- ------------------------------------------------------
-----------------------------------------------------------
            brand Delete Php code here
----------------------------------------------------------
--------------------------------------------------------- -->

<?php

if(isset($_GET['bdel_id'])){
    $bdel_id = $_GET['bdel_id'];

    $brand_del_res = mysqli_query($db,"DELETE FROM mart_brand WHERE ID='$bdel_id'");
    if($brand_del_res){
        header('location: brand.php');
    }else{
        die('Category Delete Error!'.mysqli_error($db));
    }
}

?>
<!-- ------------------------------------------------------
-----------------------------------------------------------
           brand Delete Php code End
----------------------------------------------------------
--------------------------------------------------------- -->

<!-- ------------------------------------------------------
-----------------------------------------------------------
           brand Edit Php code start
----------------------------------------------------------
--------------------------------------------------------- -->

<?php

if(isset($_GET['bedit_id'])){
    $bedit_id = $_GET['bedit_id'];

    $brand_info_sql = "SELECT * FROM mart_brand WHERE ID='$bedit_id'";
    $brand_info_res = mysqli_query($db,$brand_info_sql);
    $serial = 0;
    
    while($brand_info_row = mysqli_fetch_assoc($brand_info_res)){
        $edit_brand_name   = $brand_info_row['Brand_Name'];
        $edit_brand_img    = $brand_info_row['Brand_Image'];
        $edit_brand_cname  = $brand_info_row['Brand_Category'];
        $edit_is_parent    = $brand_info_row['Is_Parent'];
        $edit_brand_status = $brand_info_row['Brand_Status'];
    }

    
    ?>
    <div class="edit_category" id="edit_category">
        <div class="edit_cat">
                <div class="add-category">
                    <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('edit_category').style.display='none'"></i></button>
                    <h3 class="text-center mb-4">Edit Brand</h3>


                    <form action="core/update.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mb-2">Brand Name</label>
                                <input type="text" value="<?php echo $edit_brand_name;?>" placeholder="Enter category name..." name="brand_name" required>
                                
                                <div class="panel">
                                    <?php
                                        if(empty($edit_brand_img)){
                                            echo '<p class="alert alert-danger">No Image Found</p>';
                                        }else{
                                            ?>
                                            <div class="mb-3"><img src="assets/img/brands/<?php echo $edit_brand_img;?>" alt="" width="100"></div>
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
                                <label for="" class="mb-2 d-block">Brand Category</label>
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
                                        ?><option value="<?php echo $edit_brand_cname;?>" <?php if($edit_is_parent == $edit_brand_cname)echo 'selected';?>><?php echo $edit_brand_cname;?></option><?php
                                    
                                    }

                                    ?>
        
                                </select>

                                <div class="cat-status mt-4">
                                    <label for="" class="mb-2 d-block">Category Status</label>
                                    <select name="brand_status" id="">
                                        <option value="1" <?php if($edit_brand_status == 1)echo 'selected';?>>Active</option>
                                        <option value="0" <?php if($edit_brand_status == 0)echo 'selected';?>>Deactive</option>
                                    </select>
                                </div>
                                <div class="cat-add-btn text-end mt-5">
                                    <input type="hidden" name="beditid" value="<?php echo $bedit_id;?>">
                                    <button type="submit" name="update_brand">Update Brand</button>
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


<!-- ------------------------------------------------------
-----------------------------------------------------------
           brand Edit Php code End
----------------------------------------------------------
--------------------------------------------------------- -->


<?php include('inc/footer.php')?>