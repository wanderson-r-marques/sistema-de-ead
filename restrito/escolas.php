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
		<link href="../assets/css/custom.css" rel="stylesheet">
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
			<?php include_once 'include/header.php' ?>	
            <!-- ============================================================== -->            
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
											<li class="breadcrumb-item"><a href="#">Painel</a></li>
											<li class="breadcrumb-item active" aria-current="page">Modelo Lista</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->

							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">

									<!-- Course Style 1 For Student -->
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
											<h4>Escolas</h4>
											</div>
											<div class="dashboard_fl_2">
												<ul class="mb0">
													<li class="list-inline-item">

													</li>
													<li class="list-inline-item">
														<form class="form-inline my-2 my-lg-0">
															<input class="form-control" type="search" placeholder="Procurar" aria-label="Search">
															<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
														</form>
													</li>
												</ul>
											</div>
										</div>
										<div class="dashboard_container_body">

											<!-- Row -->
							<div class="row">
						
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashboard_container">
                                
                                <div class="dashboard_container_body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                   
                                                    <th scope="col">Escola</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php                                                     
                                                    $query = "SELECT a.`NOME`,b.`escola`,c.`DESCRICAO`,a.`CPF`,a.`MATRICULA`,a.`PK_ENTIDADE` 
                                                    FROM entidades a 
                                                    INNER JOIN professor_escola b ON a.MATRICULA = b.matricula 
                                                    INNER JOIN escolas          c ON b.escola  = c.PK_ESCOLA 
                                                    WHERE a.`CPF`=:cpf AND PK_TIPO_CADASTRO = 2";
                                                
                                                    $smtp = $con->prepare($query);                                                    
                                                    $smtp->bindParam(':cpf',$cpf);
                                                    if ($smtp->execute()) { 
                                                        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($linhas as $linha){ 
                                                ?>
                                                <tr>
                                                                                                     
                                                    <td><?= $linha->DESCRICAO ?></td>
                                                    
                                                </tr>                                               
                                               <?php 
                                                        }
                                                    } 
                                               ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
										</div>
									</div>

								</div>
							</div>
							<!-- /Row -->

						</div>

					</div>
					<!-- Row -->

				</div>
			</section>
			<!-- ============================ Dashboard: My Order Start End ================================== -->

			<?php include_once 'include/footer.php'; ?>

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