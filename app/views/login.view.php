	<!-- Start Header Area -->
	<?php $this->view('includes/header', $data) ?> <!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src=" <?= ROOT ?>/assets/img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>Welcome to Reddak.lk - Your Ultimate Destination for Fashion Discoveries</p>
							<a class="primary-btn" href=" <?= ROOT ?>/register">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<?php if (message()) : ?>
							<div class="alert alert-danger text-center"><?= message('', true) ?></div>
						<?php endif; ?>
						<?php if (!empty($errors['email'])) : ?>
							<div class="alert alert-danger text-center"><?= $errors['email'] ?></div>
						<?php endif; ?>

						<form class="row login_form" method="post" id="contactForm">
							<div class="col-md-12 form-group">
								<input value="<?= set_value('email'); ?>" type="text" class="form-control" id="email" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">

							</div>
							<div class="col-md-12 form-group">
								<input value="<?= set_value('password'); ?>" type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
	<?php $this->view('includes/footer', $data) ?>