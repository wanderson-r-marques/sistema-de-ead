<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Área Restrita</h4>
							<div class="login-form">
								<form method="post" action="login.php">
                                <input type="hidden" value="8s0dfg7s6grogpsfgsgs-*sgsfg" name="token">
									<div class="form-group">
										<label>CPF</label>
										<input type="text" required class="form-control cpf" id="cpf" name="cpf" placeholder="999.999.999-99">
									</div>

									<div class="form-group">
										<label>Senha</label>
										<input type="password" required id="senha" name="senha" class="form-control" placeholder="*******">
									</div>

									<div class="form-group">
										<button type="submit" name="acessar" value="s" class="btn btn-md full-width pop-login">Acessar</button>
									</div>

								</form>
							</div>

							<div class="social-login mb-3">
								<ul>
									<li>
										<input id="reg" class="checkbox-custom" name="reg" type="checkbox">
										<label for="reg" class="checkbox-custom-label">Lembrar senha</label>
									</li>
									<li class="right"><a href="#" class="theme-cl">Esqueceu a senha?</a></li>
								</ul>
							</div>

							<div class="modal-divider"><span>Acessar via</span></div>
							<div class="social-login ntr mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
							</div>

							<div class="text-center">
								<p class="mt-2">Ainda não possui conta? <a href="register.html" class="link">Clique aqui</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>