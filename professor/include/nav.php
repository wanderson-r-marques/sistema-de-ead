<div class="col-lg-3 col-md-3 p-0">
							<div class="dashboard-navbar">

								<div class="d-user-avater">

									<div class="linkFoto">

									<form action="helpers/upload-imagem.php" method="post" enctype="multipart/form-data">
										<img src="../assets/img/user.png" class="img-fluid avater" alt="Perfil">
										<div class="input-group mb-3 alterarFoto">
											
											<div class="custom-file">
													
												<input type="file" class="custom-file-input" id="inputGroupFile01">
												
											</div>
										</div>
									</form>
									</div>

									<h4><?=$entidade->NOME?></h4>
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