<?php require_once 'config.php';?>
<?php require_once 'helpers/alert.php';?>
<?php

if (isset($_POST['recuperar']) && $_POST['recuperar'] == 's') {
    $cpf = $_POST['cpf'];
    $cpf = str_replace('.', '', $cpf);
    $cpf = str_replace('-', '', $cpf);
    $data_nascimento = $_POST['data_nascimento'];
    $data_nascimento = str_replace('/', '-', $data_nascimento);
    $data_nascimento = date('Y-m-d', strtotime($data_nascimento));
// Query de verificação
    $query = "SELECT
                        `NOME`,
                        `NOME_FANTASIA`,
                        `CPF`,
                        `RG`,
                        `DATA_NASCIMENTO`,
                        `TELEFONE1`,
                        `TELEFONE2`,
                        `EMAIL`,
                        `PK_TIPO_CADASTRO`,
                        `MATRICULA`,
                        `SENHA`,
                        `COD_INEP`
                    FROM
                        `entidades`
                    WHERE
                        CPF = :cpf AND DATA_NASCIMENTO = :data_nascimento";
    $con = conectar();
    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $smtp->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
    $smtp->execute();
    // Verifica se encontou o aluno
    if ($smtp->rowCount()) {        
		$_SESSION['recuperar_senha'] = true;
		$_SESSION['cpf'] = $cpf;
		$_SESSION['data_nascimento'] = $data_nascimento;
    }else{
		$_SESSION['recuperar_senha'] = false;
		unset($_SESSION['cpf']);
		unset($_SESSION['data_nascimento']);
	}
} elseif (isset($_POST['alterar']) && $_POST['alterar'] == 's') {
	$nova_senha = $_POST['nova_senha'];
	$c_nova_senha = $_POST['c_nova_senha'];
	$cpf = $_SESSION['cpf'];
	if($nova_senha === $c_nova_senha){
		$nova_senha = password_hash($nova_senha,PASSWORD_DEFAULT);
		// Query de verificação
		$query = "UPDATE `entidades` SET SENHA = :nova_senha WHERE CPF = :cpf AND DATA_NASCIMENTO = :data_nascimento";
		$con = conectar();
		$smtp = $con->prepare($query);
		$smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
		$smtp->bindParam(':nova_senha', $nova_senha, PDO::PARAM_STR);
		$smtp->execute();
	}
	
}

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title><?=SITE?> - Aulas EAD </title>
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

    <body class="log-bg">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ========================== SignUp Elements ============================= -->
			<section class="log-space">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-11 col-md-11">

							<div class="row no-gutters position-relative log_rads">
								<div class="col-lg-6 col-md-5 bg-cover" style="background:#1f2431 url(assets/img/log.png)no-repeat;">
									<div class="lui_9okt6">
										<div class="_loh_revu97">
											<div id="reviews-login">

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Good Services</h4>
													</div>
													<div class="_loh_r93">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Shilpa D. Setty</h4>
														<span>Team Leader</span>
													</div>
												</div>

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Good Services</h4>
													</div>
													<div class="_loh_r93">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Adam Wilsom</h4>
														<span>Mak Founder</span>
													</div>
												</div>

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Customer Support</h4>
													</div>
													<div class="_loh_r93">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Kunal M. Wilsom</h4>
														<span>CEO & Founder</span>
													</div>
												</div>

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Ultimate Services</h4>
													</div>
													<div class="_loh_r93">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Mark Jugermark</h4>
														<span>MCL Founder</span>
													</div>
												</div>
												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Item Support</h4>
													</div>
													<div class="_loh_r93">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Kirti Washinton</h4>
														<span>Web Designer</span>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-7 position-static p-4">
									<div class="log_wraps">
										<a href="index-2.html" class="log-logo_head"><img src="assets/img/logo.png" class="img-fluid" width="80" alt="" /></a>
										<div class="log__heads">
											<h4 class="mt-0 logs_title">Recuperar <span class="theme-cl">Senha</span></h4>
										</div>
										<?php if(isset($_SESSION['recuperar_senha']) && $_SESSION['recuperar_senha']): ?>
										<form method="post">
										<div class="form-group">
											<label>CPF*</label>
											<input type="text" name="cpf" class="form-control cpf">
										</div>

										<div class="form-group">
											<label>Data de nascimento*</label>
											<input type="text" name="data_nascimento" class="form-control data">
										</div>

										<div class="form-group">
											<button type="submit" name="recuperar" value="s" class="btn btn-md full-width pop-login red-skin">Recuperar</button>

										</div>
										</form>
										<?php else: ?>
										<form method="post">
										<div class="form-group">
											<label>Nova senha*</label>
											<input type="password" name="nova_senha" class="form-control">
										</div>

										<div class="form-group">
											<label>Confirme a nova senha*</label>
											<input type="password" name="c_nova_senha" class="form-control">
										</div>

										<div class="form-group">
											<button type="submit" name="alterar" value="s" class="btn btn-md full-width pop-login red-skin">Alterar</button>
										</div>
										</form>
										<?php endif; ?>
										<div class="form-group text-center mb-0 mt-3">
											Retornar para <a href="index.php" class="theme-cl">LogIn</a>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ========================== Login Elements ============================= -->


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

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 12:05:27 GMT -->
</html>