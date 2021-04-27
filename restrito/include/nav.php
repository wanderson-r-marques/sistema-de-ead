
<?php 
	function pgActive($pg){
	 	return	(strpos($_SERVER['REQUEST_URI'],$pg)) ? 'active' : '';
	}
?>
<div class="col-lg-3 col-md-3 p-0">
							<div class="dashboard-navbar">

								<div class="d-user-avater">

									<div class="linkFoto">

									<form action="helpers/upload-imagem.php" method="post" name="dateForm" enctype="multipart/form-data">
										<img src="<?php echo (file_exists('../'.$foto)) ? '../'.$foto : '../assets/fotos/user.png'  ?>" class="img-fluid avater" alt="Perfil">
										<div class="input-group mb-3 alterarFoto">
											
											<div class="custom-file">
													
												<input type="file" name="foto" onchange="document.forms['dateForm'].submit();" class="custom-file-input" id="inputGroupFile01">
												
											</div>
										</div>
									</form>
									</div>

									<h4><?=$entidade->NOME?></h4>
									<span>Canada USA</span>
								</div>

								<div class="d-navigation">
									<ul id="side-menu">
										<li class="<?= pgActive('painel') ?>"><a href="painel.php"><i class="ti-panel"></i>Principal</a></li>

										<li class="dropdown <?= pgActive('entidades') ?>">
											<a href="entidades.php"><i class="ti-user"></i>Entidades<span class="ti-angle-left"></span></a>
											<ul class="nav nav-second-level <?= (pgActive('entidades') == 'active') ? 'show' : '' ?>">
												<li><a href="entidades-cadastro.php">Cadastrar</a></li>
												<li><a href="entidades.php">Listar</a></li>
											</ul>
										</li>									
										
										<li class="dropdown <?= pgActive('escolas') ?>">
											<a href="escolas.php"><i class="ti-user"></i>Escolas<span class="ti-angle-left"></span></a>
											<ul class="nav nav-second-level <?= (pgActive('escolas') == 'active') ? 'show' : '' ?>">
												<li><a href="escolas-cadastro.php">Cadastrar</a></li>
												<li><a href="escolas.php">Listar</a></li>
											</ul>
										</li>
										<li class="dropdown <?= pgActive('disciplinas') ?>">
											<a href="disciplinas.php"><i class="ti-user"></i>Disciplinas<span class="ti-angle-left"></span></a>
											<ul class="nav nav-second-level <?= (pgActive('disciplinas') == 'active') ? 'show' : '' ?>">
												<li><a href="disciplinas-cadastro.php">Cadastrar</a></li>
												<li><a href="disciplinas.php">Listar</a></li>
											</ul>
										</li>
										<li><a href="logout.php"><i class="ti-power-off"></i>Sair</a></li>
									</ul>
								</div>

							</div>


						</div>