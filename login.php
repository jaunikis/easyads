<!-- Login -->
		<section class="login">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="login-panel widget">
							<div class="login-body">
								<div class="login-with-sites">
									<button class="btn-facebook login-icons btn-lg btn-block"> <i class="fa fa-facebook"></i> Login With Facebook</button>
									<button class="btn-google login-icons btn-lg btn-block"> <i class="fa fa-google"></i> Login With Google</button>
								</div>
								<form action="/easyads/login2.php" method="post">
									<div class="form-group">
										<input name="email" type="text" placeholder="Email or Username" class="form-control">
									</div>
									<div class="form-group">
										<input name="password" type="password" placeholder="Password" class="form-control">
									</div>
									<div class="form-group">
										<button class="btn btn-block btn-lg btn-primary">Sign In</button>
									</div>
								
							</div>
							<div class="login-footer">
								<div class="checkbox checkbox-primary pull-left">
									<input name="remember" value="on" id="checkbox2" type="checkbox" >
									<label for="checkbox2">
									Remember me
									</label>
									</form>
								</div>
								<p class="text-center pull-right"> <a href="forgot-password.html"> Forgot password? </a> </p>
								<div class="clearfix"></div>
							</div>
						</div>
						<p class="text-center">Don't have an account? <a href="/easyads/signup"><strong>Signup</strong></a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End Login -->