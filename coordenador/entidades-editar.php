<?php require_once 'valida.php';?>
<?php

if (isset($_GET['pk']) && is_numeric($_GET['pk'])) {
    $pk = $_GET['pk'];
    $query = "SELECT * FROM entidades WHERE PK_ENTIDADE = :pk";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    $smtp->execute();
    $linha = $smtp->fetch(PDO::FETCH_OBJ);
} else {
    header('Location: entidades.php');
}

?>
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
            <!-- ============================================================== -->
            <?php include_once 'include/header.php'?>
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->


			<!-- ============================ Dashboard: My Order Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">

					<!-- Row -->
					<div class="row">

					<?php include_once 'include/nav.php'?>

						<div class="col-lg-9 col-md-9 col-sm-12">
							<form  action="entidades-funcao.php?funcao=editar&pk=<?=$pk?>" method="post">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Painel</a></li>
											<li class="breadcrumb-item active" aria-current="page">Entidades Editar</li>
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
												<h4>Editar entidade</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-6">
														<label>Nome</label>
														<input type="text" value="<?=$linha->NOME?>" required name="nome" class="form-control">
													</div>

													<div class="form-group col-md-6">
														<label>Apelido</label>
														<input type="text" value="<?=$linha->NOME_FANTASIA?>" name="apelido" class="form-control">
													</div>

													<div class="form-group col-md-4">
														<label>CPF</label>
														<input type="text" value="<?=$linha->CPF?>" required name="cpf" class="form-control cpf">
														<span id="txtCPF" class="payment_status cancel" style="color: red;">CPF inv??lido</span>
													</div>

													<div class="form-group col-md-4">
														<label>RG</label>
														<input type="text" value="<?=$linha->RG?>" required name="rg" class="form-control">
													</div>

													<div class="form-group col-md-4">
														<label>C??d. INEP</label>
														<input type="text" value="<?=$linha->COD_INEP?>"  name="cod" class="form-control">
													</div>

													<div class="form-group col-md-4">
														<label>Data de nascimento</label>
														<input type="date" value="<?=$linha->DATA_NASCIMENTO?>" required name="edu-start" class="form-control" />
													</div>

													<div class="form-group col-md-4">
														<label>Telefone 1</label>
														<input type="text" value="<?=$linha->TELEFONE1?>" required name="telefone-1" class="form-control" />
													</div>

													<div class="form-group col-md-4">
														<label>Telefone 2</label>
														<input type="text" value="<?=$linha->TELEFONE2?>" name="telefone-2" class="form-control" />
													</div>

													<div class="form-group col-md-4">
														<label>E-mail</label>
														<input type="email" required value="<?=$linha->EMAIL?>" name="email" class="form-control" />
													</div>

													<div class="form-group col-md-4">
														<label>Tipo</label>
														<select name="tipo" required class="form-control">
															<option <?=($linha->PK_TIPO_CADASTRO == 1) ? 'selected' : '';?> value="1">Aluno</option>
															<option <?=($linha->PK_TIPO_CADASTRO == 2) ? 'selected' : '';?> value="2">Professor</option>
															<option <?=($linha->PK_TIPO_CADASTRO == 3) ? 'selected' : '';?> value="3">Coordenador</option>
															<option <?=($linha->PK_TIPO_CADASTRO == 4) ? 'selected' : '';?> value="4">Diretor</option>
														</select>
													</div>

													<div class="form-group col-md-4">
														<label>Senha</label>
														<input type="hidden"   name="senhaOld" class="form-control" />
														<input type="password"   name="senha" class="form-control" />
													</div>
												</div>
											</div>
											<!-- Basic info -->

										</div>

									</div>
								</div>
							</div>
							<!-- /Row -->

							<!-- /Row -->

							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<button class="btn btn-theme" type="submit">Salvar entidade</button>
								</div>
							</div>
							</form>
						</div>

					</div>
					<!-- Row -->

				</div>
			</section>
			<!-- ============================ Dashboard: My Order Start End ================================== -->



			<?php require_once 'include/footer.php'?>

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

		<script src="../assets/js/dropzone.js"></script>
		<script src="../assets/js/valida.cpf.js"></script>
		<!-- Date Booking Script -->
		<script src="../assets/js/moment.min.js"></script>
		
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		<script src="../assets/js/metisMenu.min.js"></script>
		<script>
			$('#side-menu').metisMenu();
		</script>

	</body>

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 12:05:45 GMT -->
</html>