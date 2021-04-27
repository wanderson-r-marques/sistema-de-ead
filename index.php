
<?php session_start();?>
<?php require_once 'config.php';?>
<?php require_once 'helpers/alert.php';?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title><?=SITE?> - Aulas EAD</title>
        <link rel="icon" href="<?=FAVICON?>" />
		<meta charset="utf-8" />
		<meta name="author" content="Wanderson R Marques" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">
		
    </head>

    <body>	
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
			<?php include_once 'includes/header.php'?>
			<?= alert() ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->

			<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero_banner hero-inner-2" style="background:#152974 url(assets/img/b-1.jpg) no-repeat;" data-overlay="0">
				<div class="container">
					<!-- Type -->
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-8 col-sm-12">
							<h1 class="cl_2 f_2 large_h">Commit To Your creativity For <span class="theme-cl">30 Days</span></h1>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
							<div class="banner-search shadow_high mt-4">
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
												<a href="#" class="btn search-btn full-width btn-black">Go</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->

			<!-- ============================ Trips Facts Start ================================== -->
			<div class="brands_up">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="_partner_brands large op-1 shadow_upper">
								<div class="single_brand" id="brand-slide">

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-1.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-2.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-3.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-4.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-5.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-6.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-7.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-8.png" class="img-fluid" alt="" />
									</div>

									<!-- single -->
									<div class="single_brands">
										<img src="assets/img/lg-9.png" class="img-fluid" alt="" />
									</div>

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
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-1">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/content.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Development</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>23 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-2">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/briefcase.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Business</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>58 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-3">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/career.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Accounting</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>74 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-4">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/python.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">IT & Software</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>65 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-10">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/designer.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Art & Design</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>43 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-6">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/speaker.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Marketing</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>82 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-7">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/photo.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Photography</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>25 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-8">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/yoga.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Health & Fitness</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>43 Classes</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-9">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="assets/img/health.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="#">Lifestyle</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>38 Classes</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ========================== Featured Category Section =============================== -->

			<!-- ============================ Featured Courses Start ================================== -->
			<section class="light-2">
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
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-2.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Learn Full Photoshop Course CS6</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>11 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.9</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-7">Banking</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$749<div class="less_offer">$999</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

						<!-- Cource Grid 1 -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-3.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Full Web Designing Course</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>13 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.6</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-9">Accounting</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$510<div class="less_offer">$799</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

						<!-- Cource Grid 1 -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-4.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Adobe Dreamwear Flash Coded</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>15 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.7</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-4">Business</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$549<div class="less_offer">$1049</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

						<!-- Cource Grid 1 -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-5.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Learn Full Photoshop Course CS6</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>16 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.9</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-3">Instructor</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$449<div class="less_offer">$749</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

						<!-- Cource Grid 1 -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-6.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Business Analysis Full Courses</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>10 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.8</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-2">Animation</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$599<div class="less_offer">$699</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

						<!-- Cource Grid 1 -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
							<div class="education_block_list_layout style-2">

								<div class="education_block_thumb n-shadow">
									<a href="course-detail.html"><img src="assets/img/co-7.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="list_layout_ecucation_caption">

									<div class="education_block_body">
										<h4 class="bl-title"><a href="course-detail.html">Learn To Create WP Theme</a></h4>
										<div class="_course_admin_ol12">By: <strong>Andrew S. Thomas</strong></div>

										<div class="_course_less_infor">
											<ul>
												<li><i class="ti-desktop mr-1"></i>12 Lesson</li>
												<li><span class="class online"></span>Online Class</li>
											</ul>
										</div>

										<div class="course_rate_system_wrap">
											<div class="course_rate_system">
												<div class="course_ratting">
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star filled"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="course_reviews_info">
													<strong class="mid">4.7</strong>
												</div>
											</div>
											<div class="_course_category_01"><span class="cat-1">Design</span></div>
										</div>
									</div>

									<div class="education_block_footer">
										<div class="cources_price">$700<div class="less_offer">$1099</div></div>
										<div class="cources_info_style3">
											<a href="course-detail.html" class="_cr_detail_arrow"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>


					</div>

				</div>
			</section>
			<!-- ============================ Featured Courses End ================================== -->

			<!-- ========================== About Facts List Section =============================== -->
			<section>
				<div class="container">

					<div class="row align-items-center">

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="about-short">
								<div class="sec-heading mb-3">
									<h2>Know about <span class="theme-cl">e-Learn</span> learning platform</h2>
								</div>
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et voluptatem.</p>
								<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut</p>
								<div class="cource_facts">
									<ul>
										<li><span class="theme-cl">7m</span>Active Cources</li>
										<li><span class="theme-cl">77k</span>Student Learning</li>
										<li><span class="theme-cl">84+</span>Free Cources</li>
									</ul>
								</div>
								<a href="#" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="list_facts_wrap_img">

								<img src="assets/img/edu_2.png" class="img-fluid" alt="">

							</div>
						</div>

					</div>

				</div>
			</section>
			<!-- ========================== About Facts List Section =============================== -->

			<!-- ============================ Featured Instructor Start ================================== -->
			<section class="pt-0">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>Meet Instructors</p>
								<h2><span class="theme-cl">Top & Famous</span> Instructor in Your City</h2>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">

							<div class="four_slide-dots articles arrow_middle">

								<!-- Single Slide -->
								<div class="singles_items">
									<div class="instructor_wrap">
										<div class="instructor_thumb">
											<a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="instructor_caption">
											<h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
											<span>Web Designer</span>
											<ul>
												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
												<li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- Single Slide -->
								<div class="singles_items">
									<div class="instructor_wrap">
										<div class="instructor_thumb">
											<a href="instructor-detail.html"><img src="assets/img/user-2.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="instructor_caption">
											<h4><a href="instructor-detail.html">Shilpa Singh</a></h4>
											<span>Team Manager</span>
											<ul>
												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
												<li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- Single Slide -->
								<div class="singles_items">
									<div class="instructor_wrap">
										<div class="instructor_thumb">
											<a href="instructor-detail.html"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="instructor_caption">
											<h4><a href="instructor-detail.html">Adam Wistom</a></h4>
											<span>Sales Manager</span>
											<ul>
												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
												<li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- Single Slide -->
								<div class="singles_items">
									<div class="instructor_wrap">
										<div class="instructor_thumb">
											<a href="instructor-detail.html"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="instructor_caption">
											<h4><a href="instructor-detail.html">Ragini Singh</a></h4>
											<span>Business Executing</span>
											<ul>
												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
												<li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- Single Slide -->
								<div class="singles_items">
									<div class="instructor_wrap">
										<div class="instructor_thumb">
											<a href="instructor-detail.html"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="instructor_caption">
											<h4><a href="instructor-detail.html">Daniel Wilson</a></h4>
											<span>HR Manager</span>
											<ul>
												<li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
												<li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
												<li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Featured Instructor End ================================== -->

			<!-- ========================== Articles Section =============================== -->
			<section class="bg-light">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>Our Story</p>
								<h2><span class="theme-cl">Recent</span> Articles to You</h2>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-1.jpg" class="img-fluid" alt="" /></a>
								</div>

								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>
										<h4>Adam Willsone</h4>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-2.jpg" class="img-fluid" alt="" /></a>
								</div>

								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-2.jpg" class="img-fluid" alt="" /></div>
										<h4>Rikki Sen</h4>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-3.jpg" class="img-fluid" alt="" /></a>
								</div>

								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-3.jpg" class="img-fluid" alt="" /></div>
										<h4>Daniel Wikjones</h4>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ========================== Articles Section =============================== -->

			<!-- ========================== Brand Section =============================== -->
			<section>
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>What People Say?</p>
								<h2><span class="theme-cl">Reviews</span> By Our Success &amp; Top Students</h2>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="reviews_third" id="reviews-slide">

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-2.jpg" class="img-fluid" alt=""></div>
										<h5>Adam Wardilia</h5>
										<span>CEO, Invenue Private Ltd.</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></div>
										<h5>Catherine E. Todd</h5>
										<span>Founder of Innovation Ltd.</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></div>
										<h5>Adam Wardilia</h5>
										<span>CEO, Invenue Private Ltd.</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></div>
										<h5>Thomas P. Freeman</h5>
										<span>CEO, Harsh Infotech Ltd.</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></div>
										<h5>Kathy A. Carney</h5>
										<span>Project Manager at Google</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-6.jpg" class="img-fluid" alt=""></div>
										<h5>Jason P. Claassen</h5>
										<span>Content Writer at Sliss Soft</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

								<!-- single -->
								<div class="testimonial-wraps">
									<div class="testimonial-icon">
										<div class="testimonial-icon-thumb"><span class="quotes"><i class="fas fa-quote-left"></i></span><img src="assets/img/user-7.jpg" class="img-fluid" alt=""></div>
										<h5>Branden S. Duncan</h5>
										<span>CEO, Drizvato Limited.</span>
										<div class="testi-rate">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
										</div>
									</div>
									<div class="facts-detail">
										<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi.</p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ========================== Brand Section =============================== -->

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
								<p class="mb-0">© 2020 LearnUp. Designd By <a href="https://themezhub.com">Themezhub</a>.</p>
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
			<?php include_once 'includes/signup.php'?>
			<!-- End Modal -->

			<!-- Sign Up Modal -->
			<?php include_once 'includes/signin.php'?>
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
		<script src="assets/js/jquery.mask.min.js"></script>
		<script src="assets/js/custom.js"></script>

		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>