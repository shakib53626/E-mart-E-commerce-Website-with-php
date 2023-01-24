<?php ob_start();?>
<?php include('connection.php');?>
<?php include('function.php');?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/img/fav-icon.png">

    <!-- font Awsome Cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style Css Code -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="//cdn.quilljs.com/1.2.0/quill.snow.css">
    <link rel="stylesheet" href="//cdn.quilljs.com/1.2.0/quill.bubble.css">

    <title>Web-Admin</title>
  </head>
  <body>

<header class="header">
            <div class="cont">
                <div class="header-content">
                    <div class="logo">
                        <img src="assets/img/logo.png" alt=""><span>WebCoders</span>
                    </div>
                    <div class="nav-area">
                        <ul>
                            <li class="d-menu"><a href=""><i class="fa-regular fa-bell"></i></a>
                                <span class="n-message">2</span>
                            </li>
                            <li class="d-menu"><a href=""><i class="fa-regular fa-comment-dots"></i></a>
                                <span class="n-message">5</span>
                            </li>
                            <li class="d-menu"><a href="" id="d-menu"><img src="assets/img/logo.png" alt=""> SHAKIB <i class="fa-solid fa-caret-down"></i></a>
                                <div class="drop-menu">
                                    <div class="dm-title text-center">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <h4>Shakibul Islam</h4>
                                        <span>Full stack Web Developer</span>
                                    </div>
                                    <ul class="text-start">
                                        <li><i class="fa-regular fa-user"></i> My Profile</li>
                                        <li><i class="fa-solid fa-gear"></i></i> Account Settings</li>
                                        <li><i class="fa-regular fa-circle-question"></i> Need Help?</li>
                                        <li><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>