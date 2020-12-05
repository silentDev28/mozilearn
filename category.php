<?php
include "conn.php";
error_reporting(0);
$total_category='';
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
$get_category=$_GET['category'];
$fetch_category=$conn->query("SELECT count(category) as total from courses where category='$get_category'");
$get_total_category=$fetch_category->fetch_assoc();
$total_category= $get_total_category['total'];
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/grid-with-sidebar-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:46 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>Mozilearn - Online Course </title>
		 
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
<!--								<img src="assets/img/logo.png" class="logo" alt="" />-->
                                <a class="nav-brand fixed-logo" href="#"><img src="assets/img/mozisha-logo.png" class="logo" alt="" /></a>

                            </a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li ><a href="index.php">Home<span class="submenu-indicator"></span></a>
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

                                <li><a>Categories<span class="submenu-indicator active"></span></a>
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
										<li class=""><a href="#">User Dashboard<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="dashboard.php">User Dashboard</a></li>
<!--												<li><a href="my-profile.html">My Profile</a></li>-->
<!--												<li><a href="all-courses.php">My Courses</a></li>-->
<!--												<li><a href="my-order.php">My Order</a></li>-->
<!--												<li><a href="saved-courses.html">Saved Courses</a></li>-->
<!--												<li><a href="reviews.php">My Reviews</a></li>-->
<!--												<li><a href="settings.html">My Settings</a></li>-->
											</ul>
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
								<h1 class="breadcrumb-title">Course Category</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Find Courses</li>
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
										
<!--										<h4 class="side_title">Instructors</h4>
										<ul class="no-ul-list mb-3">
											<li>
												<input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
												<label for="a-1" class="checkbox-custom-label">Keny White (4)</label>
											</li>
											<li>
												<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
												<label for="a-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>
											</li>
											<li>
												<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
												<label for="a-6" class="checkbox-custom-label">Mike hussy (4)</label>
											</li>
											<li>
												<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
												<label for="a-7" class="checkbox-custom-label">Adam Riky (7)</label>
											</li>
											<li>
												<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
												<label for="a-8" class="checkbox-custom-label">Balcony</label>
											</li>
											<li>
												<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
												<label for="a-9" class="checkbox-custom-label">Icon</label>
											</li>
										</ul>-->
										
										<h4 class="side_title">Price</h4>
										<ul class="no-ul-list mb-3">
											<li>
                                                                                            <?php
                                                                                            
                                                                                            ?>
												<input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">
												<label for="a-10" class="checkbox-custom-label">All (75)</label>
											</li>
											<li>
												<input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">
												<label for="a-11" class="checkbox-custom-label">Free (15)</label>
											</li>
											<li>
												<input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
												<label for="a-12" class="checkbox-custom-label">Paid (60)</label>
											</li>
										</ul>
										
										<button class="btn btn-theme full-width mb-2">Filter Result</button>
									
									</div>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Row -->
					<div class="row">
					
						<div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">							
							<div class="page_sidebar hide-23">
								
								<!-- Search Form -->
								<form class="form-inline addons mb-3">
									<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
									<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
								</form>	
								
								<h4 class="side_title">Course categories</h4>
								<ul class="no-ul-list mb-3">
                                                                   
                                                                   
                                                                       
                                                                            <?php
                                                                            $fetch_category=$conn->query("SELECT * FROM category");
                                                                            while($get_cat_row=$fetch_category->fetch_assoc()){
                                                                                $get_cat=$get_cat_row['cat_title'];
                                                                                
                                                                               
                                                                                ?>
                                                                     <li>
                                                                            <a href="category.php?category=<?php echo $get_cat;?>" >
                                                                                	<label for="aa-4" class="checkbox-custom-label"><?php echo $get_cat_row['cat_title'];?> <?php
                                                                                         $count_courses=$conn->query("SELECT count(course_code) as total from courses where category='$get_cat'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                           ?>
                                                                                            (<?php  echo  $data['total'];?>)
                                                                                            <?php
                                                                                        ?></label>
                                                                            </a>
                                                                         </li>
                                                                            <?php
                                                                            }
                                                                            ?>
									
                                                                            
									
									
									
									
									
									
                                                                  
									
								</ul>
								
<!--								<h4 class="side_title">Instructors</h4>
								<ul class="no-ul-list mb-3">
									<li>
										<input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">
										<label for="aa-41" class="checkbox-custom-label">Keny White (4)</label>
									</li>
									<li>
										<input id="aa-2" class="checkbox-custom" name="aa-2" type="checkbox">
										<label for="aa-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>
									</li>
									<li>
										<input id="aa-3" class="checkbox-custom" name="aa-3" type="checkbox">
										<label for="aa-3" class="checkbox-custom-label">Mike hussy (4)</label>
									</li>
									<li>
										<input id="aa-71" class="checkbox-custom" name="aa-71" type="checkbox">
										<label for="aa-71" class="checkbox-custom-label">Adam Riky (7)</label>
									</li>
									<li>
										<input id="aa-81" class="checkbox-custom" name="aa-81" type="checkbox">
										<label for="aa-81" class="checkbox-custom-label">Balcony</label>
									</li>
									<li>
										<input id="aa-91" class="checkbox-custom" name="aa-91" type="checkbox">
										<label for="aa-91" class="checkbox-custom-label">Icon</label>
									</li>
								</ul>-->
								
								<h4 class="side_title">Price</h4>
								<ul class="no-ul-list mb-3">
                                                                    
									<li>
                                                                            
									 <a href="category.php?category" >
                                                                                	<label for="aa-4" class="checkbox-custom-label">All <?php
                                                                                         $count_courses=$conn->query("SELECT count(course_code) as total from courses");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                           ?>
                                                                                            (<?php  echo  $data['total'];?>)
                                                                                            <?php
                                                                                        ?></label>
                                                                            </a>
									</li>
									<li>
                                                                            
									 <a href="category.php?category=free_courses" >
                                                                                	<label for="aa-4" class="checkbox-custom-label">Free <?php
                                                                                         $count_courses=$conn->query("SELECT count(course_code) as total from courses where course_price='free'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                           ?>
                                                                                            (<?php  echo  $data['total'];?>)
                                                                                            <?php
                                                                                        ?></label>
                                                                            </a>
									</li>
									<li>
									 <a href="category.php?category=paid_courses" >
                                                                                	<label for="aa-4" class="checkbox-custom-label">Paid <?php
                                                                                         $count_courses=$conn->query("SELECT count(course_code) as total from courses where paid_status='paid'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                           ?>
                                                                                            (<?php  echo  $data['total'];?>)
                                                                                            <?php
                                                                                        ?></label>
                                                                            </a>
									</li>
								</ul>
								
							</div>
							
							<div class="page_sidebar hidden-md-down">
								<h4 class="side_title">New Products</h4>
								<div class="related_items mb-4">
                                    <?php
//                                    echo $get_category;
                                    if(empty($get_category)){
                                        $fetch_related_course=$conn->query("SELECT * FROM courses ORDER BY id DESC  LIMIT 4");
                                        while($get_related_row=$fetch_related_course->fetch_assoc()){
                                            $related_course_code=$get_related_row['course_code'];

                                            ?>

                                            <div class="product_item">
                                                <div class="thumbnail">
                                                    <a href="course-detail.php?course_id=<?php echo $get_related_row['id'];?>"><img src="./admin/category_images/<?php echo $get_related_row['course_picture'];?>" class="img-fluid" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <h6 class="product-title"><a href="course-detail.php?course_id=<?php echo $get_related_row['id'];?>"><?php echo $get_related_row['course_title']?></a></h6>
                                                  <div>
                                                      <?php
                                                      $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$related_course_code' ");
                                                      $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$related_course_code'");
                                                      $totComents=$getReviews->num_rows;
                                                      if($totComents!=0){
                                                          while($row=$getTotalComent->fetch_assoc()){
                                                              $totalRating= $row['total'];
                                                              ?>
                                                              <span style="font-size: 12px" ><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></span>
                                                              <?php
                                                          }
                                                      }else{
                                                          ?>
                                                          <span class="" style="font-size: 12px"><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo "0,"." "."Reviews(0)";?></span>
                                                          <?php
                                                      }
                                                      ?>
                                                  </div>

										</p></span></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else if($get_category=="paid_courses"){

                                        $fetch_related_course_paid=$conn->query("SELECT * FROM courses WHERE paid_status='paid' ORDER BY id DESC  LIMIT 4");
                                        while($row_related_paid=$fetch_related_course_paid->fetch_assoc()){
                                            $related_course_code_paid_status=$row_related_paid['course_code'];
                                            ?>
                                            <div class="product_item">
                                                <div class="thumbnail">
                                                    <a href="course-detail.php?course_id=<?php echo $row_related_paid['id'];?>"><img src="./admin/category_images/<?php echo $row_related_paid['course_picture'];?>" class="img-fluid" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <h6 class="product-title"><a href="course-detail.php?course_id=<?php echo $row_related_paid['id'];?>"><?php echo $row_related_paid['course_title']?></a></h6>
                                                    <div>
                                                        <?php
                                                        $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$related_course_code_paid_status' ");
                                                        $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$related_course_code_paid_status'");
                                                        $totComents=$getReviews->num_rows;
                                                        if($totComents!=0){
                                                            while($row=$getTotalComent->fetch_assoc()){
                                                                $totalRating= $row['total'];
                                                                ?>
                                                                <span style="font-size: 12px" ><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></span>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                            <span class="" style="font-size: 12px"><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo "0,"." "."Reviews(0)";?></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    </p></span></div>
                                            </div>
                                            <?php
                                        }
                                    }else if($get_category=="free_courses"){

                                        $fetch_related_course_paid=$conn->query("SELECT * FROM courses WHERE paid_status='free' ORDER BY id DESC  LIMIT 4");
                                        while($row_related_paid=$fetch_related_course_paid->fetch_assoc()){
                                            $related_course_code_paid_status=$row_related_paid['course_code'];
                                            ?>
                                            <div class="product_item">
                                                <div class="thumbnail">
                                                    <a href="course-detail.php?course_id=<?php echo $row_related_paid['id'];?>"><img src="./admin/category_images/<?php echo $row_related_paid['course_picture'];?>" class="img-fluid" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <h6 class="product-title"><a href="course-detail.php?course_id=<?php echo $row_related_paid['id'];?>"><?php echo $row_related_paid['course_title']?></a></h6>
                                                    <div>
                                                        <?php
                                                        $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$related_course_code_paid_status' ");
                                                        $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$related_course_code_paid_status'");
                                                        $totComents=$getReviews->num_rows;
                                                        if($totComents!=0){
                                                            while($row=$getTotalComent->fetch_assoc()){
                                                                $totalRating= $row['total'];
                                                                ?>
                                                                <span style="font-size: 12px" ><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></span>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                            <span class="" style="font-size: 12px"><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo "0,"." "."Reviews(0)";?></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    </p></span></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else{
                                        $fetch_related_course_cat=$conn->query("SELECT * FROM courses WHERE category='$get_category' ORDER BY id DESC  LIMIT 4");
                                        while($row_category=$fetch_related_course_cat->fetch_assoc()){
                                            $related_course_code_cat=$row_category['course_code'];
                                            ?>
                                            <div class="product_item">
                                                <div class="thumbnail">
                                                    <a href="course-detail.php?course_id=<?php echo $row_category['id'];?>"><img src="./admin/category_images/<?php echo $row_category['course_picture'];?>" class="img-fluid" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <h6 class="product-title"><a href="course-detail.php?course_id=<?php echo $row_category['id'];?>"><?php echo $row_category['course_title']?></a></h6>
                                                    <div>
                                                        <?php
                                                        $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code=' $related_course_code_cat' ");
                                                        $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code=' $related_course_code_cat'");
                                                        $totComents=$getReviews->num_rows;
                                                        if($totComents!=0){
                                                            while($row=$getTotalComent->fetch_assoc()){
                                                                $totalRating= $row['total'];
                                                                ?>
                                                                <span style="font-size: 12px" ><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></span>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                            <span class="" style="font-size: 12px"><i class="fa fa-star" style="color:gold;font-size:12px;"></i><?php echo "0,"." "."Reviews(0)";?></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    </p></span></div>
                                            </div>
                                    <?php
                                        }

                                    }
                                    ?>

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
								</div>
								
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
<!--									</div>	-->
<!--								</div>-->
								
							</div>
							
						</div>	
						
						<div class="col-lg-8 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1" style="overflow-y:scroll ;height:900px ">
							
							<!-- Row -->
							<div class="row align-items-center mb-3" >
								<div class="col-lg-6 col-md-6 col-sm-12">
									We found <strong><?php
                                                                        if(empty($get_category)){
                                                                            $fetch_category=$conn->query("SELECT count(category) as total from courses");
$get_total_category=$fetch_category->fetch_assoc();
$total_category= $get_total_category['total'];
 echo $total_category;
                                                                        }
                                                                        else if($get_category=="free_courses"){
                                                                             $fetch_category=$conn->query("SELECT count(category) as total from courses where course_price='free'");
$get_total_category=$fetch_category->fetch_assoc();
$total_category= $get_total_category['total'];
 echo $total_category;
                                                                        }
                                                                        else if($get_category=="paid_courses"){
                                                                            $fetch_category=$conn->query("SELECT count(category) as total from courses where paid_status='paid'");
$get_total_category=$fetch_category->fetch_assoc();
$total_category= $get_total_category['total'];
 echo $total_category;
                                                                        }
                                                                        else{
                                                                             echo $total_category;
                                                                        }
                                                                       ?></strong> courses for you
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 ordering">
									<div class="filter_wraps">
										<div class="dn db-991 mt30 mb0 show-23">
											<div id="main2">
												<a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2">Show Filter<span><i class="fas fa-arrow-alt-circle-right"></i></span></a>
											</div>
										</div>
										<div class="dropdown show">
											<a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Recent Courses
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="#">Popular Courses</a>
											<a class="dropdown-item" href="#">Recent Courses</a>
											<a class="dropdown-item" href="#">Featured Courses</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<?php
                                                        if(empty($get_category)){
                                                            ?>
                                                        		<div class="row">
						
								<!-- Cource Grid 1 -->
                                                                <?php
                                                                $instructor_name="";
                                                                $course_code="";
                                                                
                                                                $fetch_category=$conn->query("SELECT * FROM courses");
                                                                while($cat_row=$fetch_category->fetch_assoc()){
                                                                    $instructor_name=$cat_row['instructor'];
                                                                    $course_code=$cat_row['course_code'];
                                                                    ?>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
									<div class="education_block_grid style_2">
										
										<div class="education_block_thumb">
                                                                                  
                                                                                    <a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><img src="./admin/category_images/<?php echo $cat_row['course_picture']; ?>" class="img-fluid" alt="" style="height:200px"></a>
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                            $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                            $totComents=$getReviews->num_rows;
                                            if($totComents!=0){
                                                while($row=$getTotalComent->fetch_assoc()){
                                                    $totalRating= $row['total'];
                                                    ?>
                                                    <div class="education_ratting"><i class="fa fa-star"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></div>
                                            <?php
                                                }
                                            }else{
                                                ?>
                                                <div class="education_ratting"><i class="fa fa-star"></i><?php echo "0,"." "."Reviews(0)";?></div>
                                            <?php
                                            }
                                            ?>

										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><?php $out = strlen($cat_row['course_title']) > 50 ? substr($cat_row['course_title'],0,50)."..." : $cat_row['course_title'];
                                                                                echo $out; ?></a></h4>
										</div>
										
										<div class="cources_info_style3">
											<ul>
<!--												<li><i class="ti-eye mr-2"></i>7482 Views</li>-->
                                                                                            <?php
                                                                                            $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            ?>
                                                                                            	<li><i class="ti-control-skip-forward mr-2"></i><?php echo $data['total']; ?> Lectures</li>
                                                                                            <?php
                                                                
                                                                                            ?>
											
												<li><i class="ti-time mr-2"></i><?php echo $cat_row['duration'];?></li>
											</ul>
										</div>
										
										<div class="education_block_footer">
											<div class="education_block_author">
                                                                                              <?php
                                                                          
                                                                            $select_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor_name'");
                                                                            while($fetch_row=$select_instructor->fetch_assoc()){
                                                                               ?>
												<div class="path-img"><a href="instructor-detail.html"><img src="./admin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" class="img-fluid" alt=""></a></div>
                                                                                                
												<h5><a href="instructor-detail.php"><?php echo $fetch_row['full_name'];?></a></h5>
                                                                                                <?php
                                                                            }
                                                                                                ?>
											</div>
                                                                                    <div class="cources_price_foot"><span class="price_off"><?php if( $cat_row['course_price']=="free"){ echo "";}else{ echo $cat_row['course_price'];} ?></span>
                                                                                    <?php if( $cat_row['course_price']=="free"){ echo "Free";}else{ echo $cat_row['course_price']-$cat_row['discount_percentage']/100*$cat_row['course_price'];} ?>
                                                                                    </div>
										</div>
										
									</div>	
								</div>
								
                                                                <?php
                                                                }
                                                                ?>
								
					
							</div>
							
                                                        <?php
                                                        }
                                                        else if($get_category=="free_courses"){
                                                            ?>
                                                        <div class="row">
						
								<!-- Cource Grid 1 -->
                                                                <?php
                                                                $instructor_name="";
                                                                $course_code="";
                                                                
                                                                $fetch_category=$conn->query("SELECT * FROM courses where course_price='free'");
                                                                while($cat_row=$fetch_category->fetch_assoc()){
                                                                    $instructor_name=$cat_row['instructor'];
                                                                    $course_code=$cat_row['course_code'];
                                                                    ?>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
									<div class="education_block_grid style_2">
										
										<div class="education_block_thumb">
                                                                                    <a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><img src="./admin/category_images/<?php echo $cat_row['course_picture']; ?>" class="img-fluid" alt="" style="height:200px"></a>
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                            $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                            $totComents=$getReviews->num_rows;
                                            if($totComents!=0){
                                                while($row=$getTotalComent->fetch_assoc()){
                                                    $totalRating= $row['total'];
                                                    ?>
                                                    <div class="education_ratting"><i class="fa fa-star"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></div>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                                <div class="education_ratting"><i class="fa fa-star"></i><?php echo "0,"." "."Reviews(0)";?></div>
                                                <?php
                                            }
                                            ?>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><?php $out = strlen($cat_row['course_title']) > 50 ? substr($cat_row['course_title'],0,50)."..." : $cat_row['course_title'];
                                                                                echo $out;  ?></a></h4>
										</div>
										
										<div class="cources_info_style3">
											<ul>
<!--												<li><i class="ti-eye mr-2"></i>7482 Views</li>-->
                                                                                            <?php
                                                                                            $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            ?>
                                                                                            	<li><i class="ti-control-skip-forward mr-2"></i><?php echo $data['total']; ?> Lectures</li>
                                                                                            <?php
                                                                
                                                                                            ?>
											
												<li><i class="ti-time mr-2"></i><?php echo $cat_row['duration'];?></li>
											</ul>
										</div>
										
										<div class="education_block_footer">
											<div class="education_block_author">
                                                                                              <?php
                                                                          
                                                                            $select_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor_name'");
                                                                            while($fetch_row=$select_instructor->fetch_assoc()){
                                                                               ?>
												<div class="path-img"><a href="instructor-detail.html"><img src="./admin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" class="img-fluid" alt=""></a></div>
                                                                                                
												<h5><a href="instructor-detail.php"><?php echo $fetch_row['full_name'];?></a></h5>
                                                                                                <?php
                                                                            }
                                                                                                ?>
											</div>
										 <div class="cources_price_foot"><span class="price_off"><?php if( $cat_row['course_price']=="free"){ echo "";}else{ echo $cat_row['course_price'];} ?></span>
                                                                                    <?php if( $cat_row['course_price']=="free"){ echo "Free";}else{ echo $cat_row['course_price']-$cat_row['discount_percentage']/100*$cat_row['course_price'];} ?>
                                                                                    </div>
										</div>
										
									</div>	
								</div>
								
                                                                <?php
                                                                }
                                                                ?>
								
					
							</div>
                                                        <?php
                                                            
                                                        }
                                                        else if($get_category=="paid_courses"){
                                                            ?>
                                                        		<div class="row">
						
								<!-- Cource Grid 1 -->
                                                                <?php
                                                                $instructor_name="";
                                                                $course_code="";
                                                                
                                                                $fetch_category=$conn->query("SELECT * FROM courses where paid_status='paid'");
                                                                while($cat_row=$fetch_category->fetch_assoc()){
                                                                    $instructor_name=$cat_row['instructor'];
                                                                    $course_code=$cat_row['course_code'];
                                                                    ?>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
									<div class="education_block_grid style_2">
										
										<div class="education_block_thumb">
                                                                                    <a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><img src="./admin/category_images/<?php echo $cat_row['course_picture']; ?>" class="img-fluid" alt="" style="height:200px"></a>
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                            $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                            $totComents=$getReviews->num_rows;
                                            if($totComents!=0){
                                                while($row=$getTotalComent->fetch_assoc()){
                                                    $totalRating= $row['total'];
                                                    ?>
                                                    <div class="education_ratting"><i class="fa fa-star"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></div>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                                <div class="education_ratting"><i class="fa fa-star"></i><?php echo "0,"." "."Reviews(0)";?></div>
                                                <?php
                                            }
                                            ?>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><?php $out = strlen($cat_row['course_title']) > 50 ? substr($cat_row['course_title'],0,50)."..." : $cat_row['course_title'];
                                                                                echo $out;  ?></a></h4>
										</div>
										
										<div class="cources_info_style3">
											<ul>
<!--												<li><i class="ti-eye mr-2"></i>7482 Views</li>-->
                                                                                            <?php
                                                                                            $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            ?>
                                                                                            	<li><i class="ti-control-skip-forward mr-2"></i><?php echo $data['total']; ?> Lectures</li>
                                                                                            <?php
                                                                
                                                                                            ?>
											
												<li><i class="ti-time mr-2"></i><?php echo $cat_row['duration'];?></li>
											</ul>
										</div>
										
										<div class="education_block_footer">
											<div class="education_block_author">
                                                                                              <?php
                                                                          
                                                                            $select_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor_name'");
                                                                            while($fetch_row=$select_instructor->fetch_assoc()){
                                                                               ?>
												<div class="path-img"><a href="instructor-detail.html"><img src="./admin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" class="img-fluid" alt=""></a></div>
                                                                                                
												<h5><a href="instructor-detail.php"><?php echo $fetch_row['full_name'];?></a></h5>
                                                                                                <?php
                                                                            }
                                                                                                ?>
											</div>
										 <div class="cources_price_foot"><span class="price_off"><?php if( $cat_row['course_price']=="free"){ echo "";}else{ echo $cat_row['course_price'];} ?></span>
                                                                                    <?php if( $cat_row['course_price']=="free"){ echo "Free";}else{ echo $cat_row['course_price']-$cat_row['discount_percentage']/100*$cat_row['course_price'];} ?>
                                                                                    </div>
										</div>
										
									</div>	
								</div>
								
                                                                <?php
                                                                }
                                                                ?>
								
					
							</div>
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        <div class="row">
						
								<!-- Cource Grid 1 -->
                                                                <?php
                                                                $instructor_name="";
                                                                $course_code="";
                                                                
                                                                $fetch_category=$conn->query("SELECT * FROM courses where category='$get_category'");
                                                                while($cat_row=$fetch_category->fetch_assoc()){
                                                                    $instructor_name=$cat_row['instructor'];
                                                                    $course_code=$cat_row['course_code'];
                                                                    ?>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
									<div class="education_block_grid style_2">
										
										<div class="education_block_thumb">
                                                                                    <a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><img src="./admin/category_images/<?php echo $cat_row['course_picture']; ?>" class="img-fluid" alt="" style="height:200px"></img></a>
                                            <?php
                                            $getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
                                            $getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
                                            $totComents=$getReviews->num_rows;
                                            if($totComents!=0){
                                                while($row=$getTotalComent->fetch_assoc()){
                                                    $totalRating= $row['total'];
                                                    ?>
                                                    <div class="education_ratting"><i class="fa fa-star"></i><?php echo  $totalRating/ $totComents.","." "."Reviews(".$totComents.")";?></div>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                                <div class="education_ratting"><i class="fa fa-star"></i><?php echo "0,"." "."Reviews(0)";?></div>
                                                <?php
                                            }
                                            ?>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="course-detail.php?course_id=<?php echo $cat_row['id'];?>"><?php $out = strlen($cat_row['course_title']) > 50 ? substr($cat_row['course_title'],0,50)."..." : $cat_row['course_title'];
                                                                                echo $out;  ?></a></h4>
										</div>
										
										<div class="cources_info_style3">
											<ul>
<!--												<li><i class="ti-eye mr-2"></i>7482 Views</li>-->
                                                                                            <?php
                                                                                            $count_courses=$conn->query("SELECT count(video_title) as total from lesson_vidoes where course_code='$course_code'");
                                                                                            $data=$count_courses->fetch_assoc();
                                                                                            ?>
                                                                                            	<li><i class="ti-control-skip-forward mr-2"></i><?php echo $data['total']; ?> Lectures</li>
                                                                                            <?php
                                                                
                                                                                            ?>
											
												<li><i class="ti-time mr-2"></i><?php echo $cat_row['duration'];?></li>
											</ul>
										</div>
										
										<div class="education_block_footer">
											<div class="education_block_author">
                                                                                              <?php
                                                                          
                                                                            $select_instructor=$conn->query("SELECT * FROM instructors WHERE full_name='$instructor_name'");
                                                                            while($fetch_row=$select_instructor->fetch_assoc()){
                                                                               ?>
                                                                                            <div class="path-img"><a href="instructor-detail.html"><img src="./admin/instructors_image/<?php echo $fetch_row['instructor_image']; ?>" class="img-fluid" alt=""></a></div>
                                                                                                
												<h5><a href="instructor-detail.php"><?php echo $fetch_row['full_name'];?></a></h5>
                                                                                                <?php
                                                                            }
                                                                                                ?>
											</div>
										 <div class="cources_price_foot"><span class="price_off"><?php if( $cat_row['course_price']=="free"){ echo "";}else{ echo $cat_row['course_price'];} ?></span>
                                                                                    <?php if( $cat_row['course_price']=="free"){ echo "Free";}else{ echo $cat_row['course_price']-$cat_row['discount_percentage']/100*$cat_row['course_price'];} ?>
                                                                                    </div>
										</div>
										
									</div>	
								</div>
								
                                                                <?php
                                                                }
                                                                ?>
								
					
							</div>
                                                        <?php
                                                        }
                                                        ?>
							
							
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

<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/grid-with-sidebar-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:46 GMT -->
</html>