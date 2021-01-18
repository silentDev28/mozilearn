
<?php
include 'conn.php';
session_start();
$active_student="";
if(empty($_SESSION['student_email'])){
     header("Location:"."index.php");
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

                            </a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li><a href="index.php">Home<span class="submenu-indicator"></span></a>
<!--									<ul class="nav-dropdown nav-submenu">
										<li><a href="index.html">Home 1</a></li>
										<li><a href="home-2.html">Home 2</a></li>
										<li><a href="home-3.html">Home 3</a></li>
										<li><a href="home-4.html">Home 4</a></li>
										<li><a href="home-5.html">Home 5</a></li>
										<li><a href="home-6.html">Home 6</a></li>
										<li><a href="home-7.html">Home 7</a></li>
										<li><a href="home-8.html">Home 8</a></li>
										<li><a href="home-9.html">Home 9</a></li>
										<li><a href="home-10.html">Home 10</a></li>
									</ul>-->
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
<!--                                        <li><a href="faq.html">FAQs</a></li>-->
                                    </ul>
                                </li>

<!--                                <li><a href="contact.html">Contact</a></li>-->
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<li class="login_click theme-bg">

                                    <form method="post">
                                        <input type="submit" value="Log Out" name="logout" style="color:white;border: none;margin-top: 10px;background:none;cursor: pointer">
                                    </form>

<!--									<a href="register.html">Log Out</a>-->
								</li>
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

			
			<!-- ============================ Dashboard: Dashboard Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">
										
					<div class="row">
					
						<div class="col-lg-3 col-md-3 p-0">
							<div class="dashboard-navbar">
                                <?php
                                $fetch_student=$conn->query("SELECT * FROM students WHERE email='$active_student'");
                                while($get_profile=$fetch_student->fetch_assoc()){
                                    ?>
                                    <div class="d-user-avater">
                                        <?php
                                        if($get_profile['user_image']){

                                            ?>
                                            <img src="./admin/students/<?php echo $get_profile['user_image']; ?>" class="img-fluid avater" alt="">
                                            <h4><?php echo $get_profile['firstname']." ".$get_profile['lastname'];?></h4>
                                            <span><?php echo $get_profile['email'];?></span>
                                            <?php
                                        }else{
                                            ?>
                                            <div style="display: flex;justify-content: center">
                                                <div style="width: 130px;height: 130px;border-radius: 100%;padding-top: 30px;border: 1px solid gray;font-size: 50px">
                                                    <span> <?php echo substr($get_profile['firstname'], 0, 1)?></span> <span><?php echo substr($get_profile['lastname'], 0, 1)?></span>
                                                </div>

                                            </div>
                                            <h4><?php echo $get_profile['firstname']." ".$get_profile['lastname'];?></h4>
                                            <span><?php echo $get_profile['email'];?></span>
                                            <?php
                                        }
                                        ?>



                                    </div>
                                    <?php
                                }
                                ?>


                                <div class="d-navigation">
									<ul id="side-menu">
										<li class="active"><a href="dashboard.php"><i class="ti-user"></i>Dashboard</a></li>
<!--										<li><a href="my-profile.php"><i class="ti-heart"></i>My Profile</a></li>-->
<!--										<li><a href="saved-courses.php"><i class="ti-heart"></i>Saved Courses</a></li>-->
										<li class="dropdown">
											<a href="all-courses.php"><i class="ti-layers"></i>All Courses</a>
<!--											<ul class="nav nav-second-level">-->
<!--												<li><a href="all-courses.php">All</a></li>-->
<!--												<li><a href="javascript:void(0);">Published</a></li>-->
<!--												<li><a href="javascript:void(0);">Pending</a></li>-->
<!--												<li><a href="javascript:void(0);">Expired</a></li>-->
<!--												<li><a href="javascript:void(0);">In Draft</a></li>-->
<!--											</ul>-->
										</li>
										<li><a href="my-order.php"><i class="ti-shopping-cart"></i>My Order</a></li>
<!--										<li><a href="settings.php"><i class="ti-settings"></i>Settings</a></li>-->
										<li><a href="reviews.php"><i class="ti-comment-alt"></i>Reviews</a></li>
<!--										<li><a href="#"><i class="ti-power-off"></i>Log Out</a></li>-->
									</ul>
								</div>
								
							</div>
							
							
						</div>	
						
						<div class="col-lg-9 col-md-9 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
						
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="dashboard_stats_wrap widget-1">
                                        <?php
                                        $get_length_enroll=$conn->query("SELECT * FROM enroll WHERE email='$active_student'");
                                        ?>
                                        <div class="dashboard_stats_wrap_content"><h4><?php echo $get_length_enroll->num_rows;?></h4> <span>Enroll Course</span></div>
                                        <?php
                                        ?>

										<div class="dashboard_stats_wrap-icon"><i class="fa fa-video"></i></div>
									</div>	
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="dashboard_stats_wrap widget-2">
                                        <?php
                                        $fetchCourses=$conn->query("SELECT * FROM courses");
                                        ?>
                                        <div class="dashboard_stats_wrap_content"><h4><?php echo $fetchCourses->num_rows; ?></h4> <span>Total Courses</span></div>
                                        <?php
                                        ?>

										<div class="dashboard_stats_wrap-icon"><i class="fa fa-chalkboard-teacher"></i></div>
									</div>	
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="dashboard_stats_wrap widget-4">
                                        <?php
                                        $getTotalStudents=$conn->query("SELECT * FROM students");
                                        ?>
                                        <div class="dashboard_stats_wrap_content"><h4><?php echo $getTotalStudents->num_rows; ?></h4> <span>Total Students</span></div>
                                        <?php
                                        ?>

										<div class="dashboard_stats_wrap-icon"><i class="fa fa-user-friends"></i></div>
									</div>	
								</div>

							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
						
								<div class="col-lg-8 col-md-12 col-sm-12">
									<div class="row">
                                                                           
										<?php
                                                                               
                                                                                $fetch_enroll=$conn->query("SELECT * FROM enroll WHERE email='$active_student'");
                                                                                while($row=$fetch_enroll->fetch_assoc()){
                                                                                   $course_code=$row['course_code'];
                                                                                   $get_enroll_courses=$conn->query("SELECT * FROM courses where course_code='$course_code' ORDER BY `id` DESC LIMIT 4");
                                                                                   while($course_row=$get_enroll_courses->fetch_assoc()){
                                                                                      
                                                                                       ?>
                                                                            <div class="col-6">
                                                                                <img src="./admin/category_images/<?php echo $course_row['course_picture']; ?>" class="img-fluid" alt="">
                                                                                <h5><?php echo $course_row['course_title']?></h5>
                                                                            </div>
                                                                            <?php
                                                                                   }
                                                                                       
                                                                                   }
                                                                                   
                                                                              
                                                                                ?>
										
										
										
										
										
										
										
									</div>
								</div>
								
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="card">
										<div class="card-header">
											<h6>Notifications</h6>
										</div>
                                        <?php
                                        $fetch_notification=$conn->query("SELECT * FROM enroll WHERE email='$active_student'");
                                        while($row=$fetch_notification->fetch_assoc()) {
                                            $course_code = $row['course_code'];
                                            $get_enroll_courses = $conn->query("SELECT * FROM courses where course_code='$course_code' ORDER BY `id` DESC LIMIT 4");
                                            while($getNotify= $get_enroll_courses->fetch_assoc()){
                                                ?>
                                        <div class="ground-list ground-hover-list">
                                            <div class="ground ground-list-single">
                                                <a href="#">
                                                    <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
                                                </a>

                                                <div class="ground-content">
                                                    <h6 style="font-weight: normal">You have enroll for a course by <a style="font-weight: bold"><?php echo $getNotify['instructor'];?></a></h6>
                                                    <small class="text-fade"><?php echo $getNotify['course_title'];?></small>
                                                    <span class="small"><?php echo $getNotify['date'];?></span>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>

<!--											-->
<!--											<div class="ground ground-list-single">-->
<!--												<a href="#">-->
<!--													<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>-->
<!--												</a>-->
<!---->
<!--												<div class="ground-content">-->
<!--													<h6><a href="#">Maryam Amiri</a></h6>-->
<!--													<small class="text-fade">You can Customize..</small>-->
<!--													<span class="small">02 Min Ago</span>-->
<!--												</div>-->
<!--											</div>-->
<!--											-->
<!--											<div class="ground ground-list-single">-->
<!--												<a href="#">-->
<!--													<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>-->
<!--												</a>-->
<!---->
<!--												<div class="ground-content">-->
<!--													<h6><a href="#">Maryam Amiri</a></h6>-->
<!--													<small class="text-fade">Need Responsive Business Tem...</small>-->
<!--													<span class="small">10 Min Ago</span>-->
<!--												</div>-->
<!--											</div>-->
											
<!--											<div class="ground ground-list-single">-->
<!--												<a href="#">-->
<!--													<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>-->
<!--												</a>-->
<!---->
<!--												<div class="ground-content">-->
<!--													<h6><a href="#">Maryam Amiri</a></h6>-->
<!--													<small class="text-fade">Next Meeting on Tuesday..</small>-->
<!--													<span class="small">15 Min Ago</span>-->
<!--												</div>-->
<!--											</div>-->
											
										</div>
									</div>		
								</div>

							</div>
							<!-- /Row -->
							
							<!-- Row -->
<!--							<div class="row">-->
<!--						-->
<!--								<div class="col-lg-12 col-md-12 col-sm-12">-->
<!--									<div class="dashboard_container">-->
<!--										<div class="dashboard_container_header">-->
<!--											<div class="dashboard_fl_1">-->
<!--												<h4>Recent Order</h4>-->
<!--											</div>-->
<!--										</div>-->
<!--										<div class="dashboard_container_body">-->
<!--											<div class="table-responsive">-->
<!--												<table class="table">-->
<!--													<thead class="thead-dark">-->
<!--														<tr>-->
<!--															<th scope="col">Order</th>-->
<!--															<th scope="col">Date</th>-->
<!--                                                            <th scope="col">Course title</th>-->
<!--															<th scope="col">Status</th>-->
<!--															<th scope="col">Price</th>-->
<!--															<th scope="col">Action</th>-->
<!--														</tr>-->
<!--													</thead>-->
<!--													<tbody>-->
<!--                                                                                      -->
<!--													--><?php
//
//                                                                                                         $fetch_enroll=$conn->query("SELECT * FROM enroll  WHERE email='$active_student' ORDER BY id DESC LIMIT 5");
//                                                                                while($row=$fetch_enroll->fetch_assoc()){
//                                                                                   $course_code=$row['course_code'];
//                                                                                   $get_enroll_courses=$conn->query("SELECT * FROM courses where course_code='$course_code'");
//                                                                                   while($course_row=$get_enroll_courses->fetch_assoc()){
//
//                                                                                       ?>
<!--                                                                                                            <tr>-->
<!--															<th scope="row">--><?php //echo $course_row['id']?><!--</th>-->
<!--															<td>--><?php //echo $course_row['date']; ?><!--</td>-->
<!--                                                                                                                <td>--><?php //echo $course_row['course_title']; ?><!--</td>-->
<!--															<td>--><?php //
//                                                                                                                        if($course_row['course_price']=="free"){
//                                                                                                                        ?>
<!--                                                                                                                            <span class="payment_status complete">Completed</span>-->
<!--                                                                                                                            --><?php
//                                                                                                                        }else{
//                                                                                                                         ?>
<!--                                                                                                                            <span class="payment_status pending">Pending Payment</span>-->
<!--                                                                                                                            --><?php
//                                                                                                                        }
//                                                                                                                        ?><!--</td>-->
<!--															<td>--><?php // echo $course_row['course_price'];?><!--</td>-->
<!--															<td>-->
<!--																<div class="dash_action_link">-->
<!--																	<a href="view_videos.php?course_code=--><?php //echo $course_code;?><!--" class="view">View</a>-->
<!--																	--><?php
//                                                                    if($course_row['course_price']=="free"){
//                                                                        echo "";
//                                                                    }else{
//                                                                        ?>
<!--                                                                        <a href="#" class="cancel">Cancel</a>-->
<!--                                                                        --><?php
//                                                                    }
//                                                                    ?>
<!--																</div>	-->
<!--															</td>-->
<!--														</tr>-->
<!--                                                                                                            --><?php
//                                                                                                        }
//
//                                                                                   }
//                                                                                                        ?>
<!--														<tr>
															<th scope="row">#0000150</th>
															<td>04 July 2020</td>
															<td><span class="payment_status complete">Completed</span></td>
															<td>$119.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="#" class="view">View</a>
																	<a href="#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>-->
<!--														<tr>
															<th scope="row">#0000151</th>
															<td>07 July 2020</td>
															<td><span class="payment_status complete">Completed</span></td>
															<td>$149.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="#" class="view">View</a>
																	<a href="#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>-->
<!--														<tr>
															<th scope="row">#0000152</th>
															<td>10 July 2020</td>
															<td><span class="payment_status pending">Pending Payment</span></td>
															<td>$199.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="#" class="view">View</a>
																	<a href="#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>-->
<!--													</tbody>-->
<!--												</table>-->
<!--											</div>-->
<!--										</div>-->
<!--										-->
<!--									</div>-->
<!--								</div>-->
<!--								-->
<!--							</div>-->
							<!-- /Row -->
							
						</div>
					
					</div>
					
				</div>
			</section>
			<!-- ============================ Dashboard: Dashboard End ================================== -->
			
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
		<script src="assets/js/metisMenu.min.js"></script>	
		<script>
			$('#side-menu').metisMenu();
		</script>

	</body>

</html>