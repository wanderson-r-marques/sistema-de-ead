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
													<div class="form-group col-md-12" style="margin-top:1rem;">
														<a href="tarefas-cadastro.php" class="btn add-items"><i class="fa fa-plus-circle"></i>Adicionar tarefas</a>
													</div>
													<div class="dashboard_container_body">
														<div class="table-responsive">
															<table class="table">
																<thead class="thead-dark">
																	<tr>
																		<th scope="col">Data</th>
																		<th scope="col">Tarefa</th>
																		<th scope="col">Qtd Alunos</th>
																		<th scope="col">Ação</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$where = '';
																	$busca = $_GET['p'] ?? '';
																	$where = " WHERE l.`CPF`='$cpf' AND j.`DESCRICAO_GERAL` LIKE ('%" . $busca . "%')";

																	$query = "SELECT 
																	g.`MATERIAL_TAREFA`,
																f.`PK_CADASTRO_TAREFAS`,
																 i.`PK_DISCIPLINAS`,
																 i.`DESCRICAO` AS nome_disciplina,
																 j.`DESCRICAO_GERAL` AS nome_atividade,
																 h.`DESCRICAO` AS tipo_material,
																 g.`LINK`,
																 a.`PK_ENTIDADE` AS aluno,
																  c.`PK_TURMA`
																		 
																		 
																		 
																 FROM entidades              		a
																 JOIN alunos_escolas_turmas  		b  ON a.`PK_ENTIDADE` = b.`PK_ENTIDADE`
																  JOIN turmas                		c  ON b.`PK_TURMA` = c.`PK_TURMA`
																  JOIN series                		d  ON c.`PK_SERIE` = d.`PK_SERIES`
																  JOIN curriculo             		e  ON d.`PK_SERIES` = e.serie
																  JOIN alunos_material       		f  ON c.`PK_TURMA` = f.`PK_TURMA` AND e.disciplina = f.`PK_DISCIPLINA`
																  JOIN materiais_tarefa      		g  ON f.`PK_CADASTRO_TAREFAS` = g.`PK_CADASTRO_TAREFA`
																  JOIN tipos_material        		h  ON h.`PK_TIPO_MATERIAL` = g.`TIPO_MATERIAL`
																  JOIN disciplinas           		i  ON e.`disciplina` = i.`PK_DISCIPLINAS`
																  JOIN cadastro_tarefas      		j  ON f.`PK_CADASTRO_TAREFAS` = j.`CADASTRO_TAREFAS`
																  JOIN professor_turmas_disciplinas 	k  ON b.`PK_TURMA` = k.`pk_turma`
																  JOIN entidades                    	l  ON k.`pk_entidade` =l.`PK_ENTIDADE`
																 $where
																   ";

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
																		$query = "SELECT 
																		g.`MATERIAL_TAREFA`,
																	f.`PK_CADASTRO_TAREFAS`,
																	 i.`PK_DISCIPLINAS`,
																	 i.`DESCRICAO` AS nome_disciplina,
																	 j.`DESCRICAO_GERAL` AS nome_atividade,
																	 h.`DESCRICAO` AS tipo_material,
																	 g.`LINK`,
																	 a.`PK_ENTIDADE` AS aluno,
																	  c.`PK_TURMA`
																			 
																			 
																			 
																	 FROM entidades              		a
																	 JOIN alunos_escolas_turmas  		b  ON a.`PK_ENTIDADE` = b.`PK_ENTIDADE`
																	  JOIN turmas                		c  ON b.`PK_TURMA` = c.`PK_TURMA`
																	  JOIN series                		d  ON c.`PK_SERIE` = d.`PK_SERIES`
																	  JOIN curriculo             		e  ON d.`PK_SERIES` = e.serie
																	  JOIN alunos_material       		f  ON c.`PK_TURMA` = f.`PK_TURMA` AND e.disciplina = f.`PK_DISCIPLINA`
																	  JOIN materiais_tarefa      		g  ON f.`PK_CADASTRO_TAREFAS` = g.`PK_CADASTRO_TAREFA`
																	  JOIN tipos_material        		h  ON h.`PK_TIPO_MATERIAL` = g.`TIPO_MATERIAL`
																	  JOIN disciplinas           		i  ON e.`disciplina` = i.`PK_DISCIPLINAS`
																	  JOIN cadastro_tarefas      		j  ON f.`PK_CADASTRO_TAREFAS` = j.`CADASTRO_TAREFAS`
																	  JOIN professor_turmas_disciplinas 	k  ON b.`PK_TURMA` = k.`pk_turma`
																	  JOIN entidades                    	l  ON k.`pk_entidade` =l.`PK_ENTIDADE`
																	 $where
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
																				<td>
																					<div class="dash_action_link">
																						<a target="_blank" href="<?= $linha->LINK ?>" class="view"><i class="fa fa-eye"></i></a>
																						<a href="turmas-editar.php?pk=<?= $linha->PK_TURMA ?>" class="edit"><i class="fa fa-pen"></i></a>
																						<a href="turmas-adicionar-alunos.php?pk=<?= $linha->PK_TURMA ?>" class="edit"><i class="fa fa-users"></i></a>
																						<a onclick="return confirm('Deseja deletar?')" href="turmas-funcao.php?funcao=deletar&pk=<?= $linha->PK_TURMA ?>" class="cancel"><i class="fa fa-trash"></i></a>
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
</body>

</html>