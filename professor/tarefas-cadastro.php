<?php require_once 'valida.php'; ?>

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
						<form action="tarefas-funcao.php?funcao=alunos" enctype="multipart/form-data" method="post">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Painel</a></li>
											<li class="breadcrumb-item active" aria-current="page">Tarefas Cadastro</li>
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
												<h4>Cadastrar Tarefas</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">

											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-12">
														<label>Série</label>
														<?php
														$query = "SELECT 
															F.`PK_SERIES` AS PK,
															F.`DESCRICAO` 
													 FROM entidades        			A
													 JOIN professor_escola 			B ON A.`PK_ENTIDADE` = B.`entidade`
													 JOIN escolas          			C ON B.`escola` = C.`PK_ESCOLA`
													 JOIN professor_turmas_disciplinas	D ON A.`PK_ENTIDADE` = D.`pk_entidade`
													 JOIN turmas				E ON D.`pk_turma` = E.`PK_TURMA`
													 JOIN series				F ON E.`PK_SERIE` = F.`PK_SERIES`
													 WHERE CPF=?
													 GROUP BY F.`PK_SERIES`";
														$smtp = $con->prepare($query);
														$smtp->execute([$cpf]);
														$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
														?>
														<select name="serie" required wm-serie class="form-control">
															<option value="">Selecione a série</option>
															<?php foreach ($linhas as $linha) : ?>
																<option value="<?= $linha->PK ?>"><?= $linha->DESCRICAO ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div wm-escolas class="form-group col-md-12">

													</div>

													<div wm-turmas class="form-group col-md-12">

													</div>



												</div>
											</div>
											<!-- Basic info -->



											<!-- Materiais -->
											<div wm-materiais class="submit-section d-none">
												<div class="form-row" wm-cxArquivo>


													<div class="form-group col-12">
														<label>Descrição</label>
														<input type="text" required name="descricao" class="form-control" />
													</div>


													<h5 class="pt-5">arquivos</h5>

													<?php for ($i = 0; $i < 3; $i++) : ?>
														<div class="form-row" wm-ordem="<?= $i + 1 ?>">
															<div class="form-group col-12  pt-5">
																<label wm-labelTitulo><b>Título <?= $i + 1 ?></b></label>
																<input type="text" wm-titulo name="titulo[<?= $i + 1 ?>]" class="form-control" />
															</div>
															<div class="form-group col-4">
																<label>Tipo</label>
																<?php
																$query = "SELECT
																`PK_TIPO_MATERIAL`  AS PK,
																`DESCRICAO`,
																`RETORNO`
															FROM
																`tipos_material`
															ORDER BY DESCRICAO ASC";
																$smtp = $con->prepare($query);
																$smtp->execute();
																$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
																?>
																<select name="tipo[<?= $i + 1 ?>]" wm-tipo required class="form-control">
																	<?php foreach ($linhas as $linha) : ?>
																		<option value="<?= $linha->PK ?>"><?= $linha->DESCRICAO ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
															<div class="form-group col-2">
																<label>Carga Horária</label>
																<input type="text" name="carga[<?= $i + 1 ?>]" wm-carga class="form-control carga-horaria" />
															</div>
															<div class="form-group col-2">
																<label>Modo</label>
																<select name="modo[<?= $i + 1 ?>]" wm-modo class="form-control">
																	<option value="link">Link</option>
																	<option value="arquivo">Arquivo</option>
																</select>
															</div>
															<div class="form-group col-4">
																<label>Material </label>
																<input type="text" wm-link name="link[<?= $i + 1 ?>]" class="form-control" />
															</div>
														</div>
													<?php endfor; ?>
												</div>
											</div>

											<!-- Fim materiais -->
										</div>
										<div wm-btnAdd class="row w-100 text-center d-none">
											<div class="form-group col-lg-12 col-md-12 mt-3 text-center">
												<a class="btn btn-success text-white" onclick="clonarArquivo()"><i class="fa fa-plus-circle"></i> Adicionar mais arquivo</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<button class="btn btn-theme" type="submit">Salvar</button>
								</div>
							</div>

					</div>

				</div>
				<!-- Row -->
				</form>
			</div>
		</section>
		<!-- ============================ Dashboard: My Order Start End ================================== -->


		<?php require_once 'include/footer.php' ?>


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

	<!-- Date Booking Script -->
	<script src="../assets/js/moment.min.js"></script>
	<script src="../assets/js/daterangepicker.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<script src="../assets/js/metisMenu.min.js"></script>
	<script src="../assets/js/metisMenu.min.js"></script>

	<script src="assets/js/custom.js"></script>

</body>

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 12:05:45 GMT -->

</html>