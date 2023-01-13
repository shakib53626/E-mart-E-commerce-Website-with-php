<?php
    $db = mysqli_connect('localhost', 'root', '', 'e_mart');

    if($db){
        // echo 'Database is Connected';
    }else{
        die('Database Connection is Error'.mysqli_error());
    }

?>