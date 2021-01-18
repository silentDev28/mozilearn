<?php
include "conn.php";
session_start();
$active_student="";
if(empty($_SESSION['student_email'])){
   echo "";
}else{
    $active_student= $_SESSION['student_email'];
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
		
        <title>Mozilearn - Online Course</title>
		 
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
			<div class="header header-transparent change-logo">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand static-logo" href="index.php"><img src="assets/img/mozisha-logo.png" class="logo" alt="" /></a>
							<a class="nav-brand fixed-logo" href="index.php"><img src="assets/img/logo-black.png" class="logo" alt="" /></a>

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
<!--											<ul class="nav-dropdown nav-submenu">-->
<!--												<li><a href="dashboard.php">User Dashboard</a></li>-->
<!--												<li><a href="my-profile.html">My Profile</a></li>-->
<!--												<li><a href="all-courses.php">My Courses</a></li>-->
<!--												<li><a href="my-order.php">My Order</a></li>-->
<!--												<li><a href="saved-courses.html">Saved Courses</a></li>-->
<!--												<li><a href="reviews.php">My Reviews</a></li>-->
<!--												<li><a href="settings.html">My Settings</a></li>-->
<!--											</ul>-->
										</li>
<!--										<li><a href="#">Shop Pages<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="shop-full-width.html">Shop Full Width</a></li>
												<li><a href="shop-left-sidebar.html">Shop Sidebar Left</a></li>
												<li><a href="shop-right-sidebar.html">Shop Sidebar Right</a></li>
												<li><a href="product-detail.html">Shop Detail</a></li>
												<li><a href="add-to-cart.html">Add To Cart</a></li>
												<li><a href="product-wishlist.html">Wishlist</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="shop-order.html">Order</a></li>
											</ul>
										</li>-->
<!--										<li><a href="about-us.html">About Us</a></li>
										<li><a href="blog.html">Blog Style</a></li>
										<li><a href="blog-detail.html">Blog Detail</a></li>
										<li><a href="pricing.html">Pricing</a></li>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="component.html">Elements</a></li>
										<li><a href="privacy.html">Privacy Policy</a></li>-->
<!--										<li><a href="faq.html">FAQs</a></li>-->
									</ul>
								</li>
								
<!--								<li><a href="contact.html">Contact</a></li>-->
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<?php
                                if(empty($active_student)){
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

<!--								<li class="login_click bg-blue">
									<a href="submit-property.html">Sign up</a>
								</li>-->
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero_banner" style="background:#003783;" data-overlay="0">
				<div class="container">
					<!-- Type -->
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="banner-search-2 transparent">
								<h1 class="big-header-capt cl_2 mb-2">Start Learning with Mozilearn Now</h1>
								<p>Study any topic, anytime. Choose from thousands of expert-led expelio terms courses now.</p>
								<div class="mt-4">
									<div class="banner-search shadow_high">
										<div class="search_hero_wrapping">
											<div class="row">
											
												<div class="col-lg-10 col-md-10 col-sm-12">
													<div class="form-group">
														<div class="input-with-icon">
															<input type="text" class="form-control" placeholder="Keyword">
															<img src="assets/img/search.svg" class="search-icon" alt="">
														</div>
													</div>
												</div>
												
												<div class="col-lg-2 col-md-2 col-sm-12 pl-0">
													<div class="form-group none">
														<a href="#" class="btn search-btn full-width">Go</a>
													</div>
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="flixio pt-5">
                                <img class="img-fluid" src="assets/img/edu_2.png" alt="">
                            </div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Trips Facts Start ================================== -->
			<div class="trips_wrap full light-colors">
				<div class="container">
					<div class="row m-0">
					
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="trips">
								<div class="trips_icons">
									<i class="ti-video-camera"></i>
								</div>
								<div class="trips_detail">
									<h4>100,000 online courses</h4>
									<p>Nor again is there anyone who loves or pursues or desires</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="trips">
								<div class="trips_icons">
									<i class="ti-medall"></i>
								</div>
								<div class="trips_detail">
									<h4>Expert instruction</h4>
									<p>Nam libero tempore, cum soluta and nobis est eligendi optio</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="trips none">
								<div class="trips_icons">
									<i class="ti-infinite"></i>
								</div>
								<div class="trips_detail">
									<h4>Lifetime access</h4>
									<p>These cases are perfectly simple and easy to distinguish</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- ============================ Trips Facts Start ================================== -->
			
			<!-- ========================== Featured Category Section =============================== -->
			<section>
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>Popular Category</p>
								<h2><span class="theme-cl">Hot & Popular</span> Category For Learn</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
                                            <?php
                                           
                                            $fetch_category=$conn->query("SELECT * FROM category");
                                            while($cat_row=$fetch_category->fetch_assoc()){
                                                $getCategoryTitle=$cat_row['cat_title'];
                                                ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-1">
								<div class="edu_cat_icons">
                                                                    <a class="pic-main" href="category.php?category=<?php echo $cat_row['cat_title'] ?>"><img src="./admin/category_images/<?php echo $cat_row['cat_image']; ?>" class="img-fluid" alt="" style="width:100%;height: 100%;"/></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="category.php?category=<?php echo $cat_row['cat_title'] ?>"><?php echo $cat_row['cat_title'];?></a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i><?php  
                                                                                 $count_my_course=$conn->query("SELECT count(course_title) as total from courses where category='$getCategoryTitle'");
                                                                                            $data=$count_my_course->fetch_assoc();
                                                                               echo $data['total']; ?> Courses</li>
									</ul>
								</div>
							</div>							
						</div>
                                            <?php
                                            }
                                            ?>
						
			
					</div>
					
				</div>
			</section>
			<!-- ========================== Featured Category Section =============================== -->
			
			<!-- ============================ Featured Courses Start ================================== -->
			<section class="gray-bg">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>Hot & Trending</p>
								<h2><span class="theme-cl">Featured</span> Courses of The Month</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<!-- Cource Grid 1 -->
                                               <?php
                                               $instructor_name="";
                                               $course_code="";
                                              $get_some_courses=$conn->query("SELECT * FROM courses ORDER BY `id` DESC LIMIT 6");
                                               while($courses_row=$get_some_courses->fetch_assoc()){
                                                  $instructor_name=$courses_row['instructor'];
                                                   $course_code=$courses_row['course_code'];
                                                 ?>
                                               			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout">
								
								<div class="education_block_thumb n-shadow">
                                                                    <a href="course-detail.php?course_id=<?php echo $courses_row['id']; ?>"><img src="./admin/category_images/<?php echo $courses_row['course_picture']?>" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.php?course_id=<?php echo $courses_row['id']; ?>"><?php
                                                                                $out = strlen($courses_row['course_title']) > 50 ? substr($courses_row['course_title'],0,50)."..." : $courses_row['course_title'];
                                                                                echo $out;?></a></h4>
										<div class="course_rate_system">
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                            $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                            $totComents=$getReviews->num_rows;
                                           if($totComents!=0){
                                               while($course_rating=$getTotalComent->fetch_assoc()) {
                                                   $getSumReviews = $course_rating['total'];
                                                   $totalCourseRating = $getSumReviews / $totComents;

                                                   if($totalCourseRating<=5 and $totalCourseRating>=4.6){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }else if($totalCourseRating<=4.5 and $totalCourseRating>=4.0){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }else if($totalCourseRating<=3.9 and $totalCourseRating>=3.6){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }else if($totalCourseRating<=3.5 and $totalCourseRating>=3.0){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star "></i>
                                                           <i class="fa fa-star"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }else if($totalCourseRating<=2.9 and $totalCourseRating>=2.0){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star "></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }else if($totalCourseRating<=1.9 and $totalCourseRating>=0.0){
                                                       ?>
                                                       <div class="course_ratting">
                                                           <i class="fa fa-star filled"></i>
                                                           <i class="fa fa-star "></i>
                                                           <i class="fa fa-star "></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                       </div>
                                                       <div class="course_reviews_info">
                                                           <strong class="high"></strong>(<?php echo $totComents ?> Reviews)
                                                       </div>
                                                       <?php
                                                   }
                                               }
                                           }else{
                                               ?>
                                               <div class="course_ratting">
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star "></i>
                                                   <i class="fa fa-star "></i>
                                                   <i class="fa fa-star "></i>
                                                   <i class="fa fa-star"></i>
                                               </div>
                                               <div class="course_reviews_info">
                                                   <strong class="high"></strong>(0 Reviews)
                                               </div>
                                               <?php
                                           }
                                            ?>

										</div>
										<div class="cources_price"><?php 
                                                                                if($courses_row['course_price']=="free"){
                                                                                    ?>
                                                                                    <div class="less_offer"></div><?php echo $courses_row['course_price']; ?><div class="less_offer"></div>
                                                                                    <?php
                                                                                }else{
                                                                                    $less_price=$courses_row['course_price']-($courses_row['course_price']/100)*$courses_row['discount_percentage'];
                                                                                    ?>
                                                                                     <div class="less_offer"></div><?php echo $less_price; ?><div class="less_offer"><?php echo $courses_row['course_price'];?></div>
                                                                                    <?php
                                                                                    
                                                                                }
                                                                                ?></div>
									</div>

									<div class="education_block_footer mt-3">
                                                                            <!--instructor name-->
                                                                            <?php
                                                                           
                                                                            $select_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor_name'");
                                                                            while($fetch_row=$select_instructor->fetch_assoc()){
                                                                               ?>
                                                                             <div class="education_block_author">
                                                                                 <div class="path-img"><a href="instructor-detail.php"><img src="../../../mozishaAdmin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" class="img-fluid" alt=""></a></div>
											<h5><a href="instructor-detail.php"><?php echo $fetch_row['full_name']; ?></a></h5>
										</div>
                                                                            <div class="cources_info_style3">
											<ul>
                                                                                            <?php
                                                                                            
                                                                                            $instructor_name=$fetch_row['full_name'];
                                                                                         
                                                                                           
                                                                                            $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();


                                                                                           
                                                                                            ?>
                                                                                            	<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i><?php echo $data['total']; ?> lectures</div></li>
                                                                                            <?php
                                                                                            ?>
											
											</ul>
										</div>
                                                                            <?php
                                                                            }
                                                                            ?>
										
                                                                            
										
									</div>
								
								</div>
								
							</div>	
						</div>
						
                                              <?php
                                               }
                                               ?>
			
                                        </div>
						
						
			</section>
			<!-- ========================== About Facts List Section =============================== -->
			
			<!-- ============================ Featured Instructor Start ================================== -->
<!--			<section class="pt-0">-->
<!--				<div class="container">-->
<!--				-->
<!--					<div class="row justify-content-center">-->
<!--						<div class="col-lg-5 col-md-6 col-sm-12">-->
<!--                                                    <div class="sec-heading center" style="padding-top: 80px">-->
<!--								<p>Meet Instructors</p>-->
<!--								<h2><span class="theme-cl">Top & Famous</span> Instructor in Your City</h2>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					-->
<!--					<div class="row">-->
<!--						<div class="col-lg-12 col-md-12 col-sm-12">-->
<!--						-->
<!--							<div class="four_slide-dots articles arrow_middle">-->
								
								<!-- Single Slide -->
<!--								<div class="singles_items">-->
<!--									<div class="instructor_wrap mid">-->
<!--										<div class="instructor_thumb">-->
<!--											<a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="instructor_caption">-->
<!--											<h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>-->
<!--											<span class="skills-min">Web Designer</span>-->
<!--											<ul class="colored">-->
<!--												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>-->
<!--												<li><a href="#" class="cl-google"><i class="ti-google"></i></a></li>-->
<!--												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										-->
<!--										<div class="cources_info_style3">-->
<!--											<ul>-->
<!--												<li><i class="ti-user mr-2"></i>32k Students</li>-->
<!--												<li><i class="ti-book mr-2"></i>3 Courses</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										-->
<!--									</div>-->
<!--								</div>-->
								
								<!-- Single Slide -->
<!--								<div class="singles_items">-->
<!--									<div class="instructor_wrap mid">-->
<!--										<div class="instructor_thumb">-->
<!--											<a href="instructor-detail.html"><img src="assets/img/user-2.jpg" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="instructor_caption">-->
<!--											<h4><a href="instructor-detail.html">Shilpa Singh</a></h4>-->
<!--											<span class="skills-min">Team Manager</span>-->
<!--											<ul class="colored">-->
<!--												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>-->
<!--												<li><a href="#" class="cl-google"><i class="ti-google"></i></a></li>-->
<!--												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										<div class="cources_info_style3">-->
<!--											<ul>-->
<!--												<li><i class="ti-user mr-2"></i>40k Students</li>-->
<!--												<li><i class="ti-book mr-2"></i>3 Courses</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
								
								<!-- Single Slide -->
<!--								<div class="singles_items">-->
<!--									<div class="instructor_wrap mid">-->
<!--										<div class="instructor_thumb">-->
<!--											<a href="instructor-detail.html"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="instructor_caption">-->
<!--											<h4><a href="instructor-detail.html">Adam Wistom</a></h4>-->
<!--											<span class="skills-min">Sales Manager</span>-->
<!--											<ul class="colored">-->
<!--												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>-->
<!--												<li><a href="#" class="cl-google"><i class="ti-google"></i></a></li>-->
<!--												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										<div class="cources_info_style3">-->
<!--											<ul>-->
<!--												<li><i class="ti-user mr-2"></i>60k Students</li>-->
<!--												<li><i class="ti-book mr-2"></i>3 Courses</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
								
								<!-- Single Slide -->
<!--								<div class="singles_items">-->
<!--									<div class="instructor_wrap mid">-->
<!--										<div class="instructor_thumb">-->
<!--											<a href="instructor-detail.html"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="instructor_caption">-->
<!--											<h4><a href="instructor-detail.html">Ragini Singh</a></h4>-->
<!--											<span class="skills-min">Business Executing</span>-->
<!--											<ul class="colored">-->
<!--												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>-->
<!--												<li><a href="#" class="cl-google"><i class="ti-google"></i></a></li>-->
<!--												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										<div class="cources_info_style3">-->
<!--											<ul>-->
<!--												<li><i class="ti-user mr-2"></i>45k Students</li>-->
<!--												<li><i class="ti-book mr-2"></i>2 Courses</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
								
								<!-- Single Slide -->
<!--								<div class="singles_items">-->
<!--									<div class="instructor_wrap mid">-->
<!--										<div class="instructor_thumb">-->
<!--											<a href="instructor-detail.html"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="instructor_caption">-->
<!--											<h4><a href="instructor-detail.html">Daniel Wilson</a></h4>-->
<!--											<span class="skills-min">HR Manager</span>-->
<!--											<ul class="colored">-->
<!--												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>-->
<!--												<li><a href="#" class="cl-google"><i class="ti-google"></i></a></li>-->
<!--												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>-->
<!--											</ul>-->
<!--										</div>-->
<!--										<div class="cources_info_style3">-->
<!--											<ul>-->
<!--												<li><i class="ti-user mr-2"></i>60k Students</li>-->
<!--												<li><i class="ti-book mr-2"></i>3 Courses</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							-->
<!--							</div>-->
<!--						-->
<!--						</div>-->
<!--					</div>-->
<!--					-->
<!--				</div>-->
<!--			</section>-->
			<!-- ============================ Featured Instructor End ================================== -->
			
			<!-- ========================== Articles Section =============================== -->
<!--			<section class="bg-light">-->
<!--				<div class="container">-->
<!--				-->
<!--					<div class="row justify-content-center">-->
<!--						<div class="col-lg-5 col-md-6 col-sm-12">-->
<!--							<div class="sec-heading center">-->
<!--								<p>Our Story</p>-->
<!--								<h2><span class="theme-cl">Recent</span> Articles to You</h2>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					-->
<!--					<div class="row">-->

						<!-- Single Article -->
<!--						<div class="col-lg-4 col-md-4 col-sm-12">-->
<!--							<div class="articles_grid_style">-->
<!--								<div class="articles_grid_thumb">-->
<!--									<a href="blog-detail.html"><img src="assets/img/b-1.jpg" class="img-fluid" alt="" /></a>-->
<!--								</div>-->
<!--								-->
<!--								<div class="articles_grid_caption">-->
<!--									<h4>The National Minimum wage is an important part</h4>-->
<!--									<div class="articles_grid_author">-->
<!--										<div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>-->
<!--										<h4>Adam Willsone</h4>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->

						<!-- Single Article -->
<!--						<div class="col-lg-4 col-md-4 col-sm-12">-->
<!--							<div class="articles_grid_style">-->
<!--								<div class="articles_grid_thumb">-->
<!--									<a href="blog-detail.html"><img src="assets/img/b-2.jpg" class="img-fluid" alt="" /></a>-->
<!--								</div>-->
<!--								-->
<!--								<div class="articles_grid_caption">-->
<!--									<h4>The National Minimum wage is an important part</h4>-->
<!--									<div class="articles_grid_author">-->
<!--										<div class="articles_grid_author_img"><img src="assets/img/user-2.jpg" class="img-fluid" alt="" /></div>-->
<!--										<h4>Rikki Sen</h4>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->

						<!-- Single Article -->
<!--						<div class="col-lg-4 col-md-4 col-sm-12">-->
<!--							<div class="articles_grid_style">-->
<!--								<div class="articles_grid_thumb">-->
<!--									<a href="blog-detail.html"><img src="assets/img/b-3.jpg" class="img-fluid" alt="" /></a>-->
<!--								</div>-->
<!--								-->
<!--								<div class="articles_grid_caption">-->
<!--									<h4>The National Minimum wage is an important part</h4>-->
<!--									<div class="articles_grid_author">-->
<!--										<div class="articles_grid_author_img"><img src="assets/img/user-3.jpg" class="img-fluid" alt="" /></div>-->
<!--										<h4>Daniel Wikjones</h4>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
			<!-- ========================== Articles Section =============================== -->
			
			<!-- ========================== Brand Section =============================== -->
			<!-- <section>
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>New &amp; Trending</p>
								<h2><span class="theme-cl">Trusted</span> by our professional partner</h2>
							</div>
						</div>
					</div>
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="single_brand" id="brand-slide"> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-1.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-2.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-3.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-4.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-5.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-6.png" class="img-fluid" alt="" />
								</div> -->
								
								<!-- single -->
								<!-- <div class="single_brands">
									<img src="assets/img/brand-7.png" class="img-fluid" alt="" />
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- ========================== Brand Section =============================== -->
			
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
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
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
			<!-- End Modal -->
			
			<!-- Sign Up Modal -->
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
			</div>
			<!-- End Modal -->
			
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