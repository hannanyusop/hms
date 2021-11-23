<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php' ?>
<body class="hold-transition theme-primary bg-img" style="background-image: url(assets/images/auth-bg/bg-1.jpg)">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary"><?= $GLOBALS['APP_NAME'] ?></h2>
								<p class="mb-0">Sign in to continue.</p>
							</div>
							<div class="p-40">
								<form action="https://medical-admin-template.multipurposethemes.com/main/index.html" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent" placeholder="Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<!-- /.col -->
										<div class="col-12 text-center">
										  <a href="auth/dashboard.php" type="submit" class="btn btn-danger mt-10">SIGN IN</a>
										</div>
										<!-- /.col -->
									  </div>
								</form>
								<div class="text-center">
									<p class="mt-15 mb-0">Forgot Password? <a href="auth_register.html" class="text-warning ms-5">Password Recovery</a></p>
								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include 'include/script.php' ?>
</body>
</html>
