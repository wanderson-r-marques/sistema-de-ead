<?php require_once 'valida.php'; ?>
<?php require_once '../helpers/alert.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title><?= SITE ?> - Aulas EAD </title>
	<link rel="icon" href="<?= FAVICON ?>" />
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
	<div id="preloader">
		<div class="preloader"><span></span><span></span></div>
	</div>


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
										<li class="breadcrumb-item active" aria-current="page">Escolas</li>
									</ol>
								</nav>
							</div>
						</div>
						<!-- /Row -->

						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?= alert() ?>
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
													<form action="escolas.php" class="form-inline my-2 my-lg-0">
														<input class="form-control" type="search" value="<?= $_GET['p'] ?? '' ?>" name="p" placeholder="Procurar" aria-label="Search">
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
													<div class="form-group col-md-12" style="margin-top:1rem;">
														<a href="escolas-cadastro.php" class="btn add-items"><i class="fa fa-plus-circle"></i>Adicionar escolas</a>
													</div>
													<div class="dashboard_container_body">
														<div class="table-responsive">
															<table class="table">
																<thead class="thead-dark">
																	<tr>
																		<th scope="col">Código</th>
																		<th scope="col">Escola</th>
																		<th scope="col">Ação</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$where = '';
																	$busca = $_GET['p'] ?? '';
																	$where = " WHERE DESCRICAO LIKE ('%" . $busca . "%') || COD_INEP LIKE ('%" . $busca . "%')";

																	$query = "SELECT PK_ESCOLA, DESCRICAO AS ESCOLA, COD_INEP AS COD  FROM escolas  $where ORDER BY DESCRICAO ASC";

																	$smtp = $con->prepare($query);

																	if ($smtp->execute()) {
																		// Pega o total de registros
																		$total = $smtp->rowCount();
																		//determina o numero de registros que serão mostrados na tela
																		$maximo = 10;
																		//pega o valor da pagina atual
																		$pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1';

																		//subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
																		$inicio = $pagina - 1;
																		//multiplicamos a quantidade de registros da pagina pelo valor da pagina atual
																		$inicio = $maximo * $inicio;
																		// Nova query com as limitações
																		$query = "SELECT PK_ESCOLA, DESCRICAO AS ESCOLA, COD_INEP AS COD FROM escolas $where ORDER BY DESCRICAO ASC	LIMIT $inicio,$maximo";
																		$smtp = $con->prepare($query);
																		$smtp->execute();

																		$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
																		foreach ($linhas as $linha) {
																	?>
																			<tr>
																				<th scope="row" wm-lista><?= $linha->COD ?></th>
																				<td><?= $linha->ESCOLA ?></td>
																				<td>
																					<div class="dash_action_link">
																						<a href="escolas-visualizar.php?pk=<?= $linha->PK_ESCOLA ?>" class="view">Ver</a>
																						<a href="escolas-editar.php?pk=<?= $linha->PK_ESCOLA ?>" class="edit">Editar</a>
																						<a href="escolas-adicionar-professores.php?pk=<?= $linha->PK_ESCOLA ?>" class="edit"><i class="fa fa-users"></i></a>
																						<a onclick="return confirm('Deseja deletar?')" href="escolas-funcao.php?funcao=deletar&pk=<?= $linha->PK_ESCOLA ?>" class="cancel">Deletar</a>
																					</div>
																				</td>
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


										<!-- /Row Início da paginação -->
										<!-- É necessário que exista a variável $pagina e $total no código -->
										<?php include 'include/paginacao.php' ?>
										<!-- /Row Final da paginação -->

										<br>

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