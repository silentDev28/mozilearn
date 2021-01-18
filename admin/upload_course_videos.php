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
error_reporting(0);
session_start();
$message = "";
if (empty($_SESSION['email'])) {
    header("location:" . "/admin/examples/login.php");
} else {
    $_SESSION['route_course_code'] = $_GET['course_code'];
    if (isset($_POST['start_new_step'])) {
        unset($_SESSION['step_code']);
    }
    if (isset($_POST['add_vidoes_btn'])) {
        if (empty($_POST['video_title'])) {
            $message = "Please enter a file title";
        } else if (empty($_FILES['lesson_videos']['name'])) {
            $message = "Please enter a valid file to upload";
        } else {

            $video_title = $_POST['video_title'];
            $step_code = $_SESSION['step_code'];
            $course_code = $_GET['course_code'];
            $fetch_files = $conn->query("SELECT * FROM lesson_step WHERE course_code='$course_code' and step_code='$step_code'");
            if ($fetch_files->num_rows > 1) {
                $message = "This file has already been uploaded";
            } else {
                $maxsize = 82837860 * 82837860 * 82837860; // 1GB

                $name = $_FILES['lesson_videos']['name'];
                $target_dir = "videos/";
                $target_file = $target_dir . $_FILES['lesson_videos']["name"];

                // Select file type
                $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg", "pdf");

                // Check extension
                if (in_array($videoFileType, $extensions_arr)) {

                    // Check file size
                    if (($_FILES['lesson_videos']['size'] >= $maxsize)) {
                        $message = "File too large. File must be less than 200MB.";
                    } else {
                        // Upload
                        if ((move_uploaded_file($_FILES['lesson_videos']['tmp_name'], $target_file))) {

                            $insert_videos = $conn->query("INSERT INTO lesson_vidoes(video_title,step_code,course_code,videos)VALUES('$video_title','$step_code','$course_code','$name')");
                            if ($insert_videos == true) {
                                $message = "File uploaded successful";
                            } else {
                                $message = $conn->error;
                            }
                        }
                    }
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
  <!-- <script src="./assets/vendor/jquery/dist/jquery.min.js"></script> -->
  <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
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
              <h6 class="h2 text-white d-inline-block mb-0">Upload course videos </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Upload course videos</li>
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
        <div class="col-md-12 ml-auto mr-auto">
          <div class="card card-upgrade">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">
                    <div class="row">
                        <div class="col-6">Upload course videos</div>
                        <div class="col-6"style="display: flex;justify-content: flex-end">
                            <a href="courses.php">
                                 <button style="padding-left: 30px;padding-right: 30px;padding-top: 10px;padding-bottom: 10px;border-radius: 26px;border: none;color: white;background: #420175;">
                                Back to courses
                            </button>
                            </a>
                        </div>
                    </div>
                </h3>
            </div>
            <div class="card-body">
            <?php
            if(isset($_POST['delete_all_btn'])){
              $delete_all_values=$_POST['delete_all_values'];
            
              $fetch_step_code_and_video=$conn->query("DELETE FROM lesson_step WHERE step_code='$delete_all_values'");
             if($fetch_step_code_and_video==TRUE){
              
             }else{
              $message=$conn->error;
             }
         
                $fetch_lesson_video_to_delete=$conn->query("SELECT * FROM lesson_vidoes WHERE step_code='$delete_all_values'");
                if($fetch_lesson_video_to_delete->num_rows!=0){
                  while($video_row=$fetch_lesson_video_to_delete->fetch_assoc()){
                    $get_delete_videos_id=$video_row['id'];
                    $fetch_step_code_video=$conn->query("DELETE FROM lesson_vidoes WHERE id='  $get_delete_videos_id'");

                    if($fetch_step_code_video==TRUE){
                      $message="Step deleted successful";
                      unset($_SESSION['step_code']);
                    }
                  }
                }
               
              }else{
                $message=$conn->error;
              }
            
            ?>
            <?php
if(isset($_POST['del_lesson'])){
  $del_value_lesson=$_POST['del_value_lesson'];
  $select_and_fetch_video_step=$conn->query("DELETE FROM lesson_vidoes WHERE id='$del_value_lesson'");
  if($select_and_fetch_video_step==TRUE){
    $message="Lesson video has been deleted.";
  }else{
    $message=$conn->error;
  }
 
}
?>
            <?php
                                           if(isset($_POST['set_new_lesson'])){
                                            $_SESSION['step_code']= $_POST['set_lesson_step'];
                                           }
                                           ?>
              <div class="col-12">
                   <?php
if ($message == "") {
    echo "";
} else if ($message == "File uploaded successful") {
    ?>
                   <div class="alert alert-success alert-dismissible fade show">
  <strong>Success!</strong> <?php echo $message; ?>
</div>
                  <?php
} else {
    ?>
              <div class="alert alert-danger alert-dismissible fade show">
  <strong>Error!</strong> <?php echo $message; ?>
</div>
              <?php

}
?>
              </div>
                             <div class=" col-12">
                   <div class="">

                       <form action="" method="post" enctype='multipart/form-data' class="col-12">



           <div class="card" style="border-bottom: 2px solid purple;margin-bottom: 20px">
  <div class="card-body">
                       <div class="row" style="display:flex;justify-content: center">


                            <div class="col-6">
                               <label class="update-label">Lessons steps</label>
                               <div class="row">
                                   <div class="col-12">
                                       <div class="alert alert-danger" id="danger-message" role="alert" style="display: none;">

</div>
                                   </div>
                                  <?php

if (isset($_POST['add_step_btn'])) {
    $step_code = rand(45634635, 77266359);
    $lesson_input = $_POST['lesson_input'];
    $course_code = $_GET['course_code'];
    $message = "";

    if (empty($lesson_input)) {
        ?>
                                    <div class="row">
                                   <div class="col-12">
                                       <div class="alert alert-danger" id="danger-message" role="alert" >
                                           Please enter required field.
</div>
                                   </div>
                                   <?php
} else {
        $_SESSION['step_code'] = $step_code;
        $insert_lesson_step = $conn->query("INSERT INTO lesson_step(lesson_steps,course_code,step_code) VALUES (' $lesson_input','$course_code','$step_code')");
        if ($insert_lesson_step == true) {

            ?>
                                         <div class="row">

                                   <div class="col-12">
                                       <div class="alert alert-success" id="danger-message" role="alert" >
                                           New lesson step has been added.
</div>

                                   </div>
                                        <?php
} else {
            ?>
                                              <div class="row">
                                   <div class="col-12">
                                       <div class="alert alert-danger" id="danger-message" role="alert" >
                                          <?php echo $conn->error; ?>
</div>
                                   </div>
                                             <?php

        }
    }
}
?>

                                        <div class="col-10">
                                            <?php

if (!empty($_SESSION['step_code'])) {

    ?>
                                             <input type="text" name="video_title" placeholder="Video title" class="form-control" id="requirment_input"/>
                                            <input type="file" name="lesson_videos" class="form-control" id="requirment_input" style="margin-top: 20px"/>

                                              <div class="col-2">
                                       <input type="submit" name="add_vidoes_btn" class="btn btn-success"  value="Add video" style="background: purple;color:white;border:none;padding-top:10px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;border-radius: 26px;margin-top:10px;">
                                            <?php
} else {

    ?>
                                            <div class="lesson_steps">
                                            <input type="text" name="lesson_input" class="form-control" id="requirment_input"/>
                                              <div class="col-2">
                                       <input type="submit" name="add_step_btn" class="btn btn-success"  value="Add step" style="background: purple;color:white;border:none;padding-top:10px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;border-radius: 26px;margin-top:10px;">

                                   </input>
                                            </div>
                                   </div>
                                            <?php
}
?>

                                   </div>


                                   <div class="col-12 list-requirement" style="margin-top:10px">
                                   
                                     <?php
                                   
$course_code = $_GET['course_code'];

$select_steps = $conn->query("SELECT * FROM lesson_step WHERE course_code='$course_code'");
while ($row_steps = $select_steps->fetch_assoc()) {

    ?>
                                       <div class="col-12" style="margin-bottom: 10px">
                                           <div class="row">
                                                <h4 class="col-8" style="font-weight: bold;margin-top:20px;width:100%;"> <?php echo $row_steps['lesson_steps']; ?></h4>
                                                <div class="col-4" style="display: flex;justify-content: flex-end;margin-top:10px;">
                                             
                                              <!-- <label class="input_step_update">Edit</label> -->
                                             
                                              <a href="update_course_step.php?step_code=<?php echo $row_steps['step_code'];?>">
                                            <span class="badge badge-primary badge-pill" style="padding-top:5px;padding-left: 7px;padding-right: 7px;padding-bottom: 5px;"><i class="fa fa-edit"></i>Edit</span></a>
                                          <form method="post">
                                          <div style="display:none">
                                           <input type="text" value="<?php echo $row_steps['step_code'];?>" name="delete_all_values"/>
                                           </div>
                                            <input type="submit" class="btn btn-danger" style="margin-left:15px" value="Del Step" name="delete_all_btn"></input>
                                          </form>
                                              
                                                </div>
                                              
                                           </div>
                                           <div>
                                          
                                           <form method="post">
                                           <div style="display:none;">
                                           <input type="text" name="set_lesson_step" value="<?php echo $row_steps['step_code']; ?>"/>
                                           </div>
                                           <input type="submit" name="set_new_lesson" class="btn btn-success" value="Add new lesson"></input>
                                           </form>
                                           </div>
                                       </div>
                                      <?php
$step_codes = $row_steps['step_code'];
    $select_step_videos = $conn->query("SELECT * FROM lesson_vidoes WHERE course_code='$course_code'");
    if ($_SESSION['step_code'] == $step_codes) {
        while ($row_videos = $select_step_videos->fetch_assoc()) {
            if ($row_videos['step_code'] == $row_steps['step_code']) {
                ?>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                               <?php echo $row_videos['video_title']; ?>
                                               <a href="update_lesson_video.php?lesson_id=<?php echo $row_videos['id'];?>">
                                               <span class="badge badge-primary badge-pill" style="padding-top:5px;padding-left: 7px;padding-right: 7px;padding-bottom: 5px;"><i class="fa fa-edit"></i>Edit</span></a>
                                               <form method="post">
                                               <div style="display:none">
                                               <input type="text" value="<?php echo $row_videos['id'] ?>" name="del_value_lesson"/>
                                               </div>
                                               <input type="submit" class="btn btn-danger" value="Del" name="del_lesson"></input>
                                               </form>
                                            </li>
                                              </ul>
                                       <?php

            } else {
                echo "";
            }

        }
        ?>
                                       <input type="submit" value="Start a new step" name="start_new_step" class="btn btn-primary"style="padding-left: 40px;padding-right: 40px;border-radius: 26px;padding-top:10px;padding-bottom: 10px;margin-top:20px"></input>
                                       <?php
} else {
        while ($row_videos = $select_step_videos->fetch_assoc()) {

            if ($row_videos['step_code'] == $row_steps['step_code']) {
                ?>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                               <?php echo $row_videos['video_title']; ?>
                                                <a href="update_lesson_video.php?lesson_id=<?php echo $row_videos['id'];?>">
                                                     <span class="badge badge-primary badge-pill" style="padding-top:5px;padding-left: 7px;padding-right: 7px;padding-bottom: 5px;"><i class="fa fa-edit"></i>Edit</span></a>
                                                     <form method="post">
                                                     <div style="display:none">
                                               <input type="text" value="<?php echo $row_videos['id'] ?>" name="del_value_lesson"/>
                                               </div>
                                               <input type="submit" class="btn btn-danger" value="Del" name="del_lesson"></input>
                                               </form>
                                            </li>
                                              </ul>
                                       <?php

            } else {
                echo "";
            }

        }
    }

    ?>
                                       <?php
}
?>



                                   </div>
                               </div>
                           </div>
                                         <div class="col-12">

                                              <label></label>

                               </div>

                                    </div>

                                        <!--start outcomes-->


        </div>

              </div>
                               </div>
                            </div>



                       </div>
  </div>
</div>
   <!--stop all forms -->



        <!-- /.container-fluid -->
                         </form>
      </div>
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