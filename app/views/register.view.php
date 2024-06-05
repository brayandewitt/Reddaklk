	<!-- Start Header Area -->
<?php $this->view('includes/header',$data)?>	<!-- End Header Area -->

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
							<h4>Already registered!</h4>
							<p>Welcome to Reddak.lk - Your Ultimate Destination for Fashion Discoveries</p>
							<a class="primary-btn" href=" <?= ROOT ?>/login">Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Rgister to enter</h3>
						<form class="row login_form"  method="post" id="contactForm" novalidate>
							<div class="col-md-6 form-group">
								<input value="<?= set_value('firstname');?>" type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Firstname'">
                            </div>
                            <div class="col-md-6 form-group">
								<input value="<?= set_value('lastname');?>" type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lastname'">
                            </div>
                            <div class="col-md-12 form-group text-start">
								<input value="<?= set_value('email');?>" type="text" class="form-control <?=!empty($errors['email']) ?'border-danger':''; ?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
								<?php if(!empty($errors['email'])):?>
								<span class="text-danger  font-weight-bold"><?=$errors['email']?></span>
								<?php endif;?>
							</div>
							<div class="col-md-12 form-group">
								<input value="<?= set_value('password');?>" type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input value="<?= set_value('retypepassword');?>" type="password" class="form-control" id="retypepassword" name="retypepassword" placeholder="Retype Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Retype Password'">
                                <div class="invalid-feedback"></div>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input \<?= set_value('terms') ? 'checked':'';?> type="checkbox" id="f-option2" name="terms">
									<label for="f-option2">I agree and accepts the terms and conditions</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Sign In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
<?php $this->view('includes/footer',$data) ?>
