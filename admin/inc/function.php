<?php
include('connection.php');

function Show_Sub_Category($cat_id){
    global $db;
    $sub_cat_sql = "SELECT * FROM mart_category WHERE is_parent='$cat_id'";
    $sub_cat_res = mysqli_query($db,$sub_cat_sql);
    

    while($row = mysqli_fetch_assoc($sub_cat_res)){
    $cat_id         = $row['ID'];
    $e_name         = $row['e_name'];
    $e_image        = $row['e_image'];
    $c_status       = $row['c_status'];

    ?>
    <tr>
        <th scope="row"></th>
        <td>
        <img src="assets/img/products/<?php echo $e_image; ?>" width="30" alt="">
        </td>
        <td><?php echo '<i class="bi bi-arrow-return-right text-info"></i> '.$e_name; ?></td>
        <td>
        <?php if($c_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>'; ?>
        </td>
        <td>
        <a href=""><i class="bi bi-pencil-square text-success"></i></a>
        <a href=""><i class="bi bi-trash text-danger ms-3"></i></a>
        </td>
    </tr>
    
    <?php
    }
}


?>


