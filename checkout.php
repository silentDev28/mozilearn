<?php
include 'conn.php';
session_start();
$message = "";
if (empty($_SESSION['student_email'])) {
    header("Location:" . "index.php");
} else {
    $active_user = $_SESSION['student_email'];
    $firstname = "";
    $lastname = "";
    $email = "";
    $phonenumber = "";
    $fetch_students = $conn->query("SELECT * FROM students WHERE email='$active_user'");
    while ($get_user = $fetch_students->fetch_assoc()) {
        $firstname = $get_user['firstname'];
        $lastname = $get_user['lastname'];
        $email = $get_user['email'];
        $phonenumber = $get_user['phone_number'];
    }
    $course_id = $_GET['course_id'];
    $course_price = "";
    $course_discount = "";
    $fetch_course = $conn->query("SELECT * FROM courses WHERE id='$course_id'");
    while ($row = $fetch_course->fetch_assoc()) {
        $course_price = $row['course_price'];
        $course_discount = $row['discount_percentage'];
    }
}
if (isset($_POST['checkout'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
    if (empty($firstname) or empty($lastname) or empty($email) or empty($phone_number) or empty($address) or empty($city) or empty($country) or empty($postal_code)) {
        $message = "<div class='alert alert-danger' role='alert'>
 Please fill out all empty fields.
</div>";
    } else if ($active_user != $email) {
        $message = "<div class='alert alert-danger' role='alert'>Please check,the email address does not match.

</div>";
    } else {
        $course_code = "";
        $course_title = "";
        $fetch_course = $conn->query("SELECT * FROM courses where id='$course_id'");
        while ($row = $fetch_course->fetch_assoc()) {
            $course_code = $row['course_code'];
            $course_title = $row['course_title'];
        }
        $fecth_enroll_exist = $conn->query("SELECT * FROM enroll WHERE course_code='$course_code' AND email='$email'");
        if ($fecth_enroll_exist->num_rows != 0) {
            $message = "<div class='alert alert-danger' role='alert'>You have already enroll for this course.

</div>";
        } else {
            $insert_enroll = $conn->query("INSERT INTO enroll (firstname,lastname,email,phone_number,course_code,address,city,country,postal_code)VALUES('$firstname','$lastname','$email','$phone_number','$course_code','$address','$city','$country','$postal_code')");
            if ($insert_enroll == true) {
                $message = "<div class='alert alert-success' role='alert'>
 You have successfully enroll for " . $course_title . "
</div>";
            } else {
                $message = "<div class='alert alert-danger' role='alert'>" . $conn->error . "

</div>";
            }
        }

    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    session_unset();
    header("Location:" . "/mozilearn/login.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:51 GMT -->
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
$getnavCat = $conn->query("SELECT * FROM category");
if ($getnavCat->num_rows != 0) {
    while ($getnavrow = $getnavCat->fetch_assoc()) {
        ?>
                                                <li><a href="category.php?category=<?php echo $getnavrow['cat_title']; ?>"><?php echo $getnavrow['cat_title']; ?><span class="submenu-indicator"></span></a>

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
                                <?php
if (empty($active_user)) {
    ?>
                                    <li class="login_click bg-red">

                                        <a href="login.php"  >Sign in</a>
                                    </li>
                                    <?php
} else {
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
								<h1 class="breadcrumb-title">Checkout</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Checkout</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->


			<!-- ============================ Add To cart ================================== -->
			<section class="pt-0">
				<div class="container">

					<div class="row">
						<div class="col-lg-8 col-md-12">

							<div class="cart_totals checkout light_form mb-4">
								<h4>Billing info</h4>
                                                                 <form action="" method="post">
								<div class="row">
                                                                    <div style="padding-bottom: 20px;padding-top: 20px;" class="col-12">
                                                                                        <?php
echo $message;
?>

                                                                                    </div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">

											<label>First Name</label>
											<input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Email Address</label>
											<input type="text" class="form-control" value="<?php echo $email; ?>" name="email">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Phone Number</label>
											<input type="text" class="form-control"value="<?php echo $phonenumber; ?>" name="phone_number">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Address</label>
											<input type="text" class="form-control" name="address">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Town/City</label>
											<input type="text" class="form-control"name="city">
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>State/Country</label>
                                                                                        <input type="text" name="country" class="form-control"/>
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Zip/Postal Code</label>
											<input type="text" class="form-control"name="postal_code">
										</div>
									</div>

<!--									<div class="col-lg-6 col-md-6">
										<div class="sm-add-ship">
											<input id="aa-4" class="checkbox-custom" name="aa-4" type="checkbox">
											<label for="aa-4" class="checkbox-custom-label">Skip to a different address?</label>
										</div>
									</div>-->

								</div>
							</div>
<!--
							<div class="cart_totals checkout light_form">
								<h4>Select Payment Methode</h4>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4">
										<div class="choose_payment_mt active">
											<img src="assets/img/mastercard.png" alt="" />
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
										<div class="choose_payment_mt">
											<img src="assets/img/paypal.png" alt="" />
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
										<div class="choose_payment_mt">
											<img src="assets/img/visa.png" alt="" />
										</div>
									</div>
								</div>

								<div class="row">

									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Card Number</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-7 col-md-7">
										<div class="form-group">
											<label>Card Holder</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-lg-3 col-md-3">
										<div class="form-group">
											<label>Expiry Date</label>
											<input type="text" class="form-control" placeholder="mm/dd/yyyy">
										</div>
									</div>

									<div class="col-lg-2 col-md-2">
										<div class="form-group">
											<label>CVC</label>
											<input type="text" class="form-control" placeholder="cvc">
										</div>
									</div>

									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<button type="button" class="btn btn-theme full-width">Proceed To Checkout</button>
										</div>
									</div>

								</div>

							</div>-->

						</div>

						<div class="col-lg-4 col-md-12">
							<!-- Total Cart -->
							<div class="cart_totals checkout">
								<h4>Order Summary</h4>
								<div class="cart-wrap">
									<ul class="cart_list">
										<li>Base price<strong><?php echo $course_price ?></strong></li>
										<li>Discount<strong><?php if (empty($course_discount)) {
    echo "0";
} else {
    echo $course_discount;
}?>%</strong></li>

									</ul>
									<div class="flex_cart">
										<div class="flex_cart_1">
											Total Cost
										</div>
										<div class="flex_cart_2">
										<?php
if ($course_price == "free") {
    echo $course_price;
} else {
    echo $course_price - $course_discount / 100 * $course_price;
}
?>
										</div>
									</div>
                                                                   <?php
if ($course_price == "free") {
    ?>
                                                                    <input type="submit" class="btn checkout_btn" value="Proceed To Checkout" name="checkout"></input>
                                                                    <?php
} else {
    ?>
                                                                        	<button type="button" class="btn checkout_btn">Proceed To Checkout</button>
                                                                        <?php
}
?>

								</div>
                                                                </form>
							</div>
						</div>

					</div>

				</div>

			</section>
			<!-- ============================ Add To cart End ================================== -->

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

<!-- Mirrored from codeminifier.com/learnup-1.1/learnup/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Oct 2020 13:56:53 GMT -->
</html>