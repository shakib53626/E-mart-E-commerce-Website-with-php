<?php include 'inc/header.php'?>
        <?php include 'inc/side_menu.php'?>

        <div class="body">
            <div class="body-header" id="body-header">
                <h3>Dashboard</h3>
                <ul>
                    <li><a href="index.php">Home /</a></li>
                    <li><a href="add_product.php">Products /</a></li>
                    <li><a href="add_product.php?data=add">Add New Product /</a></li>
                    <li><a href="add_product.php" class="active">All Product</a></li>
                    <hr>
                </ul>
            </div>
            <!-- Body main section here -->
            <?php
                $data = isset($_GET['data']) ? $_GET['data'] : 'view';

                    if($data == 'view'){
                        // View code heare
                        ?>


                            <div class="products">
                                <div class="view-products">
                                    <div class="row mb-5">
                                        <div class="col-md-6 text-start">
                                            <div class="cat-info-search">
                                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="add-cat-button text-end mb-3">
                                                <a href="add_product.php?data=add" type="button" class="add_new_cat" id="add_brand_btn"><i class="fa-solid fa-plus"></i> Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Sub Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><img src="" alt="" width="40"></td>
                                                <td><img src="" alt="" width="40"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-end">
                                                    <a href="add_product.php?data=edit" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
                                                                                <a type="button" class="btn btn-success" href="">Confirm</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- Delete modal Code End -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        
                        <?php
                    }
                    if($data == 'add'){
                        // View code heare
                        ?>
                            <div class="add_product">
                                <div class="row">
                                    <div class="col-md-8 p-5">
                                        <form action="">
                                            <div class="add_p">
                                                <div class="row">
                                                    <div class="col-md-6 p_name">
                                                        <label for="">Product Name</label>
                                                        <input type="text" placeholder="Enter Product Name">
                                                    </div>
                                                    <div class="col-md-6 p_name">
                                                        <label for="">Product Category</label>
                                                        <select name="" id="">
                                                            <option value="">Electronics</option>
                                                            <option value="">Bags</option>
                                                            <option value="">Clothes</option>
                                                            <option value="">Plants</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="p_name">
                                                        <label for="" class="mb-2">Short Description</label>
                                                        <textarea name="" id="" cols="30" rows="2" placeholder="Product Short Description Here....."></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="p_name">
                                                        <label for="" class="mb-2">Big Description</label>
                                                        <div ng-app="quillTest" ng-controller="AppCtrl">
                                                            <ng-quill-editor ng-model="title" on-editor-created="editorCreated(editor)" on-content-changed="contentChanged(editor, html, text)" placeholder="Product Big Description Here..."></ng-quill-editor>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        <?php
                    }
                    if($data == 'edit'){
                        // View code heare
                        echo 'edit';
                    }
                    if($data == 'delete'){
                        // View code heare
                    }
            ?>
        </div>
        <!-- Scripts -->
        <script type="text/javascript" src="//code.angularjs.org/1.5.8/angular.min.js"></script>
        <script type="text/javascript" src="//cdn.quilljs.com/1.2.0/quill.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/ng-quill/2.2.1/ng-quill.min.js"></script>
        <script>
            // declare a module and load quillModule
            var myAppModule = angular.module('quillTest', ['ngQuill']);
            myAppModule.config(['ngQuillConfigProvider', function (ngQuillConfigProvider) {
                ngQuillConfigProvider.set();
            }]);
            myAppModule.controller('AppCtrl', [
                '$scope',
                '$timeout',
                function($scope, $timeout) {
                    $scope.title = '';
                    $scope.changeDetected = false;

                    $scope.editorCreated = function (editor) {
                        console.log(editor);
                    };
                    $scope.contentChanged = function (editor, html, text) {
                      	$scope.changeDetected = true;
                        console.log('editor: ', editor, 'html: ', html, 'text:', text);
                    };
                }
            ]);

        </script>
<?php include('inc/footer.php')?>