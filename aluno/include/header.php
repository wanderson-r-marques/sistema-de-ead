
<?php
function pgActive($pg)
{
    return (strpos($_SERVER['REQUEST_URI'], $pg)) ? 'active' : '';
}
?>
<!-- Start Navigation -->
<div class="header header-light head-shadow">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="<?=LOGO?>" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							<li class="<?=pgActive('painel')?>">
											<a href="painel.php"><i class="ti-panel"></i> Principal</a>
										</li>
										
										<li class="<?=pgActive('tarefas')?>">
											<a href="tarefas.php"><i class="fa fa-tasks"></i> Tarefas</a>											
										</li>
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<li class="login_click theme-bg">
									<a href="logout.php">Sair</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->