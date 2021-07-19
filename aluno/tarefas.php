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
											<h4>Tarefas</h4>
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
																		<th scope="col">Disciplina</th>
																		<th scope="col">Atividade</th>
																		<th scope="col">Material</th>
																		<th scope="col">Nota</th>
																		<th scope="col">Ação</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$where = '';
																	$busca = $_GET['p'] ?? '';
																	$where = " AND ct.`DESCRICAO_GERAL` LIKE ('%" . $busca . "%')";

																	$query = "SELECT
																	h.`PK_TIPO_MATERIAL`,  
																	g.`MATERIAL_TAREFA`,
																	f.`PK_CADASTRO_TAREFAS`,
																	 i.`PK_DISCIPLINAS`,
																	 i.`DESCRICAO` AS nome_disciplina,
																	 j.`DESCRICAO_GERAL` AS nome_atividade,
																	 h.`DESCRICAO` AS tipo_material,
																	 g.`LINK`,
																	 a.`PK_ENTIDADE` AS aluno,
																	 c.`PK_TURMA`,
																	 l.DATA_HORA_VISTO,
																	 l.DATA_HORA_RESPOSTA,
																     l.PK_MATERIAIS_TAREFAS_RESPOSTAS,
																	 l.NOTA
																	 
																	 
																	 
															  FROM entidades              a
															  JOIN alunos_escolas_turmas  b  ON a.`PK_ENTIDADE` = b.`PK_ENTIDADE`
															   JOIN turmas                 c  ON b.`PK_TURMA` = c.`PK_TURMA`
															   JOIN series                 d  ON c.`PK_SERIE` = d.`PK_SERIES`
															   JOIN curriculo              e  ON d.`PK_SERIES` = e.serie
															   JOIN alunos_material        f  ON c.`PK_TURMA` = f.`PK_TURMA` AND e.disciplina = f.`PK_DISCIPLINA`
															   JOIN materiais_tarefa       g  ON f.`PK_CADASTRO_TAREFAS` = g.`PK_CADASTRO_TAREFA`
															   JOIN tipos_material         h  ON h.`PK_TIPO_MATERIAL` = g.`TIPO_MATERIAL`
															   JOIN disciplinas            i  ON e.`disciplina` = i.`PK_DISCIPLINAS`
															   JOIN cadastro_tarefas       j  ON f.`PK_CADASTRO_TAREFAS` = j.`CADASTRO_TAREFAS`
															   LEFT JOIN materiais_tarefas_resposta l ON g.MATERIAL_TAREFA = l.PK_MATERIAIS_TAREFA
															  
															  WHERE a.`CPF`='$cpf'";

																	$smtp = $con->prepare($query);

																	if ($smtp->execute()) {
																		// Pega o total de registros
																		$total = $smtp->rowCount();
																		// determina o numero de registros que serão mostrados na tela
																		$maximo = 10;
																		//pega o valor da pagina atual
																		$pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1';

																		//subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
																		$inicio = $pagina - 1;
																		//multiplicamos a quantidade de registros da pagina pelo valor da pagina atual
																		$inicio = $maximo * $inicio;
																		// Nova query com as limitações
																		$query = "SELECT
																		h.`PK_TIPO_MATERIAL`,  
																		g.`MATERIAL_TAREFA`,
																		f.`PK_CADASTRO_TAREFAS`,
																		 i.`PK_DISCIPLINAS`,
																		 i.`DESCRICAO` AS nome_disciplina,
																		 j.`DESCRICAO_GERAL` AS nome_atividade,
																		 h.`DESCRICAO` AS tipo_material,
																		 g.`LINK`,
																		 a.`PK_ENTIDADE` AS aluno,
																		 c.`PK_TURMA`,
																	 	 l.DATA_HORA_VISTO,
																	 	 l.DATA_HORA_RESPOSTA,
																	 	 l.PK_MATERIAIS_TAREFAS_RESPOSTAS,
																		  l.NOTA
																		 
																		 
																		 
																  FROM entidades              a
																  JOIN alunos_escolas_turmas  b  ON a.`PK_ENTIDADE` = b.`PK_ENTIDADE`
																   JOIN turmas                 c  ON b.`PK_TURMA` = c.`PK_TURMA`
																   JOIN series                 d  ON c.`PK_SERIE` = d.`PK_SERIES`
																   JOIN curriculo              e  ON d.`PK_SERIES` = e.serie
																   JOIN alunos_material        f  ON c.`PK_TURMA` = f.`PK_TURMA` AND e.disciplina = f.`PK_DISCIPLINA`
																   JOIN materiais_tarefa       g  ON f.`PK_CADASTRO_TAREFAS` = g.`PK_CADASTRO_TAREFA`
																   JOIN tipos_material         h  ON h.`PK_TIPO_MATERIAL` = g.`TIPO_MATERIAL`
																   JOIN disciplinas            i  ON e.`disciplina` = i.`PK_DISCIPLINAS`
																   JOIN cadastro_tarefas       j  ON f.`PK_CADASTRO_TAREFAS` = j.`CADASTRO_TAREFAS`
																   LEFT JOIN materiais_tarefas_resposta l ON g.MATERIAL_TAREFA = l.PK_MATERIAIS_TAREFA
																  
																  WHERE a.`CPF`='$cpf'
																  LIMIT $inicio,$maximo";
																		$smtp = $con->prepare($query);
																		$smtp->execute();

																		$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
																		foreach ($linhas as $linha) {
																	?>
																			<tr>
																				<th scope="row"><?= $linha->nome_disciplina ?></th>
																				<td><?= $linha->nome_atividade ?></td>
																				<td><?= $linha->tipo_material ?></td>
																				<td><?= $linha->NOTA ?></td>
																				<td>
																					<div class="dash_action_link">
																						<a href="<?= $linha->LINK ?>" alvo="a" tipo="<?= $linha->PK_TIPO_MATERIAL ?>" target="_blank" class="view" wm-confirma pk="<?= $linha->MATERIAL_TAREFA ?>"><i alvo="i" class="fa fa-eye" tipo="<?= $linha->PK_TIPO_MATERIAL ?>" wm-confirma pk="<?= $linha->MATERIAL_TAREFA ?>"></i></a>
																						<?php if ($linha->PK_TIPO_MATERIAL == 1) : ?>
																							<?php if (!$linha->DATA_HORA_VISTO || $linha->DATA_HORA_RESPOSTA) : ?>
																								<a style="opacity:0.3;" class="edit"><i class="fa fa-pen"></i></a>
																							<?php else : ?>
																								<a href="tarefas-arquivos.php?pkTarefa=<?= $linha->MATERIAL_TAREFA ?>&pkResposta= <?= $linha->PK_MATERIAIS_TAREFAS_RESPOSTAS ?>" class="edit"><i class="fa fa-pen"></i></a>
																							<?php endif; ?>
																						<?php endif; ?>
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
	<script>
		document.querySelectorAll('[wm-confirma]').forEach(confirma => {
			confirma.addEventListener("click", e => {
				const url = 'tarefas-requests.php?funcao=visto'
				const pk = e.target.getAttribute("pk")
				const tipo = e.target.getAttribute("tipo")
				let alvo = e.target.getAttribute("alvo")

				$.post(url, {
					pk: pk,
					cpfEntidade: <?= $cpf ?>
				}, function(data) {
					if (data > 0) {
						if (alvo == 'a') {
							e.target.nextElementSibling.setAttribute("href", "tarefas-arquivos.php?pkTarefa=" + pk + "&pkResposta=" + data)
							e.target.nextElementSibling.style.opacity = "1"
						} else if (alvo == 'i') {
							e.target.parentNode.nextElementSibling.setAttribute("href", "tarefas-arquivos.php?pkTarefa=" + pk + "&pkResposta=" + data)
							e.target.parentNode.nextElementSibling.style.opacity = "1"
						}

					}
					// cxEscolas.innerHTML = data
				})
			})
		})
	</script>
</body>

</html>