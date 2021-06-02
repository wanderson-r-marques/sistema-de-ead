
<div class="col-lg-3 col-md-3 p-0">
							<div class="dashboard-navbar">

								<div class="d-user-avater">

									<div class="linkFoto">

									<form action="helpers/upload-imagem.php" method="post" name="dateForm" enctype="multipart/form-data">
										<img src="<?php echo (file_exists('../' . $foto)) ? '../' . $foto : '../assets/fotos/user.png' ?>" class="img-fluid avater" alt="Perfil">
										<div class="input-group mb-3 alterarFoto">

											<div class="custom-file">

												<input type="file" name="foto" onchange="document.forms['dateForm'].submit();" class="custom-file-input" id="inputGroupFile01">

											</div>
										</div>
									</form>
									</div>

									<h4><?=$entidade->NOME?></h4>
									<span><?=$entidade->DESCRICAO?></span>
								</div>

								<div class="d-navigation">
									<ul id="side-menu">
										<li class="<?=pgActive('painel')?>">
											<a href="painel.php"><i class="ti-panel"></i>Principal</a>
										</li>
										
										<li class="<?=pgActive('tarefas')?>">
											<a href="tarefas.php"><i class="fa fa-tasks"></i>Tarefas</a>											
										</li>
										
										
										<li><a href="logout.php"><i class="ti-power-off"></i>Sair</a></li>
									</ul>
								</div>

							</div>


						</div>