<?php
include 'conn.php';
session_start();
$message="";
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email) or empty($password)){
        $message="<div class='alert alert-danger col-8' role='alert'>
  Please fill all empty fields
</div>";
    }else{
        $fetch_user=$conn->query("SELECT * FROM students WHERE email='$email' and password='$password'");
        $exist_user=$fetch_user->num_rows;
        if($exist_user!=0){
            $_SESSION['student_email']=$email;
           header("location:"."index.php");
        }else{
           $message="<div class='alert alert-danger col-8' role='alert'>
  Incorrect email or password
</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/course-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:57:03 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>LearnUp - Online Course & Education HTML Template</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">
		<script src="assets/js/jquery.min.js"></script>
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
                                <img src="assets/img/mozisha-logo.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">

                                <li><a href="index.php">Home<span class="submenu-indicator"></span></a>

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
								
<!--								<li class="login_click light">-->
<!--									<a href="#" data-toggle="modal" data-target="#login">Sign in</a>-->
<!--								</li>-->
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
		
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Course Detail ================================== -->
			<section class="bg-light">
				<div class="container col-5"style="display:flex;justify-content: center">
                                    <div class="row">
                                        <h6 style="width:100%;text-align: left;margin-bottom: 20px" class="col-12">Login to your Mozilearn Account!</h6>
                                        <div class="col-12">
                                           
                                            <?php echo $message;?>
                                        </div>
                                        <form action="" method="post" class="col-12">
                                            <input type="email" class="form-control col-8" style="margin-bottom: 20px" placeholder="Enter email" name="email"/>
                                            <input type="password" class="form-control col-8" style="margin-bottom: 20px" placeholder="Enter password" name="password"/>
                                        <div class="col-12" style="text-align: left;padding:0px">
                                            <input type="submit"  value="Login" style="padding: 10px;border:none;color:#DD205D;cursor: pointer" name="login"/>
                                        </form>
                                        </div>
                                    </div>
                                   
				</div>
			</section>
			
			
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
			</div>-->
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
			
			<!-- Video Modal -->
		
			<!-- End Video Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		
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

<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/course-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:57:03 GMT -->
</html>