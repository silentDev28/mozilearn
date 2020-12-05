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
	
<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/instructors.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:53 GMT -->
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
			<div class="header header-light head-shadow">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
                                <a class="nav-brand fixed-logo" href="#"><img src="assets/img/mozisha-logo.png" class="logo" alt="" /></a>

                                <!--								<img src="assets/img/logo.png" class="logo" alt="" />-->
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li ><a href="index.php">Home<span class="submenu-indicator"></span></a>

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
                                <li class="active"><a href="instructors.php" >Instructors</a></li>
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
<!--								<li class="login_click theme-bg">-->
<!--									<a href="#" data-toggle="modal" data-target="#signup">Sign up</a>-->
<!--								</li>-->
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

			<!-- ============================ Page Title Start================================== -->
			<section class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Instructors</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Find Instructor</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->			

			
			<!-- ============================ Find Courses with Sidebar ================================== -->
			<section class="pt-0">
				<div class="container">
					
					<!-- Onclick Sidebar -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div id="filter-sidebar" class="filter-sidebar">
								<div class="filt-head">
									<h4 class="filt-first">Advance Options</h4>
									<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>
								</div>
								<div class="show-hide-sidebar">
									
									<!-- Find New Property -->
									<div class="sidebar-widgets">
										
										<!-- Search Form -->
										<form class="form-inline addons mb-3">
											<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
											<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
										</form>	
										
										<h4 class="side_title">Course categories</h4>
										<ul class="no-ul-list mb-3">
											<li>
												<input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
												<label for="a-4" class="checkbox-custom-label">Backend (3)</label>
											</li>
											<li>
												<input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
												<label for="a-5" class="checkbox-custom-label">Frontend (2)</label>
											</li>
											<li>
												<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
												<label for="a-6" class="checkbox-custom-label">General (2)</label>
											</li>
											<li>
												<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
												<label for="a-7" class="checkbox-custom-label">IT & Software (2)</label>
											</li>
											<li>
												<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
												<label for="a-8" class="checkbox-custom-label">Photography (2)</label>
											</li>
											<li>
												<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
												<label for="a-9" class="checkbox-custom-label">Technology (2)</label>
											</li>
										</ul>
										
<!--										<h4 class="side_title">Instructors</h4>-->
<!--										<ul class="no-ul-list mb-3">-->
<!--											<li>-->
<!--												<input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">-->
<!--												<label for="a-1" class="checkbox-custom-label">Keny White (4)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">-->
<!--												<label for="a-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">-->
<!--												<label for="a-6" class="checkbox-custom-label">Mike hussy (4)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">-->
<!--												<label for="a-7" class="checkbox-custom-label">Adam Riky (7)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">-->
<!--												<label for="a-8" class="checkbox-custom-label">Balcony</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">-->
<!--												<label for="a-9" class="checkbox-custom-label">Icon</label>-->
<!--											</li>-->
<!--										</ul>-->
										
<!--										<h4 class="side_title">Price</h4>-->
<!--										<ul class="no-ul-list mb-3">-->
<!--											<li>-->
<!--												<input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">-->
<!--												<label for="a-10" class="checkbox-custom-label">All (75)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">-->
<!--												<label for="a-11" class="checkbox-custom-label">Free (15)</label>-->
<!--											</li>-->
<!--											<li>-->
<!--												<input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">-->
<!--												<label for="a-12" class="checkbox-custom-label">Paid (60)</label>-->
<!--											</li>-->
<!--										</ul>-->
										
										<button class="btn btn-theme full-width mb-2">Filter Result</button>
									
									</div>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Row -->
					<div class="row">
					
<!--						<div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">-->
<!--							<div class="page_sidebar hide-23">-->

								<!-- Search Form -->
<!--								<form class="form-inline addons mb-3">-->
<!--									<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">-->
<!--									<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>-->
<!--								</form>	-->
<!--								-->
<!--								<h4 class="side_title">Course categories</h4>-->
<!--								<ul class="no-ul-list mb-3">-->
<!--                                  -->
<!--									<li>-->
<!--										<input id="aa-4" class="checkbox-custom" name="aa-4" type="checkbox">-->
<!--										<label for="aa-4" class="checkbox-custom-label">Backend (3)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-5" class="checkbox-custom" name="aa-5" type="checkbox">-->
<!--										<label for="aa-5" class="checkbox-custom-label">Frontend (2)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-6" class="checkbox-custom" name="aa-6" type="checkbox">-->
<!--										<label for="aa-6" class="checkbox-custom-label">General (2)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-7" class="checkbox-custom" name="aa-7" type="checkbox">-->
<!--										<label for="aa-7" class="checkbox-custom-label">IT & Software (2)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-8" class="checkbox-custom" name="aa-8" type="checkbox">-->
<!--										<label for="aa-8" class="checkbox-custom-label">Photography (2)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-9" class="checkbox-custom" name="aa-9" type="checkbox">-->
<!--										<label for="aa-9" class="checkbox-custom-label">Technology (2)</label>-->
<!--									</li>-->
<!--								</ul>-->
								
<!--								<h4 class="side_title">Instructors</h4>-->
<!--								<ul class="no-ul-list mb-3">-->
<!--									<li>-->
<!--										<input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">-->
<!--										<label for="aa-41" class="checkbox-custom-label">Keny White (4)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-2" class="checkbox-custom" name="aa-2" type="checkbox">-->
<!--										<label for="aa-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-3" class="checkbox-custom" name="aa-3" type="checkbox">-->
<!--										<label for="aa-3" class="checkbox-custom-label">Mike hussy (4)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-71" class="checkbox-custom" name="aa-71" type="checkbox">-->
<!--										<label for="aa-71" class="checkbox-custom-label">Adam Riky (7)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-81" class="checkbox-custom" name="aa-81" type="checkbox">-->
<!--										<label for="aa-81" class="checkbox-custom-label">Balcony</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="aa-91" class="checkbox-custom" name="aa-91" type="checkbox">-->
<!--										<label for="aa-91" class="checkbox-custom-label">Icon</label>-->
<!--									</li>-->
<!--								</ul>-->
<!--								-->
<!--								<h4 class="side_title">Price</h4>-->
<!--								<ul class="no-ul-list mb-3">-->
<!--									<li>-->
<!--										<input id="aa-10" class="checkbox-custom" name="aa-10" type="checkbox">-->
<!--										<label for="aa-10" class="checkbox-custom-label">All (75)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="b-8" class="checkbox-custom" name="b-8" type="checkbox">-->
<!--										<label for="b-8" class="checkbox-custom-label">Free (15)</label>-->
<!--									</li>-->
<!--									<li>-->
<!--										<input id="b-9" class="checkbox-custom" name="b-9" type="checkbox">-->
<!--										<label for="b-9" class="checkbox-custom-label">Paid (60)</label>-->
<!--									</li>-->
<!--								</ul>-->
								
<!--							</div>-->
							
<!--							<div class="page_sidebar hidden-md-down">-->
<!--								<h4 class="side_title">Related Courses</h4>-->
<!--								<div class="related_items mb-4">-->
<!--									<!-- Single Related Items -->
<!--									<div class="product_item">-->
<!--										<div class="thumbnail">-->
<!--											<a href="#"><img src="assets/img/book-1.png" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="info">-->
<!--											<h6 class="product-title"><a href="#">The Source of Learning and Development</a></h6>-->
<!--											<div class="woo_rating">-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star"></i>-->
<!--											</div>-->
<!--											<span class="price"><p class="price_ver">$99.00<del>$149.00</del>-->
<!--										</p></span></div>-->
<!--									</div>-->
									<!-- Single Related Items -->
<!--									<div class="product_item">-->
<!--										<div class="thumbnail">-->
<!--											<a href="#"><img src="assets/img/book-2.png" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="info">-->
<!--											<h6 class="product-title"><a href="#">Full Web Designing Course with 20% Offer</a></h6>-->
<!--											<div class="woo_rating">-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--											</div>-->
<!--											<span class="price"><p class="price_ver">$89.00<del>$179.00</del>-->
<!--										</p></span></div>-->
<!--									</div>-->
									<!-- Single Related Items -->
<!--									<div class="product_item">-->
<!--										<div class="thumbnail">-->
<!--											<a href="#"><img src="assets/img/book-3.png" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="info">-->
<!--											<h6 class="product-title"><a href="#">The Source of Learning Advance WordPress</a></h6>-->
<!--											<div class="woo_rating">-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star"></i>-->
<!--											</div>-->
<!--											<span class="price"><p class="price_ver">$199.00<del>$279.00</del>-->
<!--										</p></span></div>-->
<!--									</div>-->
									<!-- Single Related Items -->
<!--									<div class="product_item">-->
<!--										<div class="thumbnail">-->
<!--											<a href="#"><img src="assets/img/book-4.png" class="img-fluid" alt=""></a>-->
<!--										</div>-->
<!--										<div class="info">-->
<!--											<h6 class="product-title"><a href="#">Advance Magento & Drupal Development</a></h6>-->
<!--											<div class="woo_rating">-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star filled"></i>-->
<!--												<i class="fas fa-star"></i>-->
<!--											</div>-->
<!--											<span class="price"><p class="price_ver">$599.00<del>$999.00</del>-->
<!--										</p></span></div>-->
<!--									</div>-->
<!--								</div>-->

<!--								<h4 class="side_title">Popular Tags</h4>-->
<!--								<div class="popular_tags">-->
									<!-- Tags -->
<!--									<div class="tag_cloud">-->
<!--										<a href="#" class="tag-cloud-lin">business</a>-->
<!--										<a href="#" class="tag-cloud-lin">design</a>-->
<!--										<a href="#" class="tag-cloud-lin">development</a>-->
<!--										<a href="#" class="tag-cloud-lin">php</a>-->
<!--										<a href="#" class="tag-cloud-lin">wordpress</a>-->
<!--										<a href="#" class="tag-cloud-lin">magento</a>-->
<!--										<a href="#" class="tag-cloud-lin">skills</a>-->
<!--										<a href="#" class="tag-cloud-lin">software</a>-->
<!--										<a href="#" class="tag-cloud-lin">accounting</a>-->
<!--									</div>-->
<!--								</div>-->
<!---->
<!--							</div>-->
<!---->
<!--						</div>-->

						<div class="col-lg-12 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">
							
							<!-- Row -->
							<div class="row align-items-center mb-3">
								<div class="col-lg-6 col-md-6 col-sm-12">
									We found <strong><?php
                                        $getInstructorLength=$conn->query("SELECT * FROM instructors");
                                        echo $getInstructorLength->num_rows;
                                        ?></strong> instructors for you
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 ordering">
									<div class="filter_wraps">
										<div class="dn db-991 mt30 mb0 show-23">
											<div id="main2">
												<a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2">Show Filter<span><i class="fas fa-arrow-alt-circle-right"></i></span></a>
											</div>
										</div>
<!--										<div class="dropdown show">-->
<!--											<a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--											Recent Courses-->
<!--											</a>-->
<!--											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
<!--											<a class="dropdown-item" href="#">Popular Courses</a>-->
<!--											<a class="dropdown-item" href="#">Recent Courses</a>-->
<!--											<a class="dropdown-item" href="#">Featured Courses</a>-->
<!--											</div>-->
<!--										</div>-->
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<div class="row">
						
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="edu_wraper p-0">
										<?php
                                        $fetchinstrutors=$conn->query("SELECT * FROM instructors");
                                        while($fetchinstructorRow=$fetchinstrutors->fetch_assoc()){
                                            ?>
                                            <!-- Single Instructor -->
                                            <div class="single_instructor border">
                                                <div class="single_instructor_thumb">
                                                    <a href="instructor-detail.php?instructor=<?php echo $fetchinstructorRow['id'];?>"><img src="./admin/instructors_image/<?php echo $fetchinstructorRow['instructor_image'] ?>" class="img-fluid" alt="" style="height:100%;width: 100%"></a>
                                                </div>
                                                <div class="single_instructor_caption">
                                                    <h4><a href="instructor-detail.php?instructor=<?php echo $fetchinstructorRow['id'];?>"><?php echo $fetchinstructorRow['full_name'] ?></a></h4>
<!--                                                    <ul class="instructor_info">-->
<!--                                                        <li><i class="ti-tag"></i>Graphic Design</li>-->
<!--                                                        <li><i class="ti-video-camera"></i>25 Classes</li>-->
<!--                                                        <li><i class="ti-user"></i>Exp. 3.5 Year</li>-->
<!--                                                    </ul>-->
                                                    <p><?php
                                                        $out = strlen( $fetchinstructorRow['bios']) > 350 ? substr( $fetchinstructorRow['bios'],0,350)."..." :  $fetchinstructorRow['bios'];
                                                        echo $out?></p>
<!--                                                    <ul class="social_info">-->
<!--                                                        <li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--                                                        <li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--                                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--                                                        <li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--                                                    </ul>-->
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ?>

										<!-- Single Instructor -->
<!--										<div class="single_instructor border">-->
<!--											<div class="single_instructor_thumb">-->
<!--												<a href="#"><img src="assets/img/user-8.jpg" class="img-fluid" alt=""></a>-->
<!--											</div>-->
<!--											<div class="single_instructor_caption">-->
<!--												<h4><a href="#">Shilpa D. Singh</a></h4>-->
<!--												<ul class="instructor_info">-->
<!--													<li><i class="ti-tag"></i>Java & PHP</li>-->
<!--													<li><i class="ti-video-camera"></i>102 Classes</li>-->
<!--													<li><i class="ti-user"></i>Exp. 7 Year</li>-->
<!--												</ul>-->
<!--												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>-->
<!--												<ul class="social_info">-->
<!--													<li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
<!--										-->
										<!-- Single Instructor -->
<!--										<div class="single_instructor border">-->
<!--											<div class="single_instructor_thumb">-->
<!--												<a href="#"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a>-->
<!--											</div>-->
<!--											<div class="single_instructor_caption">-->
<!--												<h4><a href="#">Adam Wikrome</a></h4>-->
<!--												<ul class="instructor_info">-->
<!--													<li><i class="ti-tag"></i>Business</li>-->
<!--													<li><i class="ti-video-camera"></i>54 Classes</li>-->
<!--													<li><i class="ti-user"></i>Exp. 6 Year</li>-->
<!--												</ul>-->
<!--												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>-->
<!--												<ul class="social_info">-->
<!--													<li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
										
										<!-- Single Instructor -->
<!--										<div class="single_instructor border">-->
<!--											<div class="single_instructor_thumb">-->
<!--												<a href="#"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a>-->
<!--											</div>-->
<!--											<div class="single_instructor_caption">-->
<!--												<h4><a href="#">niharika Pandey</a></h4>-->
<!--												<ul class="instructor_info">-->
<!--													<li><i class="ti-tag"></i>WordPress & PHP</li>-->
<!--													<li><i class="ti-video-camera"></i>62 Classes</li>-->
<!--													<li><i class="ti-user"></i>Exp. 4.5 Year</li>-->
<!--												</ul>-->
<!--												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>-->
<!--												<ul class="social_info">-->
<!--													<li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
<!--										-->
										<!-- Single Instructor -->
<!--										<div class="single_instructor border">-->
<!--											<div class="single_instructor_thumb">-->
<!--												<a href="#"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a>-->
<!--											</div>-->
<!--											<div class="single_instructor_caption">-->
<!--												<h4><a href="#">Hanshraj Singh</a></h4>-->
<!--												<ul class="instructor_info">-->
<!--													<li><i class="ti-tag"></i>Accounting</li>-->
<!--													<li><i class="ti-video-camera"></i>45 Classes</li>-->
<!--													<li><i class="ti-user"></i>Exp. 3 Year</li>-->
<!--												</ul>-->
<!--												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>-->
<!--												<ul class="social_info">-->
<!--													<li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
										
										<!-- Single Instructor -->
<!--										<div class="single_instructor border">-->
<!--											<div class="single_instructor_thumb">-->
<!--												<a href="#"><img src="assets/img/user-6.jpg" class="img-fluid" alt=""></a>-->
<!--											</div>-->
<!--											<div class="single_instructor_caption">-->
<!--												<h4><a href="#">Ritu Shiksha</a></h4>-->
<!--												<ul class="instructor_info">-->
<!--													<li><i class="ti-tag"></i>Web Design</li>-->
<!--													<li><i class="ti-video-camera"></i>72 Classes</li>-->
<!--													<li><i class="ti-user"></i>Exp. 4 Year</li>-->
<!--												</ul>-->
<!--												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>-->
<!--												<ul class="social_info">-->
<!--													<li><a href="#"><i class="ti-facebook"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-twitter"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-linkedin"></i></a></li>-->
<!--													<li><a href="#"><i class="ti-instagram"></i></a></li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
										
									</div>
									
								</div>
								
							</div>
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									
									<!-- Pagination -->
<!--									<div class="row">-->
<!--										<div class="col-lg-12 col-md-12 col-sm-12">-->
<!--											<ul class="pagination p-center">-->
<!--												<li class="page-item">-->
<!--												  <a class="page-link" href="#" aria-label="Previous">-->
<!--													<span class="ti-arrow-left"></span>-->
<!--													<span class="sr-only">Previous</span>-->
<!--												  </a>-->
<!--												</li>-->
<!--												<li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--												<li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--												<li class="page-item active"><a class="page-link" href="#">3</a></li>-->
<!--												<li class="page-item"><a class="page-link" href="#">...</a></li>-->
<!--												<li class="page-item"><a class="page-link" href="#">18</a></li>-->
<!--												<li class="page-item">-->
<!--												  <a class="page-link" href="#" aria-label="Next">-->
<!--													<span class="ti-arrow-right"></span>-->
<!--													<span class="sr-only">Next</span>-->
<!--												  </a>-->
<!--												</li>-->
<!--											</ul>-->
<!--										</div>-->
<!--									</div>-->
									
								</div>
							</div>
							<!-- /Row -->
							
						</div>
					
					</div>
					<!-- Row -->
					
				</div>
			</section>
			<!-- ============================ Find Courses with Sidebar End ================================== -->
			
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
		<script>
			function openNav() {
			  document.getElementById("filter-sidebar").style.width = "320px";
			}

			function closeNav() {
			  document.getElementById("filter-sidebar").style.width = "0";
			}
		</script>

	</body>

<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/instructors.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:53 GMT -->
</html>