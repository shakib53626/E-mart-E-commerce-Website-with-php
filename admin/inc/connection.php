<?php

$db = mysqli_connect('localhost', 'root', '', 'e_commerce');

if($db){
    // echo 'Database Connection Successfully';
}else{
    die('Database Connection Error!'.mysqli_error($db));
}