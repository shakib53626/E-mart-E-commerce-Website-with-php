<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/site-logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    
    <?php include('inc/header.php') ?>
    <?php include('inc/side_menu.php') ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
            <div class="row">
              <div class="col-lg-5">
                <!-- Add Category Form -->
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Add New Category</h5>

                      <!-- No Labels Form -->
                      <form class="row g-3" action="core/insert.php" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-6">
                          <div class="col-md-12 my-5">
                            <input type="text" class="form-control" placeholder="Category Name" name="cat_name" required>
                          </div>
                          <div class="col-md-12">
                              <label for="" class="mb-1">Choose Your Parent Category</label>
                              <select id="inputState" class="form-select" name="is_parent">
                                <option selected="">Choose...</option>
                                <?php
                                $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' ORDER BY e_name ASC";
                                $category_res = mysqli_query($db,$category_sql);
       
                                while($row = mysqli_fetch_assoc($category_res)){
                                 $cat_id     = $row['ID'];
                                 $e_name     = $row['e_name'];
                                 $e_image    = $row['e_image'];
                                 $is_parent  = $row['is_parent'];
                                 $c_status   = $row['c_status'];
                                 
                                 ?><option value="<?php echo $cat_id; ?>"><?php echo $e_name;?></option><?php
                                }
                                ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="drop-zone ms-5">
                              <span class="drop-zone__prompt">Drop file here or click to upload</span>
                              <input type="file" name="myFile" class="drop-zone__input">
                            </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
                          <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                      </form><!-- End No Labels Form -->

                    </div>
          </div>

              </div>
              <div class="col-lg-7">
                <!-- All Category Table -->
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">All Categories information</h5>

                      <!-- Table with hoverable rows -->
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                         $category_sql = "SELECT * FROM mart_category WHERE is_parent='0'";
                         $category_res = mysqli_query($db,$category_sql);
                         $serial = 0;
                         

                         while($row = mysqli_fetch_assoc($category_res)){
                          $cat_id     = $row['ID'];
                          $e_name     = $row['e_name'];
                          $e_image    = $row['e_image'];
                          $is_parent  = $row['is_parent'];
                          $c_status   = $row['c_status'];
                          $serial++;

                          ?>
                            <tr>
                              <th scope="row"><?php echo $serial; ?></th>
                              <td>
                                <img src="assets/img/products/<?php echo $e_image; ?>" width="30" alt="">
                              </td>
                              <td><?php echo $e_name; ?></td>
                              <td>
                                <?php if($c_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>'; ?>
                              </td>
                              <td>
                                <a href=""><i class="bi bi-pencil-square text-success"></i></a>
                                <a href="category.php?id=<?php echo $cat_id;?>"><i class="bi bi-trash text-danger ms-3"></i></a>
                              </td>
                            </tr>
                          
                          <?php
                          // find Sub category........
                          Show_Sub_Category($cat_id);

                         }

                        ?>
                      
                        </tbody>
                      </table>
                      <!-- End Table with hoverable rows -->

                    </div>
          </div>


              </div>
            </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <?php include('inc/footer.php') ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>