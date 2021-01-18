<?php
error_reporting(0);
include 'conn.php';
session_start();


   $student_email= $_SESSION['student_email']; 



$message="";

 if(isset($_POST['enroll'])){
                                                                        if(empty($student_email)){
                                                                            $message= "please login to enroll";
                                                                        }else{
                                                                            header("Location:"."checkout.php?course_id=".$_GET['course_id']);
                                                                        }
                                                                    }
$course_id=$_GET['course_id'];
$get_course_title="";
$get_course_category="";
$get_short_description="";
$description="";
$course_code="";
$course_video_overview="";
$course_image="";
$instructor="";
$course_price="";
$course_level="";
$course_language="";
$quiz="";
$assignment="";
$time="";
$discount="";
$fetch_course=$conn->query("SELECT * FROM courses WHERE id='$course_id'");
while ($course_row=$fetch_course->fetch_assoc()){
    $get_course_title=$course_row['course_title'];
    $get_course_category=$course_row['category'];
    $get_short_description=$course_row['short_description'];
    $description=$course_row['description'];
    $course_code=$course_row['course_code'];
    $course_video_overview=$course_row['course_overview'];
    $course_image=$course_row['course_picture'];
    $instructor=$course_row['instructor'];
    $course_price=$course_row['course_price'];
    $course_level=$course_row['level'];
$course_language=$course_row['language'];
$quiz=$course_row['quiz'];
$assignment=$course_row['assignment'];
$time=$course_row['duration'];
$discount=$course_row['discount_percentage'];
}

if (isset($_POST['logout'])) {
    session_destroy();
    session_unset();
    header("Location:" . "/mozilearn/login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
	

<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title> Mozilearn - Online Course</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">

    </head>


    <body class="red-skin">
	
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-light head-shadow">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
                            <a class="nav-brand fixed-logo" href="index.php"><img src="assets/img/logo-black.png" class="logo" alt="" /></a>

                                <!--								<img src="assets/img/logo.png" class="logo" alt="" />-->
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li class="active"><a href="index.php">Home<span class="submenu-indicator"></span></a>
									
								</li>

                                <li><a href="#">Categories<span class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu">
                                        <?php
                                        $getnavCat=$conn->query("SELECT * FROM category");
                                        if($getnavCat->num_rows!=0){
                                            while($getnavrow=$getnavCat->fetch_assoc()){
                                                ?>
                                                <li><a href="category.php?category=<?php echo $getnavrow['cat_title']; ?>"><?php echo $getnavrow['cat_title'];?><span class="submenu-indicator"></span></a>

                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>

                                        <!--										<li><a href="list-with-sidebar.html">List Layout with Sidebar</a></li>-->
                                        <!--										<li><a href="#">Courses Grid Full Width<span class="submenu-indicator"></span></a>-->
                                        <!--											<ul class="nav-dropdown nav-submenu">-->
                                        <!--												<li><a href="full-width-course.html">Courses grid 1</a></li>-->
                                        <!--												<li><a href="full-width-course-2.html">Courses grid 1</a></li>-->
                                        <!--												<li><a href="full-width-course-3.html">Courses grid 1</a></li>-->
                                        <!--												<li><a href="full-width-course-4.html">Courses grid 1</a></li>-->
                                        <!--											</ul>-->
                                        <!--										</li>-->
                                        <!--										<li><a href="#">Courses Detail<span class="submenu-indicator"></span></a>-->
                                        <!--											<ul class="nav-dropdown nav-submenu">-->
                                        <!--												<li><a href="detail.html">Course Detail 1</a></li>-->
                                        <!--												<li><a href="detail-2.html">Course Detail 2</a></li>-->
                                        <!--												<li><a href="detail-3.html">Course Detail 3</a></li>-->
                                        <!--												<li><a href="detail-4.html">Course Detail 4</a></li>-->
                                        <!--												<li><a href="detail-5.html">Course Detail 5</a></li>-->
                                        <!--											</ul>-->
                                        <!--										</li>-->

                                        <!--										<li><a href="instructor-detail.html">Instructor Detail</a></li>-->
                                    </ul>
                                </li>
                                <li><a href="instructors.php">Instructors</a></li>
								<li><a href="#">Student<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li class=""><a href="dashboard.php">User Dashboard<span class="submenu-indicator"></span></a>

										</li>
<!--										<li><a href="#">Shop Pages<span class="submenu-indicator"></span></a>-->
<!--											<ul class="nav-dropdown nav-submenu">-->
<!--												<li><a href="shop-full-width.html">Shop Full Width</a></li>-->
<!--												<li><a href="shop-left-sidebar.html">Shop Sidebar Left</a></li>-->
<!--												<li><a href="shop-right-sidebar.html">Shop Sidebar Right</a></li>-->
<!--												<li><a href="product-detail.html">Shop Detail</a></li>-->
<!--												<li><a href="add-to-cart.html">Add To Cart</a></li>-->
<!--												<li><a href="product-wishlist.html">Wishlist</a></li>-->
<!--												<li><a href="checkout.html">Checkout</a></li>-->
<!--												<li><a href="shop-order.html">Order</a></li>-->
<!--											</ul>-->
<!--										</li>-->
<!--										<li><a href="about-us.html">About Us</a></li>-->
<!--										<li><a href="blog.html">Blog Style</a></li>-->
<!--										<li><a href="blog-detail.html">Blog Detail</a></li>-->
<!--										<li><a href="pricing.html">Pricing</a></li>-->
<!--										<li><a href="404.html">404 Page</a></li>-->
<!--										<li><a href="register.html">Register</a></li>-->
<!--										<li><a href="component.html">Elements</a></li>-->
<!--										<li><a href="privacy.html">Privacy Policy</a></li>-->
<!--										<li><a href="faq.html">FAQs</a></li>-->
<!--									</ul>-->
<!--								</li>-->

<!--                                        <li><a href="faq.html">FAQs</a></li>-->
								
							</ul>
<!--                                <li><a href="contact.html">Contact</a></li>-->

						</div>
                        <ul class="nav-menu nav-menu-social align-to-right">
                            <?php
                            if(empty($student_email)){
                                ?>
                                <li class="login_click bg-red">

                                    <a href="login.php"  >Sign in</a>
                                </li>
                                <?php
                            }else{
                                ?>
                                <li class="login_click theme-bg">

                                    <form method="post">
                                        <input type="submit" value="Log Out" name="logout" style="color:white;border: none;margin-top: 10px;background:none;cursor: pointer">
                                    </form>

                                    <!--									<a href="register.html">Log Out</a>-->
                                </li>
                                <?php
                            }
                            ?>
                            <!--								<li class="login_click theme-bg">-->
                            <!--									<a href="#" data-toggle="modal" data-target="#signup">Sign up</a>-->
                            <!--								</li>-->
                        </ul>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	

			
			<!-- ============================ Page Title Start================================== -->
			<div class="ed_detail_head">
				<div class="container">
                                    <?php
                                    if($message==""){
                                        echo "";
                                    }else{
                                        ?>
                                    <div class="alert alert-danger" role="alert">
 <?php echo $message;?>
</div>
                                    <?php
                                    }
                                    ?>
					<div class="row align-items-center">
						<div class="col-lg-4 col-md-5">
							
							<div class="property_video">
								<div class="thumb">
                                                                    <img class="pro_img img-fluid w100" src="./admin/category_images/<?php echo $course_image;?>" alt="7.jpg" style="width:100%;">
									<div class="overlay_icon">
										<div class="bb-video-box">
											<div class="bb-video-box-inner">
												<div class="bb-video-box-innerup">
                                                                                                    
                                                                                                    <a href="./admin/videos/<?php echo $course_video_overview;?>" data-toggle="modal" data-target="#popup-video" class="theme-cl" ><i class="ti-control-play"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-lg-8 col-md-7">
							<div class="ed_detail_wrap">
								<ul class="cources_facts_list">
									<li class="facts-1"><?php echo $get_course_category;?></li>
<!--									<li class="facts-5"><?php echo $get_course_title;?></li>-->
								</ul>
								<div class="ed_header_caption">
									<h2 class="ed_title"><?php echo $get_course_title;?></h2>
									<ul>
                                                                            <li><i class="fa fa-user-tie"></i><?php echo $instructor; ?></li>
										<li><i class="ti-control-forward"></i><?php
                                                                                 $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            echo $data['total'];
                                                                                ?> Lectures</li>
                                        <?php
                                        $getStudentEnroll=$conn->query("SELECT * FROM enroll WHERE course_code='$course_code'");
                                        $getTotalLength=$getStudentEnroll->num_rows;
                                        ?>
                                        <li><i class="ti-user"></i><?php  echo $getTotalLength;?> Student Enrolled</li>
                                        <?php

                                        ?>

									</ul>
								</div>
								<div class="ed_header_short">
									<p><?php echo $get_short_description;?></p>
								</div>
								
								<div class="ed_rate_info">
                                    <?php
                                    $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                    $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                    $totComents=$getReviews->num_rows;
                                    while($course_rating=$getTotalComent->fetch_assoc()){
                                        $getSumReviews=$course_rating['total'];
                                        $totalCourseRating= $getSumReviews/$totComents;
                                       if($totalCourseRating<=5 and $totalCourseRating>=4.6){
                                          ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }else if($totalCourseRating<=4.5 and $totalCourseRating>=4.0){
                                           ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }else if($totalCourseRating<=3.9 and $totalCourseRating>=3.6){
                                           ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }else if($totalCourseRating<=3.5 and $totalCourseRating>=3.0){
                                           ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }else if($totalCourseRating<=2.9 and $totalCourseRating>=2.0){
                                           ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }else if($totalCourseRating<=1.9 and $totalCourseRating>=0.0){
                                           ?>
                                           <div class="star_info">
                                               <i class="fas fa-star filled"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                           </div>
                                           <div class="review_counter">
                                               <strong class="high"></strong><?php echo $totComents; ?> Reviews
                                           </div>
                                    <?php
                                       }
                                    }
                                    ?>

								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Course Detail ================================== -->
			<section class="bg-light">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-8 col-md-8">
							
							<!-- Overview -->
							<div class="edu_wraper">
								<h4 class="edu_title">Course Overview</h4>
                                                                <p>
                                                                    <?php echo $description;?>
                                                                </p>
								<h6>Requirements</h6>
                                                                <?php
                                                                $fetch_requirements=$conn->query("SELECT * FROM course_requirement WHERE course_code='$course_code'");
                                                                while ($req_row=$fetch_requirements->fetch_assoc()){
                                                                    ?>
                                                                <ul class="lists-3">
									<li><?php echo $req_row['requirements']; ?></li>

								</ul>
                                                                <?php
                                                                }
                                                                ?>
                                                                <h6>Outcomes</h6>
                                                                <?php
                                                                $fetch_outcomes=$conn->query("SELECT * FROM course_outcome WHERE course_code='$course_code'");
                                                                while ($outcome_row=$fetch_outcomes->fetch_assoc()){
                                                                    ?>
                                                                <ul class="lists-3">
									<li><?php echo $outcome_row['outcomes']; ?></li>

								</ul>
                                                                <?php
                                                                }
                                                                ?>
								
							</div>
							
							<div class="edu_wraper">
								<h4 class="edu_title">Course Circullum</h4>
								<div id="accordionExample" class="accordion shadow circullum">
                                                                    <?php
                                                                   
                                                                   $fetch_lesson_step=$conn->query("SELECT * FROM lesson_step WHERE course_code='$course_code'");
                                                                   while($row_course=$fetch_lesson_step->fetch_assoc()){
                                                                       ?>
                                                                    	<!-- Part 1 -->
									<div class="card">
									  <div id="headingOne" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#"  aria-expanded="false" aria-controls="collapseOne" class="d-block position-relative text-dark  py-2 get_drop_down"><?php  echo $row_course['lesson_steps'];?></a></h6>
                                                                               
									  </div>
                                                                            <?php
                                                                            $step_code=$row_course['step_code'];
                                                                            $fetch_lesson_videos=$conn->query("SELECT * FROM lesson_vidoes WHERE course_code='$course_code'");
                                                                            while($get_video_row=$fetch_lesson_videos->fetch_assoc()){
                                                                                if($get_video_row['step_code']==$step_code){
                                                                                    ?>
                                                                            	  <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
										<div class="card-body pl-3 pr-3">
											<ul class="lectures_lists">
											
												<li class="unview" ><div class="lectures_lists_title"><i class="ti-control-play"></i><?php  echo $get_video_row['video_title'];?></li>
											
											</ul>
										</div>
									  </div>
                                                                            <?php
                                                                                   
                                                                                }else{
                                                                                    echo "";
                                                                                }
                                                                            }
                                                                            
                                                                            ?>
								
									</div>
                                                                    <?php
                                                                      
                                                                   }
                                                                    ?>
								

									<!-- Part 2 -->
<!--									<div class="card">
									  <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 02: Learn Web Designing in Basic Level</a></h6>
									  </div>
									  <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
										<div class="card-body pl-3 pr-3">
											<ul class="lectures_lists">
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
											</ul>
										</div>
									  </div>
									</div>-->

									<!-- Part 3 -->
<!--									<div class="card">
									  <div id="headingThree" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 03: Learn Web Designing in Advance Level</a></h6>
									  </div>
									  <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
										<div class="card-body pl-3 pr-3">
										  <ul class="lectures_lists">
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
											</ul>
										</div>
									  </div>
									</div>-->
									
									<!-- Part 04 -->
<!--									<div class="card">
									  <div id="headingThree" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 04: How To Become Succes in Designing & Development?</a></h6>
									  </div>
									  <div id="collapseThree" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
										<div class="card-body pl-3 pr-3">
										  <ul class="lectures_lists">
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
												<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
											</ul>
										</div>
									  </div>
									</div>-->

								</div>
							</div>
							
							<!-- Reviews -->
                            <script src="assets/js/jquery.min.js"></script>
							<div class="rating-overview">
								<div class="rating-overview-box">

                                    <script>
                                        $(document).ready(function(){
                                            setInterval(()=>{
                                           $.ajax({
                                               url:"getReviewlength.php",
                                               method:"GET",
                                               data:{
                                                   course_code:<?php echo $course_code;?>,

                                               }
                                           }).done(data=>{


                                                   $(".rating-overview-box-total").html(data);







                                           });
                                            },500);
                                        });
                                    </script>
									<span class="rating-overview-box-total"></span>
									<span class="rating-overview-box-percent">out of 5.0</span>
									<div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
									</div>
								</div>

								<div class="rating-bars">
									<div class="rating-bars-item">
										<span class="rating-bars-name">5 Star</span>
										<span class="rating-bars-inner">

                                             <?php
                                             $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' and rating='5' ");
                                             $getTotalComent=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                             $totOneStar=$getReviews->num_rows;
                                             $getTotalReviews= $getTotalComent->num_rows;
                                             $getFiveStarPercentage=$totOneStar/$getTotalReviews*100;
                                             ?>
											<span class="rating-bars-rating high" data-rating="4.7">
												<span class="rating-bars-rating-inner" style="width:<?php echo $getFiveStarPercentage."%";?>"></span>
											</span>
<!--											<strong>--><?php
//                                                if (empty($getFiveStarPercentage == NAN)) {
//                                                    echo "0";
//                                                } else {
//                                                    echo $getFiveStarPercentage;
//                                                }
//                                               ?><!--%</strong>-->
<!--                                            --><?php
//                                            ?>

										</span>
									</div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">4 Star</span>
										<span class="rating-bars-inner">
                                             <?php
                                             $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' and rating='4' ");
                                             $getTotalComent=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                             $totOneStar=$getReviews->num_rows;
                                             $getTotalReviews= $getTotalComent->num_rows;
                                             $getFourStarPercentage=$totOneStar/$getTotalReviews*100;
                                             ?>
											<span class="rating-bars-rating good" data-rating="3.9">
												<span class="rating-bars-rating-inner" style="width:<?php echo $getFourStarPercentage."%";?>"></span>
											</span>
<!--											<strong>--><?php
//                                                if (empty($getFourStarPercentage == NAN)) {
//                                                    echo "0";
//                                                } else {
//                                                    echo $getFourStarPercentage;
//                                                }
//                                               ?><!--%</strong>-->
<!--                                            --><?php
//
//                                            ?>
										</span>
									</div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">3 Star</span>
										<span class="rating-bars-inner">
                                             <?php
                                             $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' and rating='3' ");
                                             $getTotalComent=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                             $totOneStar=$getReviews->num_rows;
                                             $getTotalReviews= $getTotalComent->num_rows;
                                             $getTwoStarPercentage=$totOneStar/$getTotalReviews*100;
                                             ?>
											<span class="rating-bars-rating mid" data-rating="3.2">
												<span class="rating-bars-rating-inner" style="width:<?php echo $getTwoStarPercentage."%";?>"></span>
											</span>
<!--											<strong>--><?php
//
//                                                if (empty($getTwoStarPercentage == NAN)) {
//                                                    echo "0";
//                                                } else {
//                                                    echo $getTwoStarPercentage;
//                                                }
//                                               ?><!-- %</strong>-->
<!--                                            --><?php
//                                            ?>

										</span>
									</div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">2 Star</span>
                                        <span class="rating-bars-inner">
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' and rating='2' ");
                                            $getTotalComent=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                            $totOneStar=$getReviews->num_rows;
                                            $getTotalReviews= $getTotalComent->num_rows;
                                            $getTwoStarPercentage=$totOneStar/$getTotalReviews*100;
                                            ?>
                                            <span class="rating-bars-rating poor" data-rating="5.0">

												<span class="rating-bars-rating-inner one-star" style="width:<?php echo $getTwoStarPercentage."%";?>"></span>
											</span>
<!--											<strong>-->
<!---->
<!--                                                --><?php
//                                                if(empty($getTwoStarPercentage==NAN)){
//                                                    echo "0";
//                                                }else{
//                                                    echo $getTwoStarPercentage;
//                                                }
//                                               ?><!--%</strong>-->
										</span>
                                        <?php
                                        ?>

                                    </div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">1 Star</span>
										<span class="rating-bars-inner">
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' and rating='1' ");
                                            $getTotalComent=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                            $totOneStar=$getReviews->num_rows;
                                            $getTotalReviews= $getTotalComent->num_rows;
                                            $getOneStarPercentage=$totOneStar/$getTotalReviews*100;
                                            ?>
                                            <span class="rating-bars-rating poor" data-rating="5.0">

												<span class="rating-bars-rating-inner one-star" style="width:<?php echo $getOneStarPercentage."%";?>"></span>
											</span>
<!--											<strong>--><?php
//                                                if(empty( $getOneStarPercentage==NAN)){
//                                                    echo "0";
//                                                }else{
//                                                    echo $getOneStarPercentage;
//                                                }
//                                                ?><!--%</strong>-->
										</span>
                                            <?php
                                            ?>

									</div>

								</div>
							</div>
							
							<!-- instructor -->
							<div class="single_instructor">
								<div class="single_instructor_thumb">
                                                                    <?php
                                                                    $fetch_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor'");
                                                                    while($instructor_row=$fetch_instructor->fetch_assoc()){
                                                                        $instructor_id=$instructor_row['id'];
                                                                       ?>
                                                                    <a href="instructor-detail.php?instructor=<?php echo  $instructor_id;?>"><img src="./admin/instructors_image/<?php echo $instructor_row['instructor_image']; ?>" class="img-fluid" alt="" style="width:100%;"></a>
                                                                    <?php
                                                                    }
                                                                    ?>
								
								</div>
                                                           
								<div class="single_instructor_caption">
									<h4><a href="instructor-detail.php?instructor=<?php echo  $instructor_id;?>"><?php echo $instructor;?></a></h4>
									<ul class="instructor_info">
										<li><i class="ti-video-camera"></i>
                                                                                     <?php
                                                                             $count_courses=$conn->query("SELECT count(course_title) as total from courses where  instructor='$instructor'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            echo $data['total'];
                                                                            ?>
                                                                                    Videos</li>
										<li><i class="ti-control-forward"></i>
                                                                                     <?php
                                                                             $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            echo $data['total'];
                                                                            ?>
                                                                                    Lectures</li>

									</ul>
                                                                         <?php
                                                                    $fetch_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor'");
                                                                    while($instructor_row=$fetch_instructor->fetch_assoc()){
                                                                       ?>
                                                                    	<p><?php echo $instructor_row['bios'];?></p>
									<ul class="social_info">
										<li><a href="<?php echo $instructor_row['facebook'] ?>"><i class="ti-facebook"></i></a></li>
										<li><a href="<?php echo $instructor_row['twitter'];?>"><i class="ti-twitter"></i></a></li>
										<li><a href="<?php echo $instructor_row['linkedin']?>"><i class="ti-linkedin"></i></a></li>
										<li><a href="<?php echo $instructor_row['email']?>"><i class="ti-google"></i></a></li>
									</ul>
                                                                    <?php
                                                                    }
                                                                    ?>
								
								</div>
							</div>
							
							<!-- Reviews -->
                            <div style="height: 400px;overflow-y: scroll;">
							<div class="list-single-main-item fl-wrap" >
								<div class="list-single-main-item-title fl-wrap">
									<h3>Course Reviews -  <span> <?php
                                            $fetch_comments=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                            echo $fetch_comments->num_rows;
                                            ?> </span></h3>
								</div>
								<div class="reviews-comments-wrap">
									<!-- reviews-comments-item -->  

                                    <?php
                                    $fetch_comments=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code'");
                                    while($comment_row=$fetch_comments->fetch_assoc()){
                                        $comment_firstname=$comment_row['name'];
                                        ?>
                                        <div class="reviews-comments-item">
                                            <?php
                                            $fetch_Comment_image=$conn->query("SELECT * FROM students WHERE firstname='$comment_firstname'");
                                            if($fetch_Comment_image->num_rows!=0){
                                                while ($getCommentImage=$fetch_Comment_image->fetch_assoc()){
                                                    if($getCommentImage['user_image']==""){
                                                        ?>
                                                        <div class="review-comments-avatar" style="text-align: center;padding-top:20px;border:1px solid grey;font-size: 25px;">
                                                            <?php
                                                            echo substr($getCommentImage['firstname'], 0, 1) . substr($getCommentImage['lastname'], 0, 1);;
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }else{

                                                        ?>
                                                        <div class="review-comments-avatar">
                                                            <img src="./admin/students/<?php echo $getCommentImage['user_image'] ?>" class="img-fluid" alt="">
                                                        </div>

                                            <?php
                                                    }
                                                }
                                            }else{
                                                ?>
                                                <div class="review-comments-avatar" style="text-align: center;padding-top:20px;border:1px solid grey;font-size: 25px;">
                                                    <?php
                                                    echo substr( $comment_firstname, 0, 1) . substr( $comment_firstname, 1, 1);;
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="reviews-comments-item-text">
                                                <h4 class="row"><div  class="col-12"><?php echo $comment_row['name']?></div><div class="reviews-comments-item-date col-12"><i class="ti-calendar theme-cl"></i><?php echo $comment_row['date']?></div></h4>
                                                <?php
                                                $studentRating=$comment_row['rating'];
                                                if($studentRating<=5 and $studentRating>=4.6){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }
                                                else if($studentRating<=4.5 and $studentRating>=4.0){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }else if($studentRating<=3.9 and $studentRating>=3.5){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }else if($studentRating<=3.4 and $studentRating>=3.0){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }else if($studentRating<=2.9 and $studentRating>=2.0){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" ></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }else if($studentRating<=1.9 and $studentRating>=0.0){
                                                    ?>
                                                    <div ><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" ></i><i class="fa fa-star" ></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <span class="review-count"><?php echo $studentRating;?></span> </div>
                                                <?php
                                                }
                                                ?>

                                                <div class="clearfix"></div>
                                                <p><?php echo $comment_row['review'];?></p>
<!--                                                <div class="pull-left reviews-reaction">-->
<!--                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>-->
<!--                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>-->
<!--                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>-->
<!--                                                </div>-->
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
									<!--reviews-comments-item end-->  
									
									<!-- reviews-comments-item -->  
<!--									<div class="reviews-comments-item">-->
<!--										<div class="review-comments-avatar">-->
<!--											<img src="assets/img/user-2.jpg" class="img-fluid" alt=""> -->
<!--										</div>-->
<!--										<div class="reviews-comments-item-text">-->
<!--											<h4><a href="#">Rita Chawla</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>2 Nov May 2019</span></h4>-->
<!--											-->
<!--											<div class="listing-rating mid" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i><span class="review-count">3.7</span> </div>-->
<!--											<div class="clearfix"></div>-->
<!--											<p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>-->
<!--											<div class="pull-left reviews-reaction">-->
<!--												<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>-->
<!--												<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>-->
<!--												<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
									<!--reviews-comments-item end-->
									
									<!-- reviews-comments-item -->  
<!--									<div class="reviews-comments-item">-->
<!--										<div class="review-comments-avatar">-->
<!--											<img src="assets/img/user-3.jpg" class="img-fluid" alt=""> -->
<!--										</div>-->
<!--										<div class="reviews-comments-item-text">-->
<!--											<h4><a href="#">Adam Wilsom</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>10 Nov 2019</span></h4>-->
<!--											-->
<!--											<div class="listing-rating good" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i> <span class="review-count">4.2</span> </div>-->
<!--											<div class="clearfix"></div>-->
<!--											<p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>-->
<!--											<div class="pull-left reviews-reaction">-->
<!--												<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>-->
<!--												<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>-->
<!--												<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
									<!--reviews-comments-item end-->
									
								</div>
							</div>
                        </div>

							<!-- Submit Reviews -->




<?php
$get_enroll_courses=$conn->query("SELECT * FROM enroll WHERE email='$student_email' and course_code='$course_code'");
$ifExists=$get_enroll_courses->num_rows;
if($ifExists==1){
    $get_Student=$conn->query("SELECT * FROM students WHERE email='$student_email'");
    while($student_row=$get_Student->fetch_assoc()){
        ?>
        <div class="edu_wraper">
            <h4 class="edu_title">Submit Reviews</h4>
            <div class="review-form-box form-submit" >

                <div class="response-message"></div>
                <div>
                    Rate:<input type="checkbox" id="first-check" style="display: none" value=1 class="class-check">
                    <label for="first-check"  id="check-1"> <span class="fa fa-star rating" id="check-1" ></span></label>
                    <input type="checkbox" id="second-check" style="display: none" value=2 class="class-check">
                    <label for="second-check" id="check-2"> <span class="fa fa-star rating" id="check-2" ></span></label>
                    <input type="checkbox" id="third-check" style="display: none" value=3 class="class-check">
                    <label for="third-check" id="check-3">  <span class="fa fa-star rating"  id="check-3"></span></label>
                    <input type="checkbox" id="4-check" style="display: none" value=4 class="class-check">
                    <label for="4-check" id="check-41"> <span class="fa fa-star rating"  id="check-41"></span></label>
                    <input type="checkbox" id="five-check" style="display: none" value=5 class="class-check">
                    <label for="five-check" id="check-5"><span class="fa fa-star rating"  id="check-5"></span></label>
                </div>
                <script>
                    $(document).ready(function(){
                        $("#check-1").css('color','#D6DBDF');
                        $("#check-2").css('color','#D6DBDF');
                        $("#check-3").css('color','#D6DBDF');
                        $("#check-41").css('color','#D6DBDF');
                        $("#check-5").css('color','#D6DBDF');
                        $("#first-check").click(function(){

                            $("#check-1").css('color','gold');
                            $("#check-2").css('color','#D6DBDF');
                            $("#check-3").css('color','#D6DBDF');
                            $("#check-41").css('color','#D6DBDF');
                            $("#check-5").css('color','#D6DBDF');
                        });
                        $("#second-check").click(function(){

                            $("#check-1").css('color','gold');
                            $("#check-2").css('color','gold');
                            $("#check-3").css('color','#D6DBDF');
                            $("#check-41").css('color','#D6DBDF');
                            $("#check-5").css('color','#D6DBDF');
                        });
                        $("#third-check").click(function(){

                            $("#check-1").css('color','gold');
                            $("#check-2").css('color','gold');
                            $("#check-3").css('color','gold');
                            $("#check-41").css('color','#D6DBDF');
                            $("#check-5").css('color','#D6DBDF');
                        });
                        $("#4-check").click(function(){
                            console.log($("#check-41").val());
                            $("#check-1").css('color','gold');
                            $("#check-2").css('color','gold');
                            $("#check-3").css('color','gold');
                            $("#check-41").css('color','gold');
                            $("#check-5").css('color','#D6DBDF');
                        });
                        $("#five-check").click(function(){
                            console.log($("#check-5").val());
                            $("#check-1").css('color','gold');
                            $("#check-2").css('color','gold');
                            $("#check-3").css('color','gold');
                            $("#check-41").css('color','gold');
                            $("#check-5").css('color','gold');
                        })
                    })
                </script>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="display:none">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="Your Name" id="course_code" value="<?php echo $course_code;?>">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="Your Name" id="name" required value="<?php echo $student_row['firstname']?>" disabled>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="Your Email" id="email" value="<?php echo $student_row['email']?>" disabled>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Review</label>
                            <textarea class="form-control ht-140" placeholder="Review" id="review" required></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-theme" id="submit_review" value="Submit Review"></input>
                        </div>
                        <div id="please-wait" style="display:none">
                            <input type="submit" class="btn btn-theme"  value="Please wait..."></input>
                        </div>
                    </div>

                </div>

                <script>
                    $(document).ready(function(){

                        var rating="";
                        $('.class-check').on("change",function(){
                            rating=$(this).val();
                            $.ajax({
                                url:"send_reviews.php",
                                method:"post",
                                data:{
                                    rating:$(this).val()
                                }
                            }).done(data=>{
                                console.log(data);
                            })

                        });
                        $("#submit_review").click(function(){
                            var name=$("#name").val();
                            var email=$("#email").val();
                            var message=$("#review").val();
                            var courseCode=$("#course_code").val();
                            if(name===""||email===""||message===""){
                                $(".response-message").html("<div class='alert alert-danger' role='alert'>Please fill out all required fields</div>");
                            }
                            else if(rating===""){
                                $(".response-message").html("<div class='alert alert-danger' role='alert'>Please click on the rate icon to rate course</div>");
                            }
                            else{
                                $.ajax({
                                    method:"post",
                                    url:"send_reviews.php",
                                    data:{
                                        name:$("#name").val(),
                                        email:$("#email").val(),
                                        review:$("#review").val(),
                                        rating:rating,
                                        submit:$("#submit_review").val(),
                                        courseCode:courseCode
                                    }
                                }).done(data=>{
                                    if(data===""){
                                        $("#please-wait").show();
                                    }else{

                                        $(".response-message").html("<div class='alert alert-success' role='alert'>"+data+"</div>");

                                    }


                                });

                            }
                        })
                    });

                </script>
            </div>
        </div>
                            <?php
    }

}
?>

							
						</div>
						
						<!-- Sidebar -->
						<div class="col-lg-4 col-md-4">
						
							<div class="ed_view_box style_2">
							<?php
                                                        $fetch_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor'");
                                                        while($fetch_row=$fetch_instructor->fetch_assoc()){
                                                            ?>
                                                            <div class="ed_author">
									<div class="ed_author_thumb">
                                                                            <img class="img-fluid" src="./admin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" alt="7.jpg">
									</div>
                                                                    <span><?php echo $fetch_row['full_name'];?><br><?php echo $fetch_row['email'];?></span>
									
								</div>
                                                            <?php
                                                        }
                                                        ?>
								
								
								<div class="ed_view_price pl-4">
									<span>Actual Price</span>
									<h2 class="theme-cl"><?php
                                                                        if($course_price=="free"){
                                                                            echo "Free";
                                                                        }else{
                                                                             echo $course_price-($discount/100*$course_price);
                                                                        }
                                                                        ?></h2>
								</div>
<!--								<div class="ed_view_features pl-4">
									<span>Course Features</span>
									<ul>
										<li><i class="ti-angle-right"></i>Fully Programming</li>
										<li><i class="ti-angle-right"></i>Help Code to Code</li>
										<li><i class="ti-angle-right"></i>Free Trial 7 Days</li>
										<li><i class="ti-angle-right"></i>Unlimited Videos</li>
										<li><i class="ti-angle-right"></i>24x7 Support</li>
									</ul>
								</div>-->
								<div class="ed_view_link">
                                                                   
                                                                    <form action="" method="post">
                                                                       
                                                                        <input type="submit" name="enroll" class="btn btn-theme enroll-btn" value="Enroll Now"></input>
                                                                    </form>
								
								</div>
								
							</div>	
							
							<div class="edu_wraper">
								<h4 class="edu_title">Course Features</h4>
								<ul class="edu_list right">
                                    <?php
                                    $getStudentEnroll=$conn->query("SELECT * FROM enroll WHERE course_code='$course_code'");
                                    $getTotalLength=$getStudentEnroll->num_rows;
                                    ?>
                                    <li><i class="ti-user"></i>Student Enrolled:<strong><?php echo  $getTotalLength;?></strong></li>
                                    <?php

                                    ?>

                                                                        <li><i class="ti-files"></i>lectures:<strong>
                                                                            <?php
                                                                             $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            echo $data['total'];
                                                                            ?>
                                                                            </strong></li>
									<li><i class="ti-game"></i>Quizzes:<strong><?php echo $quiz;?></strong></li>
									<li><i class="ti-time"></i>Duration:<strong><?php echo $time; ?></strong></li>
									<li><i class="ti-tag"></i>Skill Level:<strong><?php echo $course_level;?></strong></li>
									<li><i class="ti-flag-alt"></i>Language:<strong><?php echo $course_language;?></strong></li>
									<li><i class="ti-shine"></i>Assessment:<strong><?php
                                                                        echo $assignment;
                                                                        ?></strong></li>

								</ul>
							</div>
							
						</div>
					
					</div>
				</div>
			</section>
			<!-- ============================ Course Detail ================================== -->
			
			<!-- ============================== Start Newsletter ================================== -->
<!--			<section class="newsletter theme-bg inverse-theme">-->
<!--				<div class="container">-->
<!--					<div class="row justify-content-center">-->
<!--						<div class="col-lg-7 col-md-8 col-sm-12">-->
<!--							<div class="text-center">-->
<!--								<h2>Join Thousand of Happy Students!</h2>-->
<!--								<p>Subscribe our newsletter & get latest news and updation!</p>-->
<!--								<form class="sup-form">-->
<!--									<input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">-->
<!--									<input type="submit" class="btn btn-theme" value="Get Started">-->
<!--								</form>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
			<!-- ================================= End Newsletter =============================== -->
			
			<!-- ============================ Footer Start ================================== -->
            <footer class="dark-footer skin-dark-footer">
                <div>
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-3">
                                <div class="footer-widget">
                                    <img src="assets/img/mozisha-logo.png" class="img-footer" alt="" />
                                    <div class="footer-add">
                                        <p>Lagos: D2, Road 3B, Diamond Estate, Lagos, Nigeria</p>
                                        <p>Ondo: 156 Ondo-Ore Road, Beside Adesuper Bakery, Ondo City, Nigeria</p>
                                        <p><a href="tel:+2349056516559">+2349056516559</a>, <a href="tel:+2348034425355">+2348034425355</a></p>
                                        <p>info@mozisha.com</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="footer-widget">
                                    <h4 class="widget-title">Navigations</h4>
                                    <ul class="footer-menu">
                                        <li><a href="category.php">Categories</a></li>
                                        <li><a href="instructors.php.php">Instructors</a></li>
                                        <li><a href="dashboard.php">Student</a></li>
                                        <li><a href="faq.html">FAQs Page</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="contact.html">Contact</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3">
                                <div class="footer-widget">
                                    <h4 class="widget-title">Categories</h4>
                                    <ul class="footer-menu">
                                        <li><a href="#">Designing</a></li>
                                        <li><a href="#">Programming</a></li>
                                        <li><a href="#">Makeup Artists</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3">
                                <div class="footer-widget">
                                    <h4 class="widget-title">Help & Support</h4>
                                    <ul class="footer-menu">
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="#">Live Chat</a></li>
                                        <li><a href="#">Mail Us</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li><a href="#">Faqs</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--							<div class="col-lg-3 col-md-12">-->
                            <!--								<div class="footer-widget">-->
                            <!--									<h4 class="widget-title">Download Apps</h4>-->
                            <!--									<a href="#" class="other-store-link">-->
                            <!--										<div class="other-store-app">-->
                            <!--											<div class="os-app-icon">-->
                            <!--												<i class="lni-playstore theme-cl"></i>-->
                            <!--											</div>-->
                            <!--											<div class="os-app-caps">-->
                            <!--												Google Play-->
                            <!--												<span>Get It Now</span>-->
                            <!--											</div>-->
                            <!--										</div>-->
                            <!--									</a>-->
                            <!--									<a href="#" class="other-store-link">-->
                            <!--										<div class="other-store-app">-->
                            <!--											<div class="os-app-icon">-->
                            <!--												<i class="lni-apple theme-cl"></i>-->
                            <!--											</div>-->
                            <!--											<div class="os-app-caps">-->
                            <!--												App Store-->
                            <!--												<span>Now it Available</span>-->
                            <!--											</div>-->
                            <!--										</div>-->
                            <!--									</a>-->
                            <!--								</div>-->
                            <!--							</div>-->

                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6">

                                <p class="mb-0"> © Copyright 2020 | Mozisha Powered by <a href="https://mozisha.com/">Mozisha International </a> | All Rights Reserved .</p>
                            </div>

                            <div class="col-lg-6 col-md-6 text-right">
                                <ul class="footer-bottom-social">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
<!--			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log In</h4>
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="Username">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="*******">
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Login</button>
									</div>
								
								</form>
							</div>
							
							<div class="social-login mb-3">
								<ul>
									<li>
										<input id="reg" class="checkbox-custom" name="reg" type="checkbox">
										<label for="reg" class="checkbox-custom-label">Save Password</label>
									</li>
									<li><a href="#" class="theme-cl">Forget Password?</a></li>
								</ul>
							</div>
							
							<div class="text-center">
								<p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			 End Modal 
			
			 Sign Up Modal 
			<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="sign-up">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Sign Up</h4>
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Full Name">
									</div>
									
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Email">
									</div>
									
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Username">
									</div>
									
									<div class="form-group">
										<input type="password" class="form-control" placeholder="*******">
									</div>

									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
									</div>
								
								</form>
							</div>
							<div class="text-center">
								<p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>-->
			<!-- End Modal -->
			
			<!-- Video Modal -->
			<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
                <?php echo $course_video_overview;?>
				<div class="modal-dialog modal-dialog-centered" role="document">
					<iframe class="embed-responsive-item" width="100%" height="480" src="./admin/videos/<?php echo $course_video_overview;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			<!-- End Video Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/counterup.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>


</html>