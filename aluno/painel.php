<?php require_once 'valida.php'; ?>
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
								
								<div class="d-user-avater">
									<img src="../assets/img/user.png" class="img-fluid avater" alt="">
									<h4><?= $entidade->NOME ?></h4>
									<span>Canada USA</span>
								</div>
								
								<div class="d-navigation">
									<ul id="side-menu">
										<li class="active"><a href="../template/dashboard.html"><i class="ti-user"></i>Dashboard</a></li>
										<li><a href="../template/my-profile.html"><i class="ti-heart"></i>My Profile</a></li>
										<li><a href="../template/add-listing.html"><i class="ti-plus"></i>Add Course</a></li>
										<li><a href="../template/saved-courses.html"><i class="ti-heart"></i>Saved Courses</a></li>
										<li class="dropdown">
											<a href="../template/all-courses.html"><i class="ti-layers"></i>All Courses<span class="ti-angle-left"></span></a>
											<ul class="nav nav-second-level">
												<li><a href="../template/all-courses.html">All</a></li>
												<li><a href="../template/javascript:void(0);">Published</a></li>
												<li><a href="../template/javascript:void(0);">Pending</a></li>
												<li><a href="../template/javascript:void(0);">Expired</a></li>
												<li><a href="../template/javascript:void(0);">In Draft</a></li>
											</ul>
										</li>
										<li><a href="../template/my-order.html"><i class="ti-shopping-cart"></i>My Order</a></li>
										<li><a href="../template/settings.html"><i class="ti-settings"></i>Settings</a></li>
										<li><a href="../template/reviews.html"><i class="ti-comment-alt"></i>Reviews</a></li>
										<li><a href="../template/#"><i class="ti-power-off"></i>Log Out</a></li>
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
											<li class="breadcrumb-item"><a href="../template/#">Home</a></li>
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
										<div class="dashboard_stats_wrap_content"><h4>607</h4> <span>Listings Included</span></div>
										<div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
									</div>	
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="dashboard_stats_wrap widget-2">
										<div class="dashboard_stats_wrap_content"><h4>102</h4> <span>Listings Remaining</span></div>
										<div class="dashboard_stats_wrap-icon"><i class="ti-pie-chart"></i></div>
									</div>	
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="dashboard_stats_wrap widget-4">
										<div class="dashboard_stats_wrap_content"><h4>70</h4> <span>Featured Included</span></div>
										<div class="dashboard_stats_wrap-icon"><i class="ti-user"></i></div>
									</div>	
								</div>

							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
						
								<div class="col-lg-8 col-md-12 col-sm-12">
									<div class="row">
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="course_overlay_cat">
												<div class="course_overlay_cat_thumb">
													<a href="../template/#" tabindex="0"><img src="../assets/img/course-1.jpg" class="img-fluid" alt=""></a>
												</div>
												<div class="course_overlay_cat_caption">
													<div class="llp-left">
														<h4><a href="../template/#">Web Designing</a></h4>
														<span>17 Classes</span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="course_overlay_cat">
												<div class="course_overlay_cat_thumb">
													<a href="../template/#" tabindex="0"><img src="../assets/img/course-2.jpg" class="img-fluid" alt=""></a>
												</div>
												<div class="course_overlay_cat_caption">
													<div class="llp-left">
														<h4><a href="../template/#">Digital Marketing</a></h4>
														<span>20 Classes</span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="course_overlay_cat">
												<div class="course_overlay_cat_thumb">
													<a href="../template/#" tabindex="0"><img src="../assets/img/course-3.jpg" class="img-fluid" alt=""></a>
												</div>
												<div class="course_overlay_cat_caption">
													<div class="llp-left">
														<h4><a href="../template/#">Account & Chart</a></h4>
														<span>22 Classes</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="course_overlay_cat">
												<div class="course_overlay_cat_thumb">
													<a href="../template/#" tabindex="0"><img src="../assets/img/course-5.jpg" class="img-fluid" alt=""></a>
												</div>
												<div class="course_overlay_cat_caption">
													<div class="llp-left">
														<h4><a href="../template/#">Business Development</a></h4>
														<span>10 Classes</span>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="card">
										<div class="card-header">
											<h6>Notifications</h6>
										</div>
										<div class="ground-list ground-hover-list">
											<div class="ground ground-list-single">
												<a href="../template/#">
													<div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="../template/#">Maryam Amiri</a></h6>
													<small class="text-fade">Check New Admin Dashboard..</small>
													<span class="small">Just Now</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="../template/#">
													<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="../template/#">Maryam Amiri</a></h6>
													<small class="text-fade">You can Customize..</small>
													<span class="small">02 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="../template/#">
													<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="../template/#">Maryam Amiri</a></h6>
													<small class="text-fade">Need Responsive Business Tem...</small>
													<span class="small">10 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-list-single">
												<a href="../template/#">
													<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="../template/#">Maryam Amiri</a></h6>
													<small class="text-fade">Next Meeting on Tuesday..</small>
													<span class="small">15 Min Ago</span>
												</div>
											</div>
											
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
												<h4>Recent Order</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
												<table class="table">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Order</th>
															<th scope="col">Date</th>
															<th scope="col">Status</th>
															<th scope="col">Total</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">#0000149</th>
															<td>02 July 2020</td>
															<td><span class="payment_status inprogress">In Progress</span></td>
															<td>$110.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="../template/#" class="view">View</a>
																	<a href="../template/#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>
														<tr>
															<th scope="row">#0000150</th>
															<td>04 July 2020</td>
															<td><span class="payment_status complete">Completed</span></td>
															<td>$119.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="../template/#" class="view">View</a>
																	<a href="../template/#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>
														<tr>
															<th scope="row">#0000151</th>
															<td>07 July 2020</td>
															<td><span class="payment_status complete">Completed</span></td>
															<td>$149.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="../template/#" class="view">View</a>
																	<a href="../template/#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>
														<tr>
															<th scope="row">#0000152</th>
															<td>10 July 2020</td>
															<td><span class="payment_status pending">Pending Payment</span></td>
															<td>$199.00</td>
															<td>
																<div class="dash_action_link">
																	<a href="../template/#" class="view">View</a>
																	<a href="../template/#" class="cancel">Cancel</a>
																</div>	
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
							<!-- /Row -->
							
						</div>
					
					</div>
					
				</div>
			</section>
			<!-- ============================ Dashboard: Dashboard End ================================== -->
			
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
									<img src="../assets/img/logo-light.png" class="img-footer" alt="" />
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
										<li><a href="../template/about-us.html">About Us</a></li>
										<li><a href="../template/faq.html">FAQs Page</a></li>
										<li><a href="../template/checkout.html">Checkout</a></li>
										<li><a href="../template/contact.html">Contact</a></li>
										<li><a href="../template/blog.html">Blog</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">New Categories</h4>
									<ul class="footer-menu">
										<li><a href="../template/#">Designing</a></li>
										<li><a href="../template/#">Nusiness</a></li>
										<li><a href="../template/#">Software</a></li>
										<li><a href="../template/#">WordPress</a></li>
										<li><a href="../template/#">PHP</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">Help & Support</h4>
									<ul class="footer-menu">
										<li><a href="../template/#">Documentation</a></li>
										<li><a href="../template/#">Live Chat</a></li>
										<li><a href="../template/#">Mail Us</a></li>
										<li><a href="../template/#">Privacy</a></li>
										<li><a href="../template/#">Faqs</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-3 col-md-12">
								<div class="footer-widget">
									<h4 class="widget-title">Download Apps</h4>
									<a href="../template/#" class="other-store-link">
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
									<a href="../template/#" class="other-store-link">
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
								<p class="mb-0">© 2020 LearnUp. Designd By <a href="../template/https://themezhub.com/">Themezhub</a>.</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<ul class="footer-bottom-social">
									<li><a href="../template/#"><i class="ti-facebook"></i></a></li>
									<li><a href="../template/#"><i class="ti-twitter"></i></a></li>
									<li><a href="../template/#"><i class="ti-instagram"></i></a></li>
									<li><a href="../template/#"><i class="ti-linkedin"></i></a></li>
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
									<li class="right"><a href="../template/#" class="theme-cl">Forget Password?</a></li>
								</ul>
							</div>
							
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login ntr mb-3">
								<ul>
									<li><a href="../template/#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="../template/#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
							</div>
							
							<div class="text-center">
								<p class="mt-2">Haven't Any Account? <a href="../template/register.html" class="link">Click here</a></p>
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
									<li><a href="../template/#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="../template/#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
							</div>
							
							<div class="text-center">
								<p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="../template/#" class="link">Go For LogIn</a></p>
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
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/popper.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>
		<script src="../assets/js/slick.js"></script>
		<script src="../assets/js/jquery.counterup.min.js"></script>
		<script src="../assets/js/counterup.min.js"></script>
		<script src="../assets/js/jquery.mask.min.js"></script>
		<script src="../assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		<script src="../assets/js/metisMenu.min.js"></script>	
		<script>
			$('#side-menu').metisMenu();
		</script>

	</body>
</html>