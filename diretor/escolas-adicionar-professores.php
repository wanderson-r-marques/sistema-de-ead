<?php require_once 'valida.php'; ?>
<?php require_once '../helpers/alert.php'; ?>
<?php
$pk = $_GET['pk'];
?>
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
										<li class="breadcrumb-item active" aria-current="page">Adicionar professores</li>
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
											<h4>Adicionar professores</h4>
										</div>
										<div class="dashboard_fl_2">
											<ul class="mb0">
												<li class="list-inline-item">

												</li>
												<li class="list-inline-item">
													<form action="turmas-adicionar-alunos.php" class="form-inline my-2 my-lg-0">
														<input class="form-control" type="hidden" value="<?= $_GET['pk'] ?? '' ?>" name="pk">
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

													<div class="row">


														<div class="col-lg-6 col-md-6">
															<!-- Total Cart -->
															<div class="cart_totals checkout">
																<h4>Alunos não matriculados</h4>
																<div class="cart-wrap">
																	<ul class="cart_list " id="reports_out" ondrop="drop_out(event)" ondragover="allowDrop(event)">
																		<?php
																		$where = "";
																		$busca = $_GET['p'] ?? '';
																		$where = " AND (NOME LIKE ('%" . $busca . "%') || CPF LIKE ('%" . $busca . "%'))";
																		$query = "SELECT PK_ENTIDADE, NOME, CPF FROM `entidades`
																		WHERE PK_ENTIDADE NOT IN (SELECT entidade FROM `professor_escola` WHERE escola = $pk)
																		AND `PK_TIPO_CADASTRO` = 2
																		$where ORDER BY NOME";

																		$smtp = $con->prepare($query);
																		$smtp->execute();

																		$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
																		foreach ($linhas as $linha) {
																		?>
																			<li id="<?= $linha->PK_ENTIDADE ?>" ondragstart="drag(event)" draggable="true" class="b1"><?= $linha->NOME ?><strong><?= $linha->CPF ?></strong></li>
																		<?php } ?>
																	</ul>
																</div>
															</div>
														</div>

														<div class="col-lg-6 col-md-6">
															<!-- Total Cart -->
															<div class="cart_totals checkout">
																<h4>Professores adicionados</h4>
																<div class="cart-wrap">
																	<ul class="cart_list" id="reports_in" ondrop="drop_in(event)" ondragover="allowDrop(event)">
																		<?php
																		$query = "SELECT a.entidade PK_ENTIDADE, e.NOME, e.CPF FROM `professor_escola` a
										JOIN entidades e ON a.`entidade` = e.`PK_ENTIDADE`
										 WHERE a.`escola` = ?";
																		$smtp = $con->prepare($query);
																		$smtp->execute([$_GET['pk']]);
																		$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
																		foreach ($linhas as $linha) {
																		?>
																			<li id="<?= $linha->PK_ENTIDADE ?>" ondragstart="drag(event)" draggable="true" class="b1"><?= $linha->NOME ?><strong><?= $linha->CPF ?></strong></li>
																		<?php } ?>
																	</ul>
																	<button type="button" onclick="setAlunosParaTurma()" class="btn checkout_btn">Atualizar turma</button>
																	<div wm-alerta class="alert d-none"></div>
																</div>
															</div>
														</div>

														<script type="text/javascript">
															function drag(ev) {
																ev.dataTransfer.setData("text", ev.target.id);
															}

															function drop_in(ev) {
																ev.preventDefault();
																var data = ev.dataTransfer.getData("text")
																document.getElementById("reports_in").appendChild(document.getElementById(data))
															}

															function drop_out(ev) {
																ev.preventDefault();
																var data = ev.dataTransfer.getData("text")
																document.getElementById("reports_out").appendChild(document.getElementById(data))
															}

															function allowDrop(ev) {
																ev.preventDefault()
															}

															function setAlunosParaTurma() {
																let lista = []
																$('#reports_in').find("li").each(function() {
																	lista.push(this.id)
																})
																$.post("escolas-request.php?funcao=addprofessor", {
																	turma: "<?= addslashes($_GET['pk']) ?>",
																	alunos: lista
																}, function(data) {
																	const alerta = document.querySelector("[wm-alerta]")
																	alerta.classList.remove("alert-success")
																	alerta.classList.remove("alert-danger")
																	alerta.classList.remove("d-none")
																	if (data == 1) {
																		alerta.innerHTML = "Atualizado com sucesso!"
																		alerta.classList.add("alert-success");
																	} else {
																		alerta.innerHTML = "Não houve atualização!"
																		alerta.classList.add("alert-danger");
																	}
																})
															}
														</script>

													</div>

												</div>
											</div>
										</div>


										<!-- /Row Início da paginação -->


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