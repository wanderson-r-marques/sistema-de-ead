<!DOCTYPE html>
<html lang="pt-br">
	
<head>
        <title><?=SITE?> - Aulas EAD </title>
        <link rel="icon" href="<?=FAVICON?>" />
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Custom CSS -->
        <link href="../assets/css/styles.css" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="../assets/css/colors.css" rel="stylesheet">

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
            <?php include_once 'include/header.php' ?>	
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	

			
			<!-- ============================ Dashboard: My Order Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">
					
					<!-- Row -->
					<div class="row">
					
					<?php include_once 'include/nav.php' ?>	
						
						<div class="col-lg-9 col-md-9 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Listing</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Submit your Course</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-6">
														<label>Course Title</label>
														<input type="text" class="form-control" placeholder="Course Title">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Price</label>
														<input type="email" class="form-control" placeholder="Ex. 199.10">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Start</label>
														<input type="text" name="edu-start" class="form-control" value="10/24/2020" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Expire</label>
														<input type="text" name="edu-expire" class="form-control" value="10/24/2021" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Tag</label>
														<input type="text" class="form-control" value="Ex. design, PHP, CSS">
													</div>
													
													<div class="form-group col-md-6">
														<label>Instructor Name</label>
														<input type="text" class="form-control" placeholder="Anshu Majavi">
													</div>
													
													<div class="form-group col-md-12">
														<label>Course Image</label>
														<form action="https://themezhub.net/upload-target" class="dropzone dz-clickable primary-dropzone">
															<div class="dz-default dz-message">
																<i class="ti-gallery"></i>
																<span>Drag & Drop To Change Logo</span>
															</div>
														</form>
													</div>
													
												</div>
											</div>
											<!-- Basic info -->
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Course Description</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-12">
														<label>About Course</label>
														<textarea class="form-control" placeholder="Description"></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>Category</label>
														<input type="text" class="form-control" placeholder="Ex. Science, Physics, Math..">
													</div>
													
												</div>
											</div>
											<!-- Basic info -->
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Course Videos</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												
												<h6 class="ml-2">Item</h6>
												<div class="form-row">
												
													<div class="form-group col-md-4">
														<label>Title</label>
														<input type="text" class="form-control" placeholder="Video Title">
													</div>
													
													<div class="form-group col-md-4">
														<label>Category</label>
														<input type="email" class="form-control" placeholder="Video Category">
													</div>
													
													<div class="form-group col-md-4">
														<label>URL</label>
														<input type="text" class="form-control" placeholder="Video URL">
													</div>
													
													<div class="form-group col-md-12">
														<a href="javascript:void(0);" class="btn add-items"><i class="fa fa-plus-circle"></i>Add Item</a>
													</div>
												</div>
												
												
											</div>
											<!-- Basic info -->
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<button class="btn btn-theme" type="submit">Save Course</button>
								</div>
							</div>
							
						</div>
					
					</div>
					<!-- Row -->
					
				</div>
			</section>
			<!-- ============================ Dashboard: My Order Start End ================================== -->
			
			<!-- ============================== Start Newsletter ================================== -->
			<section class="newsletter theme-bg inverse-theme">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 col-sm-12">
							<div class="text-center">
								<h2>Join Thousand of Happy Students!</h2>
								<p>Subscribe our newsletter & get latest news and updation!</p>
								<form class="sup-form">
									<input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
									<input type="submit" class="btn btn-theme" value="Get Started">
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ================================= End Newsletter =============================== -->
			
			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">
							
							<div class="col-lg-3 col-md-3">
								<div class="footer-widget">
									<img src="assets/img/logo-light.png" class="img-footer" alt="" />
									<div class="footer-add">
										<p>4967  Sardis Sta, Victoria 8007, Montreal.</p>
										<p>+1 246-345-0695</p>
										<p>info@learnup.com</p>
									</div>
									
								</div>
							</div>		
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">Navigations</h4>
									<ul class="footer-menu">
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="faq.html">FAQs Page</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="blog.html">Blog</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">New Categories</h4>
									<ul class="footer-menu">
										<li><a href="#">Designing</a></li>
										<li><a href="#">Nusiness</a></li>
										<li><a href="#">Software</a></li>
										<li><a href="#">WordPress</a></li>
										<li><a href="#">PHP</a></li>
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
							
							<div class="col-lg-3 col-md-12">
								<div class="footer-widget">
									<h4 class="widget-title">Download Apps</h4>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="lni-playstore theme-cl"></i>
											</div>
											<div class="os-app-caps">
												Google Play
												<span>Get It Now</span>
											</div>
										</div>
									</a>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="lni-apple theme-cl"></i>
											</div>
											<div class="os-app-caps">
												App Store
												<span>Now it Available</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-6 col-md-6">
								<p class="mb-0">© 2020 LearnUp. Designd By <a href="https://themezhub.com/">Themezhub</a>.</p>
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
									<li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
								</ul>
							</div>
							
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login ntr mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
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
							
							<div class="modal-divider"><span>Or Signup via</span></div>
							<div class="social-login ntr mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
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
		
		<script src="assets/js/dropzone.js"></script>
		
		<!-- Date Booking Script -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		<script src="assets/js/metisMenu.min.js"></script>	
		<script>
			$('#side-menu').metisMenu();
		</script>
		
		<script>
				// Course Expire and Start Daterange Script
			$(function() {
			  $('input[name="edu-expire"]').daterangepicker({
				singleDatePicker: true,
			  });
				$('input[name="edu-expire"]').val('');
				$('input[name="edu-expire"]').attr("placeholder","Course Expire");
			});
			$(function() {
			  $('input[name="edu-start"]').daterangepicker({
				singleDatePicker: true,
				
			  });
				$('input[name="start"]').val('');
				$('input[name="start"]').attr("placeholder","Course Start");
			});
		</script>

	</body>

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 12:05:45 GMT -->
</html>