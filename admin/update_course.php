<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php
include 'conn.php';
session_start();
$message="";
if(empty($_SESSION['course_id'])){
    $_SESSION['course_id']=$_GET['course_id'];
}


if(empty($_SESSION['email'])){
    header("location:"."/mozilearn/admin/login.php");
}else{

    if(empty($_SESSION['code_gen'])){
        $course_code=rand(45634635,77266359);
        $_SESSION['code_gen']=$course_code;
    }else{

//    echo $_SESSION['code_gen'];
        if(empty($_GET['req_id'])){

        }

        else{
            $req_id=$_GET['req_id'];
            $delete_req=$conn->query("DELETE  FROM course_requirement WHERE id='$req_id'");
            if($delete_req==TRUE){
                header("location:"."/mozilearn/admin/update_course.php?course_id=".$_SESSION['course_id']);
            }else{
                echo $conn->error;

            }


        }
        if(empty($_GET['outcome_id'])){

        }else{
            $outcome_id=$_GET['outcome_id'];
            $delete_outcome=$conn->query("DELETE  FROM course_outcome WHERE id='$outcome_id'");
            if($delete_outcome==TRUE){
                header("location:"."/mozilearn/admin/update_course.php?course_id=$course_id".$_SESSION['course_id']);
            }else{
                echo $conn->error;

            }
        }

        if(isset($_POST['final_submit'])){
            $course_title=mysqli_real_escape_string($conn,$_POST['course_title']);
            $course_short_description=mysqli_real_escape_string($conn,$_POST['short_description']);
            $description=mysqli_real_escape_string($conn,$_POST['description']);
            $course_overview=$_FILES['course_overview'];
            $category=mysqli_real_escape_string($conn,$_POST['category']);
            $level=mysqli_real_escape_string($conn,$_POST['level']);
            $language=mysqli_real_escape_string($conn,$_POST['language']);
            $top_course=mysqli_real_escape_string($conn,$_POST['top_course']);
            $course_price=mysqli_real_escape_string($conn,$_POST['course_price']);
            $discount_percentage=mysqli_real_escape_string($conn,$_POST['discount_percentage']);
            $instructor=mysqli_real_escape_string($conn,$_POST['instructor']);
            $code=$_SESSION['code_gen'];
            $course_picture=$_FILES['course_picture'];
            $time=mysqli_real_escape_string($conn,$_POST['time']);
            $assignment=mysqli_real_escape_string($conn,$_POST['assignment']);
            $quiz=mysqli_real_escape_string($conn,$_POST['quiz']);
            $fetch_requirement=$conn->query("SELECT * FROM course_requirement WHERE course_code='$code'");
            $fetch_outcome=$conn->query("SELECT * FROM course_outcome WHERE course_code='$code'");
            if(empty($course_title)or empty($course_short_description) or empty($description) or empty($course_overview) or empty($category) or empty($level) or empty($language) or empty($top_course) or empty($course_picture) or $category=="Choose..." or $level=="Choose..." or $language=="Choose..." or $top_course=="Choose..." or $instructor=="Choose..." or $quiz=="Choose..." or $assignment=="Choose..." or  empty($time)){
                $message="Please fill all required fields";
            }else if($fetch_requirement->num_rows==0){
                $message="Please enter course requirements";
            }else if($fetch_outcome->num_rows==0){
                $message="Please enter course outcomes";
            }else{
                $maxsize = 20242880; // 20MB

                $name = $_FILES['course_overview']['name'];
                $target_dir = "videos/";
                $target_file = $target_dir . $_FILES["course_overview"]["name"];

                // Select file type
                $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
                $image = $_FILES['course_picture']['name'];
                $target_image = "category_images/".basename($image);
                // Check extension
                if( in_array($videoFileType,$extensions_arr) ){

                    // Check file size
                    if(($_FILES['course_overview']['size'] >= $maxsize) || ($_FILES["course_overview"]["size"] == 0)) {
                        $message= "File too large. File must be less than 5MB.";
                    }else{
                        // Upload
                        if((move_uploaded_file($_FILES['course_overview']['tmp_name'],$target_file))AND(move_uploaded_file($_FILES['course_picture']['tmp_name'],$target_image))){
                            if($course_price==""){
                                $course_id=$_SESSION['course_id'];
                                // Insert record
                                $insert_video=$conn->query("Update courses SET course_title='$course_title',short_description='$course_short_description',description='$description',course_overview='$name',category='$category',level='$level',language='$language',top_course='$top_course',course_price='free',discount_percentage='$discount_percentage',course_code='$code',course_picture='$image',instructor='$instructor',status='pending',quiz='$quiz',duration='$time',assignment='$assignment',paid_status='free' WHERE id='$course_id'");
//             $insert_video=$conn->query("INSERT INTO courses (course_title,short_description,description,course_overview,category,level,language,top_course,course_price,discount_percentage,course_code,course_picture,instructor,status,paid_status)VALUES('$course_title','$course_short_description','$description','$name','$category','$level','$language','$top_course','free','$discount_percentage','$code','$image','$instructor','pending','free')");
                                $message="Course updated successful";
                                unset($_SESSION["code_gen"]);
                            }else{
                                $course_id=$_SESSION['course_id'];
                                // Insert record
                                $insert_video=$conn->query("Update courses SET course_title='$course_title',short_description='$course_short_description',description='$description',course_overview='$name',category='$category',level='$level',language='$language',top_course='$top_course',course_price='free',discount_percentage='$discount_percentage',course_code='$code',course_picture='$image',instructor='$instructor',status='pending',quiz='$quiz',duration='$time',assignment='$assignment',paid_status='paid' WHERE id='$course_id'");
//             $insert_video=$conn->query("INSERT INTO courses (course_title,short_description,description,course_overview,category,level,language,top_course,course_price,discount_percentage,course_code,course_picture,instructor,status,paid_status)VALUES('$course_title','$course_short_description','$description','$name','$category','$level','$language','$top_course','$course_price','$discount_percentage','$code','$image','$instructor','pending','paid')");
                                $message="Course updated successful";
                                unset($_SESSION["code_gen"]);
                            }

                        }
                    }

                }else{
                    $message= "Invalid file extension.";
                }
            }
        }

    }
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_category.php">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Add category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="instructor.php">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">instructors</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_instructor.php">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Add instructor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_courses.php">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Add Course</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tables.html">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">
                            <i class="ni ni-key-25 text-info"></i>
                            <span class="nav-link-text">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upgrade.html">
                            <i class="ni ni-send text-dark"></i>
                            <span class="nav-link-text">Upgrade</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentation</span>
                </h6>
                <!-- Navigation -->

            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>2 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>3 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>5 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>2 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>3 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- View all -->
                            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-ungroup"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                            <div class="row shortcuts px-4">
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                                    <small>Shop</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                  </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Activity</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>Support</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Update course </h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update course</li>
                            </ol>
                        </nav>
                    </div>
                    <!--            <div class="col-lg-6 col-5 text-right">
                                  <a href="#" class="btn btn-sm btn-neutral">New</a>
                                  <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                                </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row mt--5">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-upgrade">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">
                            <div class="row">
                                <div class="col-6">Update course</div>
                                <div class="col-6"style="display: flex;justify-content: flex-end">
                                    <a href="courses.php">
                                        <button style="padding-left: 30px;padding-right: 30px;padding-top: 10px;padding-bottom: 10px;border-radius: 26px;border: none;color: white;background: #420175;">
                                            Back to course
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <?php
                            if($message==""){
                                echo "";
                            }
                            else if($message=="Course updated successful"){
                                ?>
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> <?php echo $message;?>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Error!</strong> <?php echo $message;?>
                                </div>
                                <?php

                            }
                            ?>
                        </div>
                        <form action="" method="post" enctype='multipart/form-data' class="col-12">

                            <div class="container col-12" style="margin-bottom: 20px">
                                <div class="col-12">
                                    <label>Course outcomes </label>
                                    <div class="row">

                                        <?php
                                        if(isset($_POST['outcome_btn'])){

                                        $outcome_input=mysqli_real_escape_string($conn,$_POST['outcome_input']);
                                        $req_code=$_SESSION['code_gen'];
                                        $message="";
                                        if(empty( $outcome_input)){
                                        ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-danger" id="danger-message" role="alert" >
                                                    Please enter course outcomes
                                                </div>
                                            </div>
                                            <?php
                                            }else{
                                            $insert_outcome=$conn->query("INSERT INTO course_outcome (outcomes,course_code) VALUES (' $outcome_input','$req_code')");
                                            if($insert_outcome==TRUE){
                                            ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="alert alert-success" id="danger-message" role="alert" >
                                                        New outcome has been added.
                                                    </div>
                                                </div>
                                                <?php
                                                }else{
                                                ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="alert alert-danger" id="danger-message" role="alert" >
                                                            <?php echo   $conn->error;?>
                                                        </div>
                                                    </div>
                                                    <?php


                                                    }
                                                    }
                                                    }
                                                    ?>

                                                    <div class="col-10">
                                                        <input type="text" name="outcome_input" class="form-control" />
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="submit" name="outcome_btn" style="background: purple;color:white;border:none;padding-top:10px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;border-radius: 26px;"  value="Add">

                                                        </input>
                                                    </div>

                                                    <div class="col-12 list-requirement" style="margin-top:10px">
                                                        <?php

                                                        if(empty($_SESSION['code_gen'])){
                                                            echo "";
                                                        }else{
                                                            $req_code=$_SESSION['code_gen'];
                                                            $select_tot_outcome=$conn->query("SELECT * FROM course_outcome WHERE course_code='$req_code'");
                                                            if($select_tot_outcome->num_rows>0){
                                                                while($totOutcome=$select_tot_outcome->fetch_assoc()){
                                                                    ?>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            <?php echo $totOutcome['outcomes']; ?>
                                                                            <a href="update_course.php?outcome_id=<?php echo $totOutcome['id'];?>"> <span class="badge badge-primary badge-pill"><i class="fas fa-trash-alt" style="font-size:20px;"></i></span></a>
                                                                        </li>
                                                                    </ul>
                                                                    <?php

                                                                }
                                                            }else{
                                                                echo $conn->error;
                                                            }
                                                        }


                                                        ?>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>



                                        <div class="container col-12" style="margin-bottom: 20px">
                                            <div class="col-12">
                                                <label>Requirements</label>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="alert alert-danger" id="danger-message" role="alert" style="display: none;">

                                                        </div>
                                                    </div>
                                                    <?php
                                                    if(isset($_POST['req_btn'])){

                                                    $req_input=mysqli_real_escape_string($conn,$_POST['req_input']);
                                                    $req_code=$_SESSION['code_gen'];
                                                    $message="";
                                                    if(empty( $req_input)){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger" id="danger-message" role="alert" >
                                                                Please enter course requirement
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }else{
                                                        $insert_req=$conn->query("INSERT INTO course_requirement (requirements,course_code) VALUES (' $req_input','$req_code')");
                                                        if($insert_req==TRUE){
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="alert alert-success" id="danger-message" role="alert" >
                                                                    New requirment has been added.
                                                                </div>
                                                            </div>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="alert alert-danger" id="danger-message" role="alert" >
                                                                        <?php echo   $conn->error;?>
                                                                    </div>
                                                                </div>
                                                                <?php


                                                                }
                                                                }
                                                                }
                                                                ?>

                                                                <div class="col-10">
                                                                    <input type="text" name="req_input" class="form-control" id="requirment_input"/>
                                                                </div>
                                                                <div class="col-2">
                                                                    <input type="submit" name="req_btn" class="btn btn-success"  value="Add" style="background: purple;color:white;border:none;padding-top:10px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;border-radius: 26px;">

                                                                    </input>
                                                                </div>

                                                                <div class="col-12 list-requirement" style="margin-top:10px">
                                                                    <?php
                                                                    if(empty($_SESSION['code_gen'])){
                                                                        echo "";
                                                                    }else{
                                                                        $req_code=$_SESSION['code_gen'];
                                                                        $select_tot_req=$conn->query("SELECT * FROM course_requirement WHERE course_code='$req_code'");
                                                                        if($select_tot_req->num_rows>0){
                                                                            while($totData=$select_tot_req->fetch_assoc()){
                                                                                ?>
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                        <?php echo $totData['requirements']; ?>
                                                                                        <a href="update_course.php?req_id=<?php echo $totData['id'];?>"> <span class="badge badge-primary badge-pill"><i class="fas fa-trash-alt" style="font-size:20px;"></i></span></a>
                                                                                    </li>
                                                                                </ul>
                                                                                <?php

                                                                            }
                                                                        }else{
                                                                            echo $conn->error;
                                                                        }
                                                                    }

                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!--start outcomes-->
                                                    <?php
                                                   $course_id=$_SESSION['course_id'];
                                                   $getCourses=$conn->query("SELECT * FROM courses WHERE id='$course_id'");
                                                   while($get_row=$getCourses->fetch_assoc()){
                                                     ?>
                                                       <div class="card" style="border-bottom: 2px solid purple">
                                                           <div class="card-body">
                                                               <div class="row">
                                                                   <div class="col-4">
                                                                       <label>Course title</label>
                                                                       <input type="text" name="course_title" class="form-control" value="<?php echo $get_row['course_title']?>"/>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>Short description</label>
                                                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="short_description" value="<?php echo $get_row['short_description']?>"><?php echo $get_row['short_description']?></textarea>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>description</label>
                                                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" value="<?php echo $get_row['description']?>"><?php echo $get_row['description']?></textarea>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Categories</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="category" value="<?php echo $get_row['category']?>">
                                                                           <option selected  value="<?php echo $get_row['category']?>"><?php echo $get_row['category']?></option>

                                                                           <?Php
                                                                           $select_category=$conn->query("SELECT * FROM category");
                                                                           if($select_category->num_rows>0){
                                                                               while($choose_cat=$select_category->fetch_assoc()){
                                                                                   ?>

                                                                                   <option><?php echo $choose_cat['cat_title']; ?></option>
                                                                                   <?php
                                                                               }
                                                                           }
                                                                           ?>

                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Level</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="level" value="<?php echo $get_row['level']?>">
                                                                           <option selected value="<?php echo $get_row['level']?>"><?php echo $get_row['level']?></option>
                                                                           <option>Beginner</option>
                                                                           <option>Advance</option>
                                                                           <option>Intermediate</option>
                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Language</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="language" value="<?php echo $get_row['language']?>">
                                                                           <option selected  value="<?php echo $get_row['language']?>"><?php echo $get_row['language']?></option>
                                                                           <option>English</option>
                                                                           <option>French</option>
                                                                           <option>India</option>
                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Top course</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="top_course" value="<?php echo $get_row['top_course']?>">
                                                                           <option selected value="<?php echo $get_row['top_course']?>"><?php echo $get_row['top_course']?></option>
                                                                           <option>True</option>
                                                                           <option>False</option>

                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>Course price(Naira)</label>
                                                                       <input type="number" class="form-control" name="course_price" value="<?php echo $get_row['course_price']?>"/>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>Discount price(%)</label>
                                                                       <input type="number" class="form-control" name="discount_percentage" value="discount_percentage"/>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Quiz</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="quiz" value="<?php echo $get_row['quiz']?>">
                                                                           <option selected value="<?php echo $get_row['quiz']?>"><?php echo $get_row['quiz']?></option>
                                                                           <option>Yes</option>
                                                                           <option>No</option>

                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">Assignment</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="assignment" value="<?php echo $get_row['assignment']?>">
                                                                           <option selected value="<?php echo $get_row['assignment']?>"><?php echo $get_row['assignment']?></option>
                                                                           <option>Yes</option>
                                                                           <option>No</option>

                                                                       </select>

                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>duration(Sec,Min,Hours,)</label>
                                                                       <input type="text" class="form-control" name="time" placeholder="2 hours" value="<?php echo $get_row['duration']?>"/>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="card" style="border-bottom: 2px solid purple">
                                                           <div class="card-body">
                                                               <div class="row">
                                                                   <div class="col-4">
                                                                       <label>Video overview</label>
                                                                       <input type="file" name="course_overview" class="form-control" value="<?php echo $get_row['course_overview']?>"/>
                                                                   </div>
                                                                   <div class="col-4">
                                                                       <label>Course picture</label>
                                                                       <input type="file" class="form-control" name="course_picture"/>
                                                                   </div>
                                                                   <div class="col-md-4 mb-4">
                                                                       <label for="validationTooltip04">
                                                                           Instructor</label>
                                                                       <select class="custom-select" id="validationTooltip04" name="instructor" value="<?php echo $get_row['instructor']?>">
                                                                           <option selected  value="<?php echo $get_row['instructor']?>"><?php echo $get_row['instructor']?></option>
                                                                           <?php
                                                                           $get_instructor=$conn->query("SELECT * FROM instructors");
                                                                           while($row=$get_instructor->fetch_assoc()){
                                                                               ?>
                                                                               <option><?php echo $row['instructor_firstname']." ".$row['instructor_lastname']; ?></option>
                                                                               <?php
                                                                           }
                                                                           ?>


                                                                       </select>
                                                                       <div class="invalid-tooltip">
                                                                           Please select a valid state.
                                                                       </div>
                                                                   </div>

                                                               </div>

                                                           </div>

                                                       </div>
                                                    <?php
                                                   }
                                                    ?>

                                                </div>
                                                <div class="col-12" style="text-align: center;padding-bottom: 50px">
                                                    <input type="submit" value="Submit" name="final_submit" class="btn btn-primary"style="padding-left: 40px;padding-right: 40px;border-radius: 26px;padding-top:10px;padding-bottom: 10px"></input>
                                                </div>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                                <!--end course out comes-->

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

</html>