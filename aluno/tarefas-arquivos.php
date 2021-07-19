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
										<li class="breadcrumb-item active" aria-current="page">Tarefas</li>
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
											<h4>Entrega de Tarefas</h4>
										</div>
										<div class="dashboard_fl_2">
											<ul class="mb0">
												<li class="list-inline-item">
												</li>
												<li class="list-inline-item">
													<form action="turmas.php" class="form-inline my-2 my-lg-0">
														<input class="form-control" type="search" value="<?= $_GET['p'] ?? '' ?>" name="p" placeholder="Procurar" aria-label="Search">
														<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
													</form>
												</li>
											</ul>
										</div>
									</div>
									<form action="tarefas-funcao.php?pkTarefa=<?= $_GET['pkTarefa'] ?>&pkResposta=<?= $_GET['pkResposta'] ?>&funcao=resposta" method="post" enctype="multipart/form-data" wm-cxArquivo class="form-inline my-2 p-3 w-100">
										<div class="dashboard_container_body w-100">
											<!-- Row -->
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="dashboard_container p-4">
														<div class="dashboard_container_body w-100">
															<textarea class="form-control w-100" name="texto" id="area" rows="20"></textarea>
														</div>
														<h2 class="mt-5 mb-5 w-100">Arquivos</h2>
														<?php for ($i = 0; $i < 3; $i++) : ?>
															<div class="form-row w-100 mb-3" wm-ordem="<?= $i + 1 ?>">
																<div class="form-group col-7">
																	<label wm-labelDescricao>Descrição <?= $i + 1 ?></label>
																	<input type="text" name="descricao[<?= $i + 1 ?>]" wm-descricao class="form-control w-100" />
																</div>
																<div class="form-group col-5">
																	<label wm-labelArquivo>Arquivo <?= $i + 1 ?></label>
																	<input type="file" wm-arquivo name="arquivo[<?= $i + 1 ?>]" class="form-control w-100" />
																</div>
															</div>
														<?php endfor; ?>

													</div>
												</div>
											</div>
											<div wm-btnAdd class="row w-100 text-center">
												<div class="form-group col-lg-12 col-md-12 mt-3 text-center">
													<a class="btn btn-success text-white w-auto" onclick="clonarArquivo()"><i class="fa fa-plus-circle"></i> Adicionar mais arquivo</a>
												</div>
											</div>
											<br>
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
						</form>
					</div>
				</div>

				<!-- Row -->

			</div>
		</section>
		<!-- ============================ Dashboard: My Order Start End ================================== -->

		<?php include_once 'include/footer.php'; ?>



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
	<script src="assets/js/custom.js"></script>
	<script type="text/javascript" src="../assets/js/nicEdit.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<script src="../assets/js/metisMenu.min.js"></script>
	<script>
		$('#side-menu').metisMenu();
	</script>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			nicEditors.allTextAreas()
		}); // convert all text areas to rich text editor on that page

		bkLib.onDomLoaded(function() {
			new nicEditor().panelInstance('area1');
		}); // convert text area with id area1 to rich text editor.

		bkLib.onDomLoaded(function() {
			new nicEditor({
				fullPanel: true
			}).panelInstance('area2');
		}); // convert text area with id area2 to rich text editor with full panel.
	</script>
	<script type="text/javascript">
		//<![CDATA[
		bkLib.onDomLoaded(function() {
			new nicEditor({
				maxHeight: 200
			}).panelInstance('area');
			new nicEditor({
				fullPanel: true,
				maxHeight: 200
			}).panelInstance('area1');
		});
		//]]>
	</script>
</body>

</html>